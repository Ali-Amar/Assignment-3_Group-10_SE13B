<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Tour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class BookingController extends Controller
{
    public function index()
    {
        // Get current user's ID
        $userId = Auth::id();
        
        // Query bookings directly using the User ID
        $bookings = Booking::where('user_id', $userId)
                          ->with('tour')
                          ->latest()
                          ->paginate(10);
        
        return view('bookings.index', compact('bookings'));
    }

    public function create(Tour $tour = null)
    {
        $tours = Tour::where('is_active', true)->get();
        return view('bookings.create', compact('tours', 'tour'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'tour_id' => 'required|exists:tours,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'preferred_date' => 'required|date|after:today',
            'message' => 'nullable|string'
        ]);

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'confirmed'; // Changed from 'pending' since there's no admin approval

        $booking = Booking::create($validated);

        return redirect()->route('bookings.show', $booking)
            ->with('success', 'Booking confirmed successfully.');
    }

    public function show(Booking $booking)
    {
        if (Auth::id() !== $booking->user_id) {
            abort(403);
        }
        return view('bookings.show', compact('booking'));
    }

    public function destroy(Booking $booking)
    {
        if (Auth::id() !== $booking->user_id) {
            abort(403);
        }
        
        $booking->delete();
        return redirect()->route('bookings.index')
            ->with('success', 'Booking cancelled successfully.');
    }
}