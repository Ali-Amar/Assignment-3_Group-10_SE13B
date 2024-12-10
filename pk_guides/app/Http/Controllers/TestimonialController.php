<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('is_active', true)->get();
        return view('testimonials.index', compact('testimonials'));
    }

    // Admin-only methods
    public function create()
    {
        Gate::authorize('admin');
        return view('testimonials.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('admin');
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'designation' => 'nullable|string|max:255'
        ]);

        Testimonial::create($validated);

        return redirect()->route('testimonials.index')
            ->with('success', 'Testimonial created successfully.');
    }

    public function edit(Testimonial $testimonial)
    {
        Gate::authorize('admin');
        return view('testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        Gate::authorize('admin');
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'content' => 'required|string',
            'designation' => 'nullable|string|max:255'
        ]);

        $testimonial->update($validated);

        return redirect()->route('testimonials.index')
            ->with('success', 'Testimonial updated successfully.');
    }

    public function destroy(Testimonial $testimonial)
    {
        Gate::authorize('admin');
        
        $testimonial->delete();

        return redirect()->route('testimonials.index')
            ->with('success', 'Testimonial deleted successfully.');
    }
}