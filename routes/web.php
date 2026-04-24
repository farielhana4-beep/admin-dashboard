<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\PortfolioController;
use App\Http\Controllers\Admin\ExperienceController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\HeroSectionController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ContactController;

// =====================
// FRONTEND
// =====================
Route::get('/', [FrontendController::class, 'index'])->name('home');

// CONTACT (frontend kirim pesan)
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// =====================
// LOGIN
// =====================
Route::get('/login', [LoginController::class, 'showLogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

// =====================
// ADMIN AREA
// =====================
Route::middleware('auth')->prefix('admin')->group(function(){

    // DASHBOARD
    Route::get('/', [DashboardController::class,'index'])->name('dashboard');

    // CONTACT ADMIN (halaman setting contact)
    Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

    // HERO
    Route::resource('hero', HeroSectionController::class);

    // CRUD
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('portfolios', PortfolioController::class);
    Route::resource('experiences', ExperienceController::class);
    Route::resource('skills', SkillController::class);

    // ABOUT
    Route::get('/about', [AboutController::class, 'index'])->name('about.index');
    Route::post('/about', [AboutController::class, 'store'])->name('about.store');

    // PROFILE
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

    // LOGOUT
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

});