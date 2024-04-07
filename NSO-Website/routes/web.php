<?php
require __DIR__.'/auth.php';
require __DIR__.'/adminauth.php';

use App\Models\Feedback;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\XMLRequestController;

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

Route::get('/', [AdminController::class, 'displayHomePage'])->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [AdminController::class, 'displayHomePage'])->name('home');
    
    Route::get('/dashboard', [UserController::class, 'displayOrdersDashboard'])->name('dashboard');

    Route::controller(ProfileController::class)->group(function() {
        // view
        Route::get('/profile', 'edit')->name('profile.edit');
        
        // operation
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    }); 

    Route::controller(OrderController::class)->group(function() {
        // view
        Route::get('/order/create', 'displayOrderForm')->name('order.create');
        Route::get('/order/orderdetails/{id}', 'showOrderDetail')->name('order.orderdetails');

        //operation
        Route::post('/order/place', 'place')->name('order.place');
        
        //search
        Route::get('/order/search', 'search')->name('admin.orders.search');


    });

    Route::controller(FeedbackController::class)->group(function() {
        //view
        Route::get('/feedback/create/{orderId}','create')->name('feedback.create');
        //operation
        Route::post('/feedback/store/{orderId}',  'store')->name('feedback.store');
    });

});


Route::middleware('auth:admin')->group(function () {
    Route::controller(AdminController::class)->group(function() {
        // views
        Route::get('/admin/featured-products/', 'displayFeaturedProductsDashboard')->name('admin.featured products.index');
        Route::get('/admin/featured-products/create', 'displayCreateFeaturedProducts')->name('admin.featured products.create');
        Route::get('/admin/featured-products/edit/{product}', 'displayEditFeaturedProducts')->name('admin.featured products.edit');
        Route::get('/admin/view-feedback/', 'displayFeedbackDashboard')->name('admin.view feedback.index');
        Route::get('/admin/home', 'displayOrdersDashboard')->name('admin.home');
        Route::get('/admin/orderdetails/{id}', 'showOrderDetail')->name('admin.orderdetails');
        
        
        // operations
        Route::post('/admin/featured-products/save', 'save')->name('admin.featured products.save');
        Route::put('/admin/featured-products/update/{product}', 'update')->name('admin.featured products.update');
        Route::delete('/admin/featured-products/delete/{product}', 'delete')->name('admin.featured products.delete');
        Route::put('/admin/orders/update/{id}', 'updateOrder')->name('admin.updateOrder');
    });
});


Route::controller(XMLRequestController::class)->group(function () {
    Route::get('/region', 'getRegions');
    Route::get('/province/{regcode}', 'getProvinces');
    Route::get('/citymun/{provcode}', 'getCityMun');
    Route::get('/brgy/{brgycode}', 'getBarangay');
});






