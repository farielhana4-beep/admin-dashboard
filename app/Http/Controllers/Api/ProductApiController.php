<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'List Products',
            'data' => Product::latest()->get()
        ]);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'status' => false,
                'message' => 'Product tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'status' => true,
            'data' => $product
        ]);
    }
}