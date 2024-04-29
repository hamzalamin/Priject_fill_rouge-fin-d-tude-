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
        $cart = Cart::where('user_id', $user_id)
                    ->where('check', false)
                    ->orderBy('created_at', 'desc')
                    ->get();
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
    
        public function searchBooks(Request $request)
        {

            $name = $request->input('name');
            $categories = $request->input('categories');
            // dd($categories);

            $copiesQuery = book::query();

            if (!empty($name)) {
                $copiesQuery->where('name', 'like', '%'.$name.'%')
                ->orwhere('writer', 'like', '%'.$name.'%')
                ->orwhere('language', 'like', '%'.$name.'%');

            }
        
            if (!empty($categories)) {
                $copiesQuery->whereIn('categorys_id', $categories);
            }
        
            
            $books = $copiesQuery->get();
            return response()->json(['books' => $books]);
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
            'book_id' => 'required',
            'type' => 'required',
            // 'price_of_book' => 'required',
        ]);
            $user = Auth::user();
        // Check if the book already exists in the user's cart and the current panier
        $existingCartItem_ = Cart::where('user_id', $user->id)
            ->where('book_id', $request->book_id)
            ->where('type', 'reserve')
            // ->where('check', 0)
            ->first();

            $existingCartItem = Cart::where('user_id', $user->id)
            ->where('book_id', $request->book_id)
            ->where('type', 'buy')
            // ->where('check', 0)
            ->first();
            
            // $book->save();


        $cartCountsum = cart::where('book_id', $book_id)->where('type', 'buy')->sum('qnt');

        if ($existingCartItem && $existingCartItem->check == false ) {
            $quantityToBuy = min($request->qnt, $book->number); 
            $existingCartItem->increment('qnt', $quantityToBuy);
            $book->number -= $quantityToBuy; 
            $book->save();
        } elseif ($cartCountsum <= $book_number && $request->qnt <= $book->number) {
            
            Cart::create([
                'user_id' => $user->id,
                'book_id' => $request->book_id,
                'qnt' => $request->qnt,
                'type' => $request->type,
            ]);
            
            $book->number -= $request->qnt;
            $book->save(); 
        } else {
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
        Cart::whereIn('id', $cartIds)->where('isReturn', 0)->where('type', 'buy')->update(['isReturn' => true]);

        $total = $request->input('total');
        // $cart_id = $request->input('cart_id');
        $user_id = Auth::id();

        ticket::create([
            'user_id' => $user_id,
            'total_price' => $total,

        ]);
        return redirect()->route('ticketForm')->with('success', 'You can rate our service');

    }
    

    public function destroy(cart $cartItem)
        {
            if($cartItem->type == 'buy'){
            $book = $cartItem->book; 
            $book->number += $cartItem->qnt; 
            $book->save();
            } else{
            $copys = $cartItem->copy; 
            $copys->number += $cartItem->qnt; 
            $copys->save();
            }

            $cartItem->delete(); 

            return redirect()->route('getCart')->with('success', 'Item removed from cart successfully');
        }
    public function destroyOne(cart $cartItem)
    {
        if($cartItem->qnt > 1) {
            if($cartItem->type == 'buy') {
                $book = $cartItem->book;
                $book->number += 1;
                $book->save();
            } else {
                $copys = $cartItem->copy;
                $copys->number += 1;
                $copys->save();
            }
    
            $cartItem->qnt -= 1;
            $cartItem->save();
        } else {
            if($cartItem->type == 'buy') {
                $book = $cartItem->book;
                $book->number += $cartItem->qnt;
                $book->save();
            } else {
                $copys = $cartItem->copy;
                $copys->number += $cartItem->qnt;
                $copys->save();
            }
    
            $cartItem->delete();
        }
    
        return redirect()->route('getCart')->with('success', 'Item removed from cart successfully');
    }
    

    public function ticket(){
        $user_id = Auth::id();
        $cartIds = session('cartname');

        // dd($updated);
        $ticket = ticket::where('user_id', $user_id)->orderby('created_at', 'desc')->get();
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
    
        return redirect()->route('ticketForm')->with('success', 'thank you for your feadback <3');
}



// public function search(Request $request) {
//     $searchQuery = $request->input('name');
//     $selectedCategories = $request->input('categories', []);
//     $copiesQuery = book::query();

//     if (!empty($searchQuery)) {
//         $copiesQuery->where('name', 'like', '%'.$searchQuery.'%');
//     }

//     if (!empty($selectedCategories)) {
//         $copiesQuery->whereIn('categorys_id', $selectedCategories);
//     }

    
//     $copys = $copiesQuery->get();
//     $books = $copiesQuery->get();

//     $categorys = Category::all();

//     // return response()->json([$copys , $books, $categorys]);
//     return response()->json($request);
// }





}
