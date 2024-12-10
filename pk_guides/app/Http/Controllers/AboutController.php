<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;

class AboutController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('is_active', true)->get();
        return view('about', compact('testimonials'));
    }
}