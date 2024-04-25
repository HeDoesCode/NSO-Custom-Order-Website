<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Notifications\OrderPlaced;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    private $orderDesignImagePath;

    public function __construct() {
        $this->orderDesignImagePath = public_path('images\\order design images\\');
    }
    

    public function showOrderDetail($id)
    {
        $order = Order::find($id); 
    
        return view('order.orderdetails', ['order' => $order]);
    }
    
    // user side
    public function displayOrderForm() {
        return view('order.create');
    }

    //search bar


    public function place(Request $request) {
        $request->validate([
            'type' => 'required',
            'design_text' => ['required', 'string', 'not_only_numeric'],
            'design_img' => 'nullable|mimes:jpg,jpeg,png|max:5120', // max of 5 mb image
            'size' => 'required',
            'quantity' => 'required|integer|min:1|max:30',
            'mode_of_payment' => 'required'
        ], [
            'design_text.not_only_numeric' => 'The design description must contain non-numeric characters.',
        ]);
        
        

        if ($request->design_img != null) {
            if (!file_exists($this->orderDesignImagePath)) {
                File::makeDirectory($this->orderDesignImagePath, 0777, true); 
            }

            $newImageName = time() . "_" . uniqid("", true). "." . $request->design_img->extension();
            $request->design_img->move($this->orderDesignImagePath, $newImageName);

            Order::create([
                'username' => $request->username,
                'type' => $request->type,
                'design_text' => $request->design_text,
                'design_img' => $newImageName,
                'size' => $request->size,
                'quantity' => $request->quantity,
                'mode_of_payment' => $request->mode_of_payment,
                'order_date' => date("Y-m-d"),
            ]);
        } else {
            Order::create([
                'username' => $request->username,
                'type' => $request->type,
                'design_text' => $request->design_text,
                'size' => $request->size,
                'quantity' => $request->quantity,
                'mode_of_payment' => $request->mode_of_payment,
                'order_date' => date("Y-m-d"),
            ]);
        }
        
        Admin::first()->notify(new OrderPlaced());
        return redirect(route('dashboard'))->with('success', 'Order successfully placed');
    }
}
