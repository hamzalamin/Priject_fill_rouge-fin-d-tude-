<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('Admin_funcs.addOperatuer');
    }
    public function store(Request $request){
        // dd($re  quest);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'roles' => 'required',
            'password' => 'required'
        ]);
        // $roles = strtolower($request->roles);
        // dd($roles);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'roles' => $request->roles,
            'password' => $request->password,
        ]);
        return redirect()->route('OperatuerForm')->with('success', 'Category updated successfully');

    }
}
