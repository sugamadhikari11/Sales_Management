<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReportController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/report', [ReportController::class, 'index'])->name('report.index');

Route::resource('products', ProductController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);


Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');

Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');