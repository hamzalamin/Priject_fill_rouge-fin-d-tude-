<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\cart;
use App\Models\panier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    //
    public function index()
    {
        $user_id = Auth::id();
        $cart = Cart::where('user_id', $user_id)->get();
        
        // Calculate total price
        $totalPrice = 0;
        foreach ($cart as $item) {
            $totalPrice += $item->book->price * $item->qnt;
        }

        return view('cart', compact('cart', 'totalPrice'));
    }

    
    public function store(Request $request)
    {
        // Validate request
        $request->validate([
            'qnt' => 'required|integer|min:1',
            'book_id' => 'required|exists:books,id',
        ]);
    
        // Get the authenticated user
        $user = Auth::user();
    
        // Check if the user has an active panier
        $panier = $user->paniers()->latest()->first();
    
        if (!$panier) {
            // If the user doesn't have an active panier, create a new one
            $panier = panier::create(['user_id' => $user->id]);
        }
    
        // Check if the book already exists in the user's cart and the current panier
        $existingCartItem = Cart::where('user_id', $user->id)
            ->where('book_id', $request->book_id)
            ->where('panier_id', $panier->id)
            ->first();
    
        if ($existingCartItem) {
            // If the book exists, update its quantity
            $existingCartItem->increment('qnt', $request->qnt);
        } else {
            // If the book does not exist, create a new cart item and associate it with the panier
            Cart::create([
                'user_id' => $user->id,
                'book_id' => $request->book_id,
                'qnt' => $request->qnt,
                'panier_id' => $panier->id, // Ensure to populate panier_id with the correct value
            ]);
        }
    
        // Redirect back or return a response indicating success
        return redirect()->back()->with('success', 'Item added to cart successfully');
    }
    
    


}
