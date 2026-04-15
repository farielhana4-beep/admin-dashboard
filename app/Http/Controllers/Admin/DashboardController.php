<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        $users = User::count();
        $products = Product::count();
        $orders = 0;
        $revenue = 0;

        $latestUsers = User::latest()->take(5)->get();
        $latestProducts = Product::latest()->take(5)->get();

        return view('admin.dashboard.index', compact(
            'users',
            'products',
            'orders',
            'revenue',
            'latestUsers',
            'latestProducts'
        ));
    }
}