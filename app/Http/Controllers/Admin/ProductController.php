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
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'video' => 'nullable|mimes:mp4,mov,avi'
        ]);

        // upload image
        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('products', 'public');
        }

        // upload video
        $video = null;
        if ($request->hasFile('video')) {
            $video = $request->file('video')->store('videos', 'public');
        }

        Product::create([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'condition' => $request->condition,
            'status' => $request->status,
            'image' => $image,
            'video' => $video,
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
        $image = $product->image;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('products', 'public');
        }

        $video = $product->video;
        if ($request->hasFile('video')) {
            $video = $request->file('video')->store('videos', 'public');
        }

        $product->update([
            'name' => $request->name,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'condition' => $request->condition,
            'status' => $request->status,
            'image' => $image,
            'video' => $video,
        ]);

        return redirect()->route('products.index')
            ->with('success', 'Product berhasil diupdate!');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}