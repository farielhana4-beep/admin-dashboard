<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Experience;

class ExperienceController extends Controller
{
    public function index()
    {
        $experiences = Experience::latest()->get();
        return view('admin.experiences.index', compact('experiences'));
    }

    public function store(Request $request)
    {
        Experience::create([
            'position' => $request->position,
            'company' => $request->company,
            'location' => $request->location,
            'start_year' => $request->start_year,
            'end_year' => $request->end_year,
            'is_current' => $request->has('is_current'),
            'description' => $request->description,
        ]);

        return back()->with('success', 'Berhasil tambah experience');
    }

    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        return view('admin.experiences.edit', compact('experience'));
    }

    public function update(Request $request, $id)
    {
        $exp = Experience::findOrFail($id);

        $exp->update([
            'position' => $request->position,
            'company' => $request->company,
            'location' => $request->location,
            'start_year' => $request->start_year,
            'end_year' => $request->end_year,
            'is_current' => $request->has('is_current'),
            'description' => $request->description,
        ]);

        return redirect('/experiences')->with('success', 'Berhasil update');
    }

    public function destroy($id)
    {
        Experience::findOrFail($id)->delete();
        return back()->with('success', 'Berhasil hapus');
    }
}