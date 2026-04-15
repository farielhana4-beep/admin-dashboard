<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;


// =====================
// LOGIN
// =====================
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);


// =====================
// PROTECTED ROUTE
// =====================
Route::middleware('auth')->group(function(){

    Route::get('/', [DashboardController::class,'index']);

    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

});