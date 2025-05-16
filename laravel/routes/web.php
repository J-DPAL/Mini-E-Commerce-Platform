<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Products - Only authenticated users can manage products
Route::middleware('auth')->group(function () {
    Route::resource('products', ProductController::class);
});

// Cart routes (no auth required to view or manipulate cart)
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{product}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{product}', [CartController::class, 'remove'])->name('cart.remove');

// Checkout routes (requires auth)
Route::middleware('auth')->group(function () {
    Route::get('/checkout', [OrderController::class, 'checkoutForm'])->name('checkout.form');
    Route::post('/checkout', [OrderController::class, 'placeOrder'])->name('checkout.place');
    Route::get('/order-success', [OrderController::class, 'orderSuccess'])->name('orders.success');
});

// Admin-only routes using is_admin middleware
Route::middleware(['auth', IsAdmin::class])->group(function () {
    Route::get('/admin/orders', [OrderController::class,'adminOrders'])->name('admin.orders');
    Route::get('/admin/orders/{id}', [OrderController::class,'show'])->name('admin.orders.show');
});

