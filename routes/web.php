<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () { return view('home'); });
Route::get('/about', function () { return view('about'); });
Route::get('/contact', function () { return view('contact'); });
Route::get('/admin', function () { return view('admin.dashboard'); });

// Cukup satu baris ini saja untuk semua route users
Route::resource('admin/users', UserController::class);