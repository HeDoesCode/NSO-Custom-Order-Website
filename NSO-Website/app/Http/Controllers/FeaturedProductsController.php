<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeaturedProductsController extends Controller
{
    public function featuredProducts() {
        return view('admin.featuredProducts');
    }
}
