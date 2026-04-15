<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // COUNT DATA
        $users = User::count();
        $products = Product::count();

        // DUMMY (nanti upgrade)
        $orders = 12;
        $revenue = 15000000;

        // DATA TABLE
        $latestUsers = User::latest()->take(5)->get();

        return view('admin.dashboard.index', compact(
            'users',
            'products',
            'orders',
            'revenue',
            'latestUsers'
        ));
    }
}