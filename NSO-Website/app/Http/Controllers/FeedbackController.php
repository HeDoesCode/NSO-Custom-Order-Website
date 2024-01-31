<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FeedbackController extends Controller
{
    private $feedbackImagesPath;

    public function __construct() {
        $this->feedbackImagesPath = public_path('images\\feedback images\\'); 
    }

    public function create()
{
    return view('feedback.create');
}

public function store(Request $request)
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

    Feedback::create([
        'image' => $newImageName,
        'rating' => $request->rating,
        'message' => $request->message,
    ]);

    return redirect()->route('feedback.create')->with('status', 'Feedback submitted successfully!');
}


}
