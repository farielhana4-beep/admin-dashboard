<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about.index', compact('about'));
    }

    public function store(Request $request)
    {
        // ✅ VALIDASI (WAJIB DI SINI)
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $data = $request->only([
            'name',
            'email',
            'bio',
            'whatsapp',
            'github'
        ]);

        // HANDLE FOTO
        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('about', 'public');
        }

        // SIMPAN / UPDATE
        About::updateOrCreate(['id' => 1], $data);

        // ✅ JANGAN back() kalau mau keliatan berubah
        return redirect()->route('about.index')->with('success', 'Berhasil disimpan');
    }
}