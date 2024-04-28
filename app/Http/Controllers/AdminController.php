<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\User;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function index(){
        return view('Admin_funcs.addOperatuer');
    }
    public function index1(){
        $users = User::where('id', '!=', 1)->paginate(3); 
        return view('Admin_funcs.gestionOfOperatuers', compact('users'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'roles' => 'required',
            'password' => 'required'
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'roles' => $request->roles,
            'password' => $request->password,
        ]);
    
        $this->sendOperatorCredentialsEmail($user, $request->password);
        
        return redirect()->route('gestionofOperatuers')->with('success', 'User created successfully');
    }
    
    private function sendOperatorCredentialsEmail($user , $password)
    {
        Mail::send('emails.mail_operatuer', ['user' => $user, 'password' => $password], function ($message) use ($user) {
            $message->to($user->email, $user->name)
                ->subject('Your Operator Credentials');
        });
    }
    

    public function edit(User $user)
    {
        return view('Admin_funcs.updateUser', compact('user'));
    }

    // Update a user
    public function update(Request $request, User $user)
    {
        // Validate the request
        // dd($request);
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
        ]);

        // Update the user
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        return redirect()->route('gestionofOperatuers')->with('success', 'User updated successfully');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('gestionofOperatuers')->with('success', 'User deleted successfully');
    }
  
}
