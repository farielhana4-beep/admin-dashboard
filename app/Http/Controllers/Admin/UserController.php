<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
   public function index(Request $request)
{
    $search = $request->search;

    $users = User::when($search, function ($query) use ($search) {
        $query->where('name', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%");
    })->paginate(5);

    return view('admin.users.index', compact('users'));
}

    public function create()
    {
        return view('admin.users.create');
    }

   public function store(Request $request)
{
    User::create([
    'name' => $request->name,
    'email' => $request->email,
    'password' => bcrypt('123456') // WAJIB ADA
]);

    return redirect()->route('users.index');
}

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
{
    $user->update([
        'name' => $request->name,
        'email' => $request->email,
    ]);

    return redirect()->route('users.index');
}

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}