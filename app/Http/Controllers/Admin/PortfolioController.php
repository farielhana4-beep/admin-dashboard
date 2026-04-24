<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function index()
    {
        $portfolios = Portfolio::latest()->get();
        return view('admin.portfolios.index', compact('portfolios'));
    }

    public function create()
    {
        return view('admin.portfolios.create');
    }

    public function store(Request $request)
    {
        // ✅ VALIDASI
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'video' => 'nullable|mimetypes:video/mp4,video/avi',
            'link' => 'nullable|url',
        ]);

        $imagePath = null;
        $videoPath = null;

        // upload image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('portfolios', 'public');
        }

        // upload video
        if ($request->hasFile('video')) {
            $videoPath = $request->file('video')->store('portfolios', 'public');
        }

        Portfolio::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'video' => $videoPath,
            'link' => $request->link,
        ]);

        return redirect()->route('portfolios.index')->with('success', 'Berhasil tambah portfolio');
    }

    public function edit($id)
    {
        $portfolio = Portfolio::findOrFail($id);
        return view('admin.portfolios.edit', compact('portfolio'));
    }

    public function update(Request $request, $id)
    {
        // ✅ VALIDASI
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,jpeg,png',
            'video' => 'nullable|mimetypes:video/mp4,video/avi',
            'link' => 'nullable|url',
        ]);

        $portfolio = Portfolio::findOrFail($id);

        $imagePath = $portfolio->image;
        $videoPath = $portfolio->video;

        // update image
        if ($request->hasFile('image')) {
            if ($portfolio->image) {
                Storage::disk('public')->delete($portfolio->image);
            }
            $imagePath = $request->file('image')->store('portfolios', 'public');
        }

        // update video
        if ($request->hasFile('video')) {
            if ($portfolio->video) {
                Storage::disk('public')->delete($portfolio->video);
            }
            $videoPath = $request->file('video')->store('portfolios', 'public');
        }

        $portfolio->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'video' => $videoPath,
            'link' => $request->link,
        ]);

        return redirect()->route('portfolios.index')->with('success', 'Berhasil update');
    }

    public function destroy($id)
    {
        $portfolio = Portfolio::findOrFail($id);

        // hapus file juga
        if ($portfolio->image) {
            Storage::disk('public')->delete($portfolio->image);
        }

        if ($portfolio->video) {
            Storage::disk('public')->delete($portfolio->video);
        }

        $portfolio->delete();

        return redirect()->back()->with('success', 'Berhasil hapus');
    }
}