<?php
require __DIR__.'/auth.php';

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/order/create', function() {
    return view('order.create');
})->middleware(['auth', 'verified'])->name('order.create');

Route::controller(ProfileController::class)->group(function() {
    Route::middleware('auth')->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

Route::controller(AdminController::class)->group(function() {
    // views
    Route::get('/admin/featured-products/', 'displayFeaturedProductsDashboard')->name('admin.featured products.index');
    Route::get('/admin/featured-products/create', 'displayCreateFeaturedProducts')->name('admin.featured products.create');
    Route::get('/admin/featured-products/edit/{product}', 'displayEditFeaturedProducts')->name('admin.featured products.edit');
    
    // operations
    Route::post('/admin/featured-products/save', 'save')->name('admin.featured products.save');
    Route::put('/admin/featured-products/update/{product}', 'update')->name('admin.featured products.update');
    Route::delete('/admin/featured-products/delete/{product}', 'delete')->name('admin.featured products.delete');
});