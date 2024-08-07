<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');


// Route to display the product page (assuming 'product' is the name of the page)
Route::get('/products', [ProductController::class, 'index'])->name('products.index');

// Route to handle the form submission for adding a new product
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');