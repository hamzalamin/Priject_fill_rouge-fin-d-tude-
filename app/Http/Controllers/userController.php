<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class userController extends Controller
{
    //
    public function index(){
        return view('Auth_system.Regester');
    }

    public function Regester(Request $request){
        // dd($request);
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'roles' => 'required',
            'password' => 'required'
        ]);
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'roles' => $request->roles,
        ]);
        return view('welcome');

    }
    public function create(){
        // $allUsers = User::get();
    return view('Auth_system.LogIn_Of_Users');
    }

    public function loginOfUser(Request $request){
        $credentials = $request->only('email', 'password');
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            if($user->roles == 'Client'){
                return redirect()->route('ClientDash');
            } elseif($user->roles == 'Admin'){
                return redirect()->route('AdminDash');
            } elseif($user->roles == 'Operatuer'){
                return redirect()->route('OperatuerDash');
            }   
        }
    
        return back()->with('error', 'Invalid credentials.');
    }
    public function logout()
    {
        Session::flush(); 
        Auth::logout();
        return redirect()->route('login');
    }
    
}