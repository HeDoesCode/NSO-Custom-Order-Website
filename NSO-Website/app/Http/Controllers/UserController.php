<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function displayOrdersDashboard()
    {
        // Retrieve only the orders related to the currently authenticated user
        $userOrders = auth()->user()->orders;
    
        return view('dashboard', ['orders' => $userOrders]);
    }
}
