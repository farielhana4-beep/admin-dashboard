<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\HeroSection;
use App\Models\About;
use App\Models\Contact;

// =====================
// PRODUCTS
// =====================
Route::get('/products', function () {
    return response()->json([
        'status' => true,
        'data' => Product::latest()->get()
    ]);
});

Route::get('/products/{id}', function ($id) {
    return response()->json([
        'status' => true,
        'data' => Product::findOrFail($id)
    ]);
});

// =====================
// HERO
// =====================
Route::get('/hero', function () {
    return response()->json([
        'data' => HeroSection::first()
    ]);
});

// =====================
// ABOUT
// =====================
Route::get('/about', function () {
    return response()->json([
        'data' => About::first()
    ]);
});

// =====================
// CONTACT
// =====================
Route::get('/contact', function () {
    return response()->json([
        'data' => Contact::first()
    ]);
});