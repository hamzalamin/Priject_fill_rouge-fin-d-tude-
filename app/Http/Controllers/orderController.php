<?php

namespace App\Http\Controllers;

use App\Models\order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderController extends Controller
{
    //
    public function checkout(Request $request)
    {
        // Get the authenticated user's ID
        // dd($request);
        $user_id = Auth::id();
        order::create([
            'user_id' => $user_id,
            'pani_id' => $request->panier, 
            'total_price' => $request->total,
        ]);
    }
}
