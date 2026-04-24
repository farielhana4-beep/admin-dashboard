<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('admin.profile.index', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $data = $request->only(['name', 'email']);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('profile', 'public');
            $data['photo'] = $path;
        }

        $user->update($data);

        return back()->with('success', 'Profile berhasil diupdate');
        return redirect()->route('dashboard')->with('success', 'Profile berhasil diupdate');
    }
}