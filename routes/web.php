<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home'); });
Route::get('/about', function () { return view('about'); });
Route::get('/contact', function () { return view('contact'); });

Route::resource('customers', CustomerController::class);
Route::resource('categories', CategoryController::class);

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'showLoginForm')->name('login');
    Route::post('login', 'loginUser')->name('login.process');
});

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class)->names('admin.products');
});