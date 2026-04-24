<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Skill;

class SkillController extends Controller
{
    public function index()
    {
        $skills = Skill::latest()->get();
        return view('admin.skills.index', compact('skills'));
    }

    public function create()
    {
        return view('admin.skills.create');
    }

    public function store(Request $request)
    {
        // ✅ VALIDASI WAJIB
        $request->validate([
            'name' => 'required',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        Skill::create([
            'name' => $request->name,
            'percentage' => $request->percentage,
        ]);

        return redirect()->route('skills.index')->with('success', 'Skill berhasil ditambahkan');
    }

    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('admin.skills.edit', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        // ✅ VALIDASI
        $request->validate([
            'name' => 'required',
            'percentage' => 'required|numeric|min:0|max:100',
        ]);

        $skill = Skill::findOrFail($id);

        $skill->update([
            'name' => $request->name,
            'percentage' => $request->percentage,
        ]);

        return redirect()->route('skills.index')->with('success', 'Skill berhasil diupdate');
    }

    public function destroy($id)
    {
        Skill::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Skill berhasil dihapus');
    }
}