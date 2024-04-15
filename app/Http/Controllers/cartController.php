<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\cart;
use App\Models\copy;
use App\Models\panier;
use App\Models\rating;
use App\Models\ticket;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    //
    public function index()
    {
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->where('check', false)->get();
        // dd($cart);
        // Calculate total price
        $totalPrice = 0;
        foreach ($cart as $item) {
            if ($item->type == 'buy') {
                $totalPrice += $item->book->price * $item->qnt;
            } else {
                $totalPrice += $item->copy->price_of_reserv * $item->qnt;
            }
        } 
        
        // $array = [];
        // foreach($cart as $carts){
        //     $array = $carts->id;
        // }

        return view('cart', compact('cart', 'totalPrice'));
    }
    

    // buy ktab
public function store(Request $request)
    {
        // Validate request
        $book_number = $request->input('book_number');
        $book_id = $request->input('book_id');

        $book = Book::findOrFail($book_id);
        
        $request->validate([
            'qnt' => 'required|integer|min:1',
            'book_id' => 'required|exists:books,id',
            'type' => 'required',
            // 'price_of_book' => 'required',
        ]);
            $user = Auth::user();
        // Check if the book already exists in the user's cart and the current panier
        $existingCartItem = Cart::where('user_id', $user->id)
            ->where('book_id', $request->book_id)
            ->first();

        $cartCountsum = cart::where('book_id', $book_id)->where('type', 'buy')->sum('qnt');
        // dd($cartCountsum);
       // Conditional Logic
        if ($existingCartItem && $existingCartItem->check == false && $cartCountsum < $book_number) {
            $quantityToBuy = min($request->qnt, $book->number); // Calculate the maximum quantity user can buy
            $existingCartItem->increment('qnt', $quantityToBuy);
            $book->number -= $quantityToBuy; // Decrement book quantity by the purchased quantity
            $book->save(); // Save the updated book quantity
        } elseif ($cartCountsum < $book_number && $request->qnt <= $book->number) {
            // Create a new cart item
            Cart::create([
                'user_id' => $user->id,
                'book_id' => $request->book_id,
                'qnt' => $request->qnt,
                'type' => $request->type,
            ]);
            // Decrement book quantity by the purchased quantity
            $book->number -= $request->qnt;
            $book->save(); // Save the updated book quantity
        } else {
            // If requested quantity exceeds available stock, prevent reservation
            return redirect()->back()->with('error', 'Requested quantity exceeds available stock.');
        } 

        return redirect()->back()->with('success', 'Item added to cart successfully');
    }

    public function checkout(Request $request)
    {
        // dd($request);
        $cartIds = $request->input('cart_id');
        $cartname = $request->input('cart_name');
        session(['cartname' => $cartname]);
        Cart::whereIn('id', $cartIds)->update(['check' => true]);
        $total = $request->input('total');
        // $cart_id = $request->input('cart_id');
        $user_id = Auth::id();

        ticket::create([
            'user_id' => $user_id,
            'total_price' => $total,

        ]);
        return redirect()->route('ticketForm')->with('success', 'Item added to cart successfully');

    }
    

    public function destroy(cart $cartItem)
        {
            $book = $cartItem->book; 
            $book->number += $cartItem->qnt; 
            $book->save();

            $cartItem->delete(); 

            return redirect()->route('getCart')->with('success', 'Item removed from cart successfully');
        }


    public function ticket(){
        $user_id = Auth::id();
        $cartIds = session('cartname');

        // dd($updated);
        $ticket = ticket::where('user_id', $user_id)->get();
        $bookReserved = cart::where('user_id', $user_id)->where('check', 1)->get();
        // dd($bookReserved);
        return view('ticket', compact('ticket', 'cartIds', 'bookReserved'));
    }

    public function showRatingForm(Request $request ,$reservationId){
        // dd($request);
        $reservation = ticket::findOrFail($reservationId);
        // dd($reservation);
        $user_id = Auth::id();
        $rateOne = rating::where('user_id', $user_id)->where('ticket_id', $reservation->id)->get()->count();
        // dd($rateOne);
        return view('ratePage', ['reservation' => $reservation , 'request' => $request], compact('rateOne'));
    }


    public function rateTicket(Request $request){

    $userId = Auth()->id();
        rating::create([
        'user_id' => $userId,
        'ticket_id' => $request->ticket_id,
        'rating' => $request->rating,
    ]);
    
        return redirect()->route('ticketForm');
}



public function search(Request $request) {
    // Retrieve the search query from the request
    $searchQuery = $request->input('name');

    // Retrieve selected categories from the request
    $selectedCategories = $request->input('categories', []);

    // Query to filter copies based on search query and selected categories
    $copiesQuery = book::query();

    if (!empty($searchQuery)) {
        $copiesQuery->where('name', 'like', '%'.$searchQuery.'%');
    }

    if (!empty($selectedCategories)) {
        $copiesQuery->whereIn('categorys_id', $selectedCategories);
    }

    // Execute the query
    $copys = $copiesQuery->get();
    $books = $copiesQuery->get();

    $categorys = Category::all();

    return view('search-results', compact('copys', 'categorys', 'books'));
}





}
