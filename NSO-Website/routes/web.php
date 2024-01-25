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

Route::controller(ProfileController::class)->group(function() {
    Route::middleware('auth')->group(function () {
        Route::get('/profile', 'edit')->name('profile.edit');
        Route::patch('/profile', 'update')->name('profile.update');
        Route::delete('/profile', 'destroy')->name('profile.destroy');
    });
});

Route::controller(AdminController::class)->group(function() {
    Route::get('/admin/featured-products', 'displayFeaturedProductsDashboard')->name('admin.featuredproducts');
    Route::get('/admin/create-featured-products', 'displayCreateFeaturedProducts')->name('admin.createfeaturedproducts');

    Route::post('/admin/create-featured-products/save', 'save')->name('admin.save');
    Route::delete('/admin/featured-products/{product}/delete', 'delete')->name('admin.delete');
});