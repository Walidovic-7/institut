<?php

namespace App\Http\Controllers;

use App\Models\Training;

class HomeController extends Controller
{
    public function index()
    {
        $featuredTrainings = Training::where('is_featured', true)
            ->latest()
            ->take(6)
            ->get();

        return view('home', compact('featuredTrainings'));
    }
}

