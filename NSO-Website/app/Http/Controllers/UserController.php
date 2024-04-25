<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order; // Make sure to import the Order model

class UserController extends Controller
{
    public function displayOrdersDashboard(Request $request)
{
    $query = $request->input('query');
    $status = $request->input('status');
    $orderDate = $request->input('order_date');

    $userOrders = auth()->user()->orders()->latest();

    if ($query) {
        $userOrders->where(function($q) use ($query) {
            $q->where('design_text', 'like', '%' . $query . '%')
              ->orWhere('mode_of_payment', 'like', '%' . $query . '%')
              ->orWhere('type', 'like', '%' . $query . '%')
              ->orWhere('size', 'like', '%' . $query . '%')
              ->orWhere('price', 'like', '%' . $query . '%')
              ->orWhere('status', 'like', '%' . $query . '%')
              ->orWhere('order_date', 'like', '%' . $query . '%')
              ->orWhere('received_date', 'like', '%' . $query . '%');
        });
    }

    if ($status) {
        $userOrders->where('status', $status);
    }

    if ($orderDate) {
        $userOrders->whereDate('order_date', $orderDate);
    }

    $userOrders = $userOrders->paginate(5);

    return view('dashboard', ['orders' => $userOrders]);
}


}
