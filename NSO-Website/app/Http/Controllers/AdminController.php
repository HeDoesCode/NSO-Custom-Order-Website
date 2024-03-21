<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\FeaturedProducts;
use App\Models\Feedback;
use App\Models\Order;

class AdminController extends Controller
{
    private $featuredProductsImagesPath;

    public function __construct() {
        $this->featuredProductsImagesPath = public_path('images\\featured products\\'); 
    }

    //for featured products in home
    public function displayHomePage()
{
    $featuredProducts = FeaturedProducts::all(); 

    return view('welcome', ['featuredProducts' => $featuredProducts]);
}


    //for featured products dashboard
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
            'image' => 'required|mimes:jpg,jpeg,png|max:5120', 
            'title' => 'required',
            'description' => 'required',
            'link' => 'required|url'
        ]);

        if (!file_exists($this->featuredProductsImagesPath)) {
            File::makeDirectory($this->featuredProductsImagesPath, 0777, true); 
        }

        $newImageName = time() . "_" . uniqid("", true) . "." . $request->image->extension();
        $request->image->move($this->featuredProductsImagesPath, $newImageName);
        
        FeaturedProducts::create([ // adds record to db
            'image' => $newImageName,
            'title' => $request->title,
            'description' => $request->description,
            'link' => $request->link
        ]);

        return redirect(route('admin.featured products.index'))->with('success', 'Product Successfully Added');
    }

    public function update(FeaturedProducts $product, Request $request) {
        $request->validate([
            'image' => 'nullable|mimes:jpg,jpeg,png|max:5120', // max of 5mb image
            'title' => 'required',
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
        $product->title = $request->title;
        $product->description = $request->description;
        $product->link = $request->link;

        $product->save();

        return redirect(route('admin.featured products.index'))->with('success', 'Product Successfully Updated');
    }

    public function delete(FeaturedProducts $product) {
        unlink($this->featuredProductsImagesPath.$product->image); // delete image in file folder
        $product->delete(); // delete db record
        
        return redirect(route('admin.featured products.index'))->with('success', 'Product Successfully Deleted');
    }


    //for view feedback
    public function displayFeedbackDashboard() {
        $feedbacks = Feedback::all();
        return view('admin.view feedback.index', ['feedbacks' => $feedbacks]);
    }


    //for orders

    public function displayOrdersDashboard() {
        $orders = Order::all();
        return view('admin.home', ['orders' => $orders]);
    }

    public function showOrderDetail($id)
    {
        $order = Order::find($id); 
        $user = DB::table('users')
            ->select('firstName', 'lastName', 'contact', 'deliveryAddress')
            ->where('username','=',$order->username)
            ->get();

        return view('admin.orderdetails', ['order' => $order, 'user' => $user]);
    }

    public function updateOrder(Request $request, $id)
{
    $request->validate([
        'price' => 'numeric', 
        'status' => 'in:Order Placed,Processing Order,To Ship,Order Completed,Order Cancelled', 
    ]);

    $order = Order::findOrFail($id);

    $order->update([
        'price' => $request->input('price'),
        'status' => $request->has('status') ? $request->input('status') : 'Order Placed',
    ]);

    return redirect()->back()->with('order_updated', 'Order updated successfully');
}


}
