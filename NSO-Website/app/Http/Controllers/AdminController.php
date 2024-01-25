<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeaturedProducts;

class AdminController extends Controller
{
    public function displayFeaturedProductsDashboard() {
        $featuredProducts = FeaturedProducts::all();
        return view('admin.featuredproducts', ['featuredProducts' => $featuredProducts]);
    }

    public function displayCreateFeaturedProducts() {
        return view('admin.createfeaturedproducts');
    }

    public function save(Request $request) {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:2048',
            'description' => 'required',
            'link' => 'required'
        ]);

        $newImageName = time() . "_" . uniqid("", true) . $request->image->extension();
        $request->image->move(public_path('images/featured products'), $newImageName);
        
        FeaturedProducts::create([ // adds record to db
            'image' => $newImageName,
            'description' => $request->description,
            'link' => $request->link
        ]);

        return redirect(route('admin.featuredproducts'));
    }

    public function delete(FeaturedProducts $product) {
        unlink(public_path('images/featured products/'.$product->image)); // delete image in file folder
        $product->delete(); // delete db record
        
        return redirect(route('admin.featuredproducts'));
    }
}
