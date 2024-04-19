<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Models\User;
use App\Models\category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardsController extends Controller
{
    //
    public function AdminDash(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $users = User::where('roles', 'Operatuer')->get()->count();
        $books = book::get()->count();
        $categorys = category::get()->count();
        return view('Dashboards.Admin', compact('users', 'books', 'categorys'));
    }
    public function OpertuerDash(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        $user = auth()->user()->id;
        $yourBooks = book::where('user_id', $user)->get()->count();
        $books = book::get()->count();
        $categorys = category::get()->count();
        return view('Dashboards.Opertuer', compact('books', 'yourBooks', 'categorys'));
    }
    public function ClientDash(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('welcome');
    }


   
}
