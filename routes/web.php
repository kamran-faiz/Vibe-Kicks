<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/cart', function (){
    return Inertia::render('Cart');
});

Route::get('/', [ProductController::class, 'featured'])->name('welcome');

Route::get('/shop', [ProductController::class, 'index'])->name('shop');

Route::get('/collections' , function (){
    return Inertia::render('Collections');
});

Route::get('/our-story', function (){
    return Inertia::render('About');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/checkout',[CheckoutController::class, 'store'])->name('checkout');
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
});

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');

require __DIR__.'/auth.php';
