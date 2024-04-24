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

    public function addProfilePic(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'image_de_profile' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);

        // Get the profile by ID
        $profile = User::findOrFail($id);

        // Check if a profile picture is provided
        if ($request->hasFile('image_de_profile')) {
            // Store the uploaded image
            $imagePath = $request->file('image_de_profile')->store('profile_pics', 'public');
            // Update the profile picture attribute
            $profile->image_de_profile = $imagePath;
            $profile->save();
        }

        // Redirect back or to any other page as needed
        return redirect()->back()->with('success', 'Profile picture added successfully.');
    }
    
    
    
    
}
