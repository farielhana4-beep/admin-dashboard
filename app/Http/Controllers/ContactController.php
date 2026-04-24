<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::first();
        return view('admin.contact.index', compact('contact'));
    }

    public function store(Request $request)
    {
        Contact::updateOrCreate(
            ['id' => 1],
            [
                'email' => $request->email,
                'whatsapp' => $request->whatsapp,
                'github' => $request->github,
                'instagram' => $request->instagram,
            ]
        );

        return back()->with('success', 'Contact berhasil disimpan');
    }
}