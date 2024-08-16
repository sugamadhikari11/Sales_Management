<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\PreventBackButton;
use App\Http\Middleware\NoCache;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StockController;

// Middleware for protected routes
Route::middleware(['auth', 'verified', PreventBackButton::class, NoCache::class])->group(function () {
    Route::view('/', 'welcome')->name('home');

    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');

    Route::get('/report', [ReportController::class, 'index'])->name('report.index');

    Route::resource('products', ProductController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);

    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');

    Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
    
    // Change Password Routes
    Route::get('/settings/change-password', [AuthController::class, 'showChangePasswordForm'])->name('settings.change-password');
    Route::post('/settings/change-password', [AuthController::class, 'changePassword'])->name('settings.update-password');
});

// Public Routes
Route::middleware('guest')->group(function () {
    // Login Routes
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

    // Registration Routes
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

    // Forgot Password Routes
    Route::get('/password/reset', [AuthController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [AuthController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [AuthController::class, 'reset'])->name('password.update');

    // Email Verification Routes
    Route::get('/email/verify', function () {
        return view('auth.verify-email');
    })->middleware('auth')->name('verification.notice');

    Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verify'])
        ->middleware(['auth', 'signed'])
        ->name('verification.verify');

    Route::post('/email/resend', [AuthController::class, 'resendVerificationEmail'])
        ->middleware(['auth', 'throttle:6,1'])
        ->name('verification.resend');
});

// Logout Route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
