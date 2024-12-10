@extends('layouts.app')

@section('title', 'Dashboard - PK Guides & Tours')

@section('content')
<div class="container mx-auto px-6 py-8">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-2xl font-bold mb-6">Welcome, {{ Auth::user()->name }}!</h2>
        
        <!-- Recent Bookings -->
        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4">My Recent Bookings</h3>
            @php
                $recentBookings = Auth::user()->bookings()->with('tour')->latest()->take(3)->get();
            @endphp

            @if($recentBookings->count() > 0)
                <div class="grid gap-4">
                    @foreach($recentBookings as $booking)
                        <div class="border rounded-lg p-4 hover:shadow-md transition-shadow">
                            <div class="flex justify-between items-start">
                                <div>
                                    <h4 class="font-semibold text-lg mb-2">{{ $booking->tour->name }}</h4>
                                    <p class="text-gray-600">Date: {{ $booking->preferred_date->format('M d, Y') }}</p>
                                    <p class="text-gray-600">Booking ID: #{{ $booking->id }}</p>
                                </div>
                                <span class="px-3 py-1 rounded-full text-sm 
                                    {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            </div>
                            <div class="mt-4">
                                <a href="{{ route('bookings.show', $booking) }}" 
                                   class="text-[#5D9CA9] hover:text-[#FAD6A5] font-medium">
                                    View Details →
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    <a href="{{ route('bookings.index') }}" class="text-[#5D9CA9] hover:text-[#FAD6A5] font-medium">
                        View All Bookings →
                    </a>
                </div>
            @else
                <div class="bg-gray-50 rounded-lg p-6 text-center">
                    <p class="text-gray-600 mb-4">You haven't made any bookings yet.</p>
                    <a href="{{ route('tours.index') }}" class="btn-primary">Browse Tours</a>
                </div>
            @endif
        </div>

        <!-- Quick Actions -->
        <div class="grid md:grid-cols-3 gap-6">
            <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-md transition-shadow">
                <h3 class="font-semibold mb-2">Book a Tour</h3>
                <p class="text-gray-600 mb-4">Explore our available tours and book your next adventure.</p>
                <a href="{{ route('tours.index') }}" class="btn-primary">Browse Tours</a>
            </div>

            <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-md transition-shadow">
                <h3 class="font-semibold mb-2">View Services</h3>
                <p class="text-gray-600 mb-4">Check out our range of services and activities.</p>
                <a href="{{ route('services.index') }}" class="btn-secondary">Our Services</a>
            </div>

            <div class="bg-gray-50 rounded-lg p-6 text-center hover:shadow-md transition-shadow">
                <h3 class="font-semibold mb-2">Profile Settings</h3>
                <p class="text-gray-600 mb-4">Update your profile information and preferences.</p>
                <a href="{{ route('profile.edit') }}" class="btn-secondary">Edit Profile</a>
            </div>
        </div>
    </div>
</div>
@endsection