<?php

namespace App\Http\Controllers;

use App\Models\book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardsController extends Controller
{
    //
    public function AdminDash(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('Dashboards.Admin');
    }
    public function OpertuerDash(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('Dashboards.Opertuer');
    }
    public function ClientDash(){
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        return view('Dashboards.Client');
    }


   
}
