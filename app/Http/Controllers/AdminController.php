<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\category;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('Admin_funcs.addOperatuer');
    }
    public function index1(){
        $users = User::where('id', '!=', 1)->get();
        return view('Admin_funcs.gestionOfOperatuers', compact('users'));
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



    public function edit(User $user)
    {
        return view('Admin_funcs.updateUser', compact('user'));
    }

    // Update a user
    public function update(Request $request, User $user)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            // Add more validation rules as needed
        ]);

        // Update the user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            // Update other fields as needed
        ]);

        return redirect()->route('gestionofOperatuers')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('gestionofOperatuers')->with('success', 'User deleted successfully');
    }
    public function countsForStatic(){
        $users = User::where('roles', 'Operatuer')->get()->count();
        $books = book::get()->count();
        $categorys = category::get()->count();
        return view('Dashboards.Admin', compact('users', 'books', 'categorys'));
    }
}
