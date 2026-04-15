<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
   public function index(Request $request)
{
    $search = $request->search;

    $products = Product::when($search, function ($query) use ($search) {
        $query->where('name', 'like', "%$search%");
    })->paginate(5);

    return view('admin.products.index', compact('products'));
}

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
{
    Product::create([
        'name' => $request->name,
        'price' => $request->price,
        'condition' => $request->condition,
        'status' => $request->status,
    ]);

    return redirect()->route('products.index')
        ->with('success', 'Product berhasil ditambahkan!');
}

    
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}