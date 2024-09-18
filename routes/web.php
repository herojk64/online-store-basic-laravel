<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

// Home route
Route::get('/',[HomeController::class,'index']);
Route::get('/home',[HomeController::class,'index'])->name('home');


// Product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

// Cart routes
Route::post('/cart/add', [CartController::class, 'add'])->middleware('auth')->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->middleware('auth')->name('cart.index');
Route::post('/cart/remove', [CartController::class, 'remove'])->middleware('auth')->name('cart.remove');

// Order routes
Route::get('/checkout', [OrderController::class, 'index'])->middleware('auth')->name('checkout.index');
Route::post('/checkout', [OrderController::class, 'store'])->middleware('auth')->name('checkout.store');

Auth::routes();

Route::get('/about', function () {
    return view('about');
})->name('about');

// Profile route
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/dashboard', [ProfileController::class, 'dashboard'])->name('profile.dashboard');
});
