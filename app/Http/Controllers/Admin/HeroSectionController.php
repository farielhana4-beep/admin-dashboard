<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSection;

class HeroSectionController extends Controller
{
    // =====================
    // INDEX
    // =====================
    public function index()
    {
        $hero = HeroSection::first();
        return view('admin.hero.index', compact('hero'));
    }

    // =====================
    // CREATE
    // =====================
    public function create()
    {
        $hero = HeroSection::first(); // biar bisa edit juga
        return view('admin.hero.create', compact('hero'));
    }

    // =====================
    // STORE
    // =====================
    public function store(Request $request)
    {
        // VALIDASI (WAJIB BIAR GA ERROR)
        $request->validate([
            'headline' => 'required|string|max:255',
            'subheadline' => 'nullable|string|max:255',
            'cta_text' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        $data = $request->only([
            'headline',
            'subheadline',
            'cta_text'
        ]);

        // HANDLE IMAGE
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('hero', 'public');
        }

        HeroSection::updateOrCreate(
            ['id' => 1],
            $data
        );

        return redirect()->route('hero.index')->with('success', 'Hero berhasil disimpan');
    }
}