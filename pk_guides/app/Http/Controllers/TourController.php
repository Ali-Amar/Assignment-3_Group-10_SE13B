<?php

namespace App\Http\Controllers;

use App\Models\Tour;

class TourController extends Controller
{
    public function index()
    {
        $tours = Tour::where('is_active', true)->get();
        return view('tours.index', compact('tours'));
    }

    public function show(Tour $tour)
    {
        return view('tours.show', compact('tour'));
    }
}