<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use App\Models\FeaturedProducts;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\User;
use App\Notifications\FeedbackAvailable;
use App\Notifications\OrderUpdated;

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
    public function displayFeaturedProductsDashboard(Request $request) {
        $featuredProducts = FeaturedProducts::paginate(5); 
    
    
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
            'title' => 'required|max:200|unique:featured_products,title',
            'description' => 'required|max:1500',
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
            'title' => 'required|max:200',
            'description' => 'required|max:1500',
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
        $feedbacks = Feedback::paginate(5); // Paginate with 10 feedbacks per page
        return view('admin.view feedback.index', ['feedbacks' => $feedbacks]);
    }
    


    //for orders
    public function displayOrdersDashboard(Request $request)
{
    
    if ($request->has('query')) {
        $query = $request->input('query');

        $orders = DB::table('order_details')
            ->join('users', 'order_details.username', '=', 'users.username')
            ->select('order_details.*', 'users.firstName', 'users.lastName')
            ->where('order_details.username', 'like', '%' . $query . '%')
            ->orWhere('order_details.type', 'like', '%' . $query . '%')
            ->orWhere('order_details.size', 'like', '%' . $query . '%')
            ->orWhere('order_details.design_text', 'like', '%' . $query . '%')
            ->orWhere('order_details.price', 'like', '%' . $query . '%')
            ->orWhere('order_details.mode_of_payment', 'like', '%' . $query . '%')
            ->orWhere('order_details.status', 'like', '%' . $query . '%')
            ->orderByDesc('order_details.created_at') 
            ->paginate(10); 

        
        return view('admin.home', ['orders' => $orders, 'query' => $query]);
    }

   
    $orders = DB::table('order_details')
        ->join('users', 'order_details.username', '=', 'users.username')
        ->select('order_details.*', 'users.firstName', 'users.lastName')
        ->orderByDesc('order_details.created_at') 
        ->paginate(10); 

    return view('admin.home', ['orders' => $orders]);
}


    public function showOrderDetail($id) {
        $order = Order::find($id); 
        $user = DB::table('users')
            ->select('firstName', 'lastName', 'contact', 'deliveryAddress')
            ->where('username','=',$order->username)
            ->get();

        return view('admin.orderdetails', ['order' => $order, 'user' => $user]);
    }

    public function updateOrder(Request $request, $id) {
        $request->validate([
            'price' => 'nullable|numeric|gt:0|max:500000', 
            'status' => 'required|in:Order Placed,Processing Order,To Ship,Order Completed,Order Cancelled', 
        ], [
            'price.gt' => 'The price must be greater than zero.',
        ]);
    
        $order = Order::findOrFail($id);
        $user = User::where('username','=',$order->username)->first();
    
        $order->update([
            'price' => $request->input('price'),
            'status' => $request->has('status') ? $request->input('status') : 'Order Placed',
        ]);
    
        $user->notify(new OrderUpdated());
        
        if ($order->status == "Order Completed") {
            $user->notify(new FeedbackAvailable());
        }
        
        return redirect()->back()->with('order_updated', 'Order updated successfully');
    }
    
}
