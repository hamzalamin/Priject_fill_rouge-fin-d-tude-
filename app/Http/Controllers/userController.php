<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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

    public function Profile_view(){
        $user = auth()->user()->id;
        $user_info = User::where('id' , $user)->get();
        // dd($user_info);
        return view('profile' , compact('user_info'));
    }

    public function update_form_info($id)
    {
        $info = User::findOrFail($id);
        $user = auth()->user()->id;
        $user_info = User::where('id' , $user)->get();
        return view('profil_edit', ['info' => $info] ,compact('user_info'));
    }
    public function update_info(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6',
        ]);
    
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // If you're using bcrypt for password hashing
        ]);
    
        // Redirect the user to another page after the update
        return redirect()->route('Profile', $user->id)->with('success', 'User information updated successfully');
    }
    
    
    
}
