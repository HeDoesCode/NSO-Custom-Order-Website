<?php
require __DIR__.'/auth.php';
require __DIR__.'/adminauth.php';

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;
use App\Models\Feedback;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function() {
        return view('dashboard');
    })->name('dashboard');

    Route::controller(ProfileController::class)->group(function() {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    }); 

    Route::controller(OrderController::class)->group(function() {
        Route::get('/order/create', 'displayOrderForm')->name('order.create');
        Route::post('/order/place', 'place')->name('order.place');
    });
});

Route::controller(AdminController::class)->group(function() {
    // views
    Route::get('/admin/featured-products/', 'displayFeaturedProductsDashboard')->name('admin.featured products.index');
    Route::get('/admin/featured-products/create', 'displayCreateFeaturedProducts')->name('admin.featured products.create');
    Route::get('/admin/featured-products/edit/{product}', 'displayEditFeaturedProducts')->name('admin.featured products.edit');
    Route::get('/admin/view-feedback/', 'displayFeedbackDashboard')->name('admin.view feedback.index');
    
    // operations
    Route::post('/admin/featured-products/save', 'save')->name('admin.featured products.save');
    Route::put('/admin/featured-products/update/{product}', 'update')->name('admin.featured products.update');
    Route::delete('/admin/featured-products/delete/{product}', 'delete')->name('admin.featured products.delete');
});

Route::get('/admin/dashboard', function () {
    return view('admin.home');
})->middleware(['auth:admin', 'verified'])->name('admin.home');

Route::controller(FeedbackController::class)->group(function() {
    //view
    Route::get('/feedback/create','create')->name('feedback.create');
    //operation
    Route::post('/feedback/store',  'store')->name('feedback.store');
});
