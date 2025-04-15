<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Getting the authenticated user
        $user = auth()->user();
        
        // Passing the user name to the view
        return view('dashboard', compact('user'));
    }
}
