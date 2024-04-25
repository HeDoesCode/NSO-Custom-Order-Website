<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Order;
use App\Models\Feedback;
use App\Notifications\FeedbackPosted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class FeedbackController extends Controller
{
    private $feedbackImagesPath;

    public function __construct() {
        $this->feedbackImagesPath = public_path('images\\feedback images\\'); 
    }

    public function create($orderId)
    {
        $order = Order::findOrFail($orderId); // Fetch the order using the provided ID
        return view('feedback.create', compact('orderId', 'order'));
    }


public function store(Request $request, $orderId)
{
    $request->validate([
        'image' => 'nullable|mimes:jpg,jpeg,png|max:5120', // max of 5mb image
        'rating' => 'required|integer|between:1,5',
        'message' => 'nullable',
    ]);

    if (!file_exists($this->feedbackImagesPath)) {
        File::makeDirectory($this->feedbackImagesPath, 0777, true);
    }

    $newImageName = null;

    if ($request->hasFile('image') && $request->file('image')->isValid()) {
        $newImageName = time() . "_" . uniqid("", true) . $request->image->extension();
        $request->image->move($this->feedbackImagesPath, $newImageName);
    }

    $userId = Auth::id();

        Feedback::create([
            'order_id' => $orderId,
            'user_id' => $userId,
            'image' => $newImageName,
            'rating' => $request->rating,
            'message' => $request->message,
        ]);

    Admin::first()->notify(new FeedbackPosted());
    return redirect()->route('dashboard')->with('status', 'Feedback Submitted Successfully!');
}


}
