<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;


Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/home', function () {
    return view('welcome');
})->name('home');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');


Route::resource('products', ProductController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);


Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');


Route::get('/login', function () {
    return view('auth.login');
})->name('login');







