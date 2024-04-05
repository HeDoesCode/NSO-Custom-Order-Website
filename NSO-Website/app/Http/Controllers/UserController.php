<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Make sure to import the Order model

class UserController extends Controller
{
    public function displayOrdersDashboard()
{
    // Retrieve only the orders related to the currently authenticated user and paginate them
    $userOrders = auth()->user()->orders()->latest()->paginate(5); // Paginate with 10 items per page, you can adjust this number as needed

    return view('dashboard', ['orders' => $userOrders]);
}

}
