<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;


Route::get('/', [DashboardController::class,'index']);

Route::resource('users', UserController::class);
Route::resource('products', ProductController::class);