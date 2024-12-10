@extends('layouts.app')

@section('title', 'Booking Details - PK Guides & Tours')

@section('content')
<div class="container mx-auto px-6">
    <!-- Booking Header -->
    <section class="mb-12">
        <div class="bg-gradient-to-r from-[#5D9CA9] to-[#FAD6A5] rounded-lg shadow-xl p-12 text-white">
            <div class="flex justify-between items-center">
                <div>
                    <h1 class="text-4xl font-bold mb-4">Booking Details</h1>
                    <p class="text-lg">Reference ID: #{{ $booking->id }}</p>
                </div>
                <div>
                    <a href="{{ route('bookings.index') }}" class="btn-secondary">
                        Back to Bookings
                    </a>
                </div>
            </div>
        </div>
    </section>

    <div class="grid md:grid-cols-3 gap-8 mb-12">
        <!-- Main Booking Details -->
        <div class="md:col-span-2 space-y-6">
            <!-- Tour Information -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-[#5D9CA9] mb-4">Tour Information</h2>
                    <div class="space-y-4">
                        <div>
                            <h3 class="font-semibold">{{ $booking->tour->name }}</h3>
                            <p class="text-gray-600">{{ $booking->tour->description }}</p>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <span class="text-gray-600">Duration:</span>
                                <span class="font-semibold">{{ $booking->tour->duration }}</span>
                            </div>
                            <div>
                                <span class="text-gray-600">Type:</span>
                                <span class="font-semibold capitalize">{{ str_replace('_', ' ', $booking->tour->type) }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-[#5D9CA9] mb-4">Contact Information</h2>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <span class="text-gray-600">Name:</span>
                            <span class="font-semibold">{{ $booking->name }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600">Email:</span>
                            <span class="font-semibold">{{ $booking->email }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600">Phone:</span>
                            <span class="font-semibold">{{ $booking->phone }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600">Preferred Date:</span>
                            <span class="font-semibold">{{ $booking->preferred_date->format('M d, Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>

            @if($booking->message)
                <!-- Additional Message -->
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <div class="p-6">
                        <h2 class="text-2xl font-bold text-[#5D9CA9] mb-4">Additional Message</h2>
                        <p class="text-gray-600">{{ $booking->message }}</p>
                    </div>
                </div>
            @endif
        </div>

        <!-- Booking Status Sidebar -->
        <div class="md:col-span-1">
            <div class="bg-white rounded-lg shadow-md sticky top-24">
                <div class="p-6">
                    <h2 class="text-2xl font-bold text-[#5D9CA9] mb-4">Booking Status</h2>
                    
                    <!-- Status -->
                    <div class="mb-6">
                        <span class="px-4 py-2 rounded-full text-sm font-semibold 
                            {{ $booking->status === 'confirmed' ? 'bg-green-100 text-green-800' : 
                               ($booking->status === 'cancelled' ? 'bg-red-100 text-red-800' : 
                               'bg-yellow-100 text-yellow-800') }}">
                            {{ ucfirst($booking->status) }}
                        </span>
                    </div>

                    <!-- Price Details -->
                    <div class="border-t border-gray-200 pt-4 mb-6">
                        <div class="flex justify-between items-center mb-2">
                            <span class="text-gray-600">Tour Price</span>
                            <span class="font-semibold">PKR {{ number_format($booking->tour->price) }}</span>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="space-y-4">
                        @if($booking->status === 'pending')
                            <form action="{{ route('bookings.destroy', $booking) }}" 
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to cancel this booking?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="w-full btn-secondary text-red-600 hover:text-red-800">
                                    Cancel Booking
                                </button>
                            </form>
                        @endif
                        
                        @if($booking->status === 'confirmed')
                            <div class="bg-green-50 border border-green-200 rounded-md p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-green-800">Booking Confirmed</h3>
                                        <div class="mt-2 text-sm text-green-700">
                                            <p>Your booking has been confirmed. We look forward to seeing you on {{ $booking->preferred_date->format('M d, Y') }}!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if($booking->status === 'cancelled')
                            <div class="bg-red-50 border border-red-200 rounded-md p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <h3 class="text-sm font-medium text-red-800">Booking Cancelled</h3>
                                        <div class="mt-2 text-sm text-red-700">
                                            <p>This booking has been cancelled. Feel free to book another tour!</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection