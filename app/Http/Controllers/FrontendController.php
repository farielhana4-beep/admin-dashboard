<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSection;
use App\Models\About;
use App\Models\Portfolio;
use App\Models\Skill;
use App\Models\Contact; // 🔥 TAMBAH INI

class FrontendController extends Controller
{
    public function index()
    {
        $hero = HeroSection::first();
        $about = About::first();
        $portfolios = Portfolio::latest()->get();
        $skills = Skill::all();
        $contact = Contact::first(); // 🔥 TAMBAH INI

        return view('frontend.index', compact(
            'hero',
            'about',
            'portfolios',
            'skills',
            'contact' // 🔥 TAMBAH INI
        ));
    }
}