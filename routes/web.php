<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\CreateOrder;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\ShoppingCart;
use App\Http\Controllers\OrderController;
Route::get('/',HomeController::class);

Route::get('search',SearchController::class)->name('search');

Route::get('categories/{category}',[CategoryController::class,'show'])->name('categories.show');

Route::get('products/{product}',[ProductController::class,'show'])->name('products.show');

Route::get('shopping-cart',ShoppingCart::class)->name('shopping-cart');

/*En RouteServiceProvider cambio la ruta de dashboard a '/'
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');*/

Route::get('orders/create', CreateOrder::class)->middleware('auth')->name('orders.create');

Route::get('orders/{order}/payment', [OrderController::class,'payment'])->middleware('auth')->name('orders.payment');


