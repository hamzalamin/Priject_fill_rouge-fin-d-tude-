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
            'name' => 'required|min:4',
            'email' => 'required|email|unique:users',
            'roles' => 'required',
            'password' => 'required|min:8',
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'roles' => $request->roles,
        ]);
        return redirect()->route('login')->with('success', 'you can log in right now');

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
                return redirect()->route('home');
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
