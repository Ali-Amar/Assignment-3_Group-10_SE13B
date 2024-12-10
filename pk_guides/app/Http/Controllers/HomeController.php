<?php

namespace App\Http\Controllers;

use App\Models\Tour;
use App\Models\Service;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        $services = Service::where('is_active', true)->take(3)->get();
        $testimonials = Testimonial::where('is_active', true)->take(3)->get();
        $featuredTours = Tour::where('is_active', true)->take(4)->get();

        return view('home', compact('services', 'testimonials', 'featuredTours'));
    }
}