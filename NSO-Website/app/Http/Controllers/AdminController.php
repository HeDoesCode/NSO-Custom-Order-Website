<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FeaturedProducts;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{
    private $featuredProductsImagesPath;

    public function __construct() {
        $this->featuredProductsImagesPath = public_path('images\\featured products\\'); 
    }

    public function displayFeaturedProductsDashboard() {
        $featuredProducts = FeaturedProducts::all();
        return view('admin.featured products.index', ['featuredProducts' => $featuredProducts]);
    }

    public function displayCreateFeaturedProducts() {
        return view('admin.featured products.create');
    }

    public function displayEditFeaturedProducts(FeaturedProducts $product) {
        return view('admin.featured products.edit', ['product' => $product]);
    }

    public function save(Request $request) {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png|max:5120', // max of 5mb image
            'description' => 'required',
            'link' => 'required|url'
        ]);

        if (!file_exists($this->featuredProductsImagesPath)) {
            File::makeDirectory($this->featuredProductsImagesPath, 0777, true); 
        }

        $newImageName = time() . "_" . uniqid("", true) . $request->image->extension();
        $request->image->move($this->featuredProductsImagesPath, $newImageName);
        
        FeaturedProducts::create([ // adds record to db
            'image' => $newImageName,
            'description' => $request->description,
            'link' => $request->link
        ]);

        return redirect(route('admin.featured products.index'))->with('success', 'product successfully added');
    }

    public function update(FeaturedProducts $product, Request $request) {
        $request->validate([
            'image' => 'nullable|mimes:jpg,jpeg,png|max:5120', // max of 5mb image
            'description' => 'required',
            'link' => 'required|url'
        ]);

        if ($request->image != null) {
            if (!file_exists($this->featuredProductsImagesPath)) {
                File::makeDirectory($this->featuredProductsImagesPath, 0777, true); 
            }
    
            $newImageName = time() . "_" . uniqid("", true) . $request->image->extension();
            $request->image->move($this->featuredProductsImagesPath, $newImageName);

            unlink($this->featuredProductsImagesPath.$product->image); // deletes old saved image

            $product->image = $newImageName;
        }

        $product->description = $request->description;
        $product->link = $request->link;

        $product->save();

        return redirect(route('admin.featured products.index'))->with('success', 'product successfully update');
    }

    public function delete(FeaturedProducts $product) {
        unlink($this->featuredProductsImagesPath.$product->image); // delete image in file folder
        $product->delete(); // delete db record
        
        return redirect(route('admin.featured products.index'))->with('success', 'product successfully deleted');
    }
}
