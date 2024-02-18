<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class OrderController extends Controller
{
    private $orderDesignImagePath;

    public function __construct() {
        $this->orderDesignImagePath = public_path('images\\order design images\\');
    }
    
    // admin side
    
    // user side
    public function displayOrderForm() {
        return view('order.create');
    }

    public function place(Request $request) {
        $request->validate([
            'type' => 'required',
            'design_text' => 'required',
            'design_img' => 'nullable|mimes:jpg,jpeg,png|max:5120', // max of 5 mb image
            'size' => 'required',
            'quantity' => 'required|integer',
            'mode_of_payment' => 'required'
        ]);

        if ($request->design_img != null) {
            if (!file_exists($this->orderDesignImagePath)) {
                File::makeDirectory($this->orderDesignImagePath, 0777, true); 
            }

            $newImageName = time() . "_" . uniqid("", true). "." . $request->design_img->extension();
            $request->design_img->move($this->orderDesignImagePath, $newImageName);

            Order::create([
                'username' => $request->username,
                'deliveryAddress' => $request->deliveryAddress,
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
                'deliveryAddress' => $request->deliveryAddress,
                'type' => $request->type,
                'design_text' => $request->design_text,
                'size' => $request->size,
                'quantity' => $request->quantity,
                'mode_of_payment' => $request->mode_of_payment,
                'order_date' => date("Y-m-d"),
            ]);
        }
        
        return redirect(route('dashboard'))->with('success', 'Order successfully placed');
    }
}
