@extends('layouts.app')

@section('title', $tour->name . ' - PK Guides & Tours')

@section('content')
<div class="container mx-auto px-6">
    <div class="bg-white rounded-lg shadow-xl overflow-hidden mb-12">
        <!-- Tour Image -->
        <div class="relative h-96">
            @if($tour->image)
                <img src="{{ asset('storage/' . $tour->image) }}" 
                     alt="{{ $tour->name }}" 
                     class="w-full h-full object-cover">
            @else
                <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                    <span class="text-gray-400 text-xl">No image available</span>
                </div>
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
            <div class="absolute bottom-0 left-0 p-8 text-white">
                <h1 class="text-4xl font-bold mb-2">{{ $tour->name }}</h1>
                <div class="flex items-center gap-4">
                    <span class="bg-[#F48C06] px-3 py-1 rounded-full text-sm">
                        {{ ucfirst(str_replace('_', ' ', $tour->type)) }}
                    </span>
                    <span>{{ $tour->duration }}</span>
                </div>
            </div>
        </div>

        <!-- Tour Content -->
        <div class="grid md:grid-cols-3 gap-8 p-8">
            <!-- Main Content -->
            <div class="md:col-span-2 space-y-8">
                <div class="bg-white rounded-lg">
                    <h2 class="text-2xl font-bold text-[#5D9CA9] mb-4">Tour Description</h2>
                    <p class="text-gray-600 leading-relaxed">{{ $tour->description }}</p>
                </div>

                <!-- Tour Highlights -->
                <div class="bg-white rounded-lg">
                    <h2 class="text-2xl font-bold text-[#5D9CA9] mb-4">Tour Highlights</h2>
                    <ul class="space-y-4">
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Professional guide throughout the tour
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Safety equipment provided
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Scenic photo opportunities
                        </li>
                        <li class="flex items-start">
                            <svg class="w-6 h-6 text-green-500 mr-2 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Refreshments included
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Booking Sidebar -->
            <div class="md:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6 sticky top-24">
                    <h2 class="text-2xl font-bold text-[#5D9CA9] mb-4">Tour Details</h2>
                    <div class="space-y-4 mb-6">
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Price</span>
                            <span class="text-[#F48C06] font-bold text-xl">PKR {{ number_format($tour->price) }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Duration</span>
                            <span class="font-semibold">{{ $tour->duration }}</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-gray-600">Type</span>
                            <span class="font-semibold capitalize">{{ str_replace('_', ' ', $tour->type) }}</span>
                        </div>
                    </div>
                    @auth
                        <a href="{{ route('bookings.create', ['tour' => $tour->id]) }}" 
                           class="btn-primary w-full text-center block mb-4">Book Now</a>
                    @else
                        <a href="{{ route('login') }}" 
                           class="btn-primary w-full text-center block mb-4">Login to Book</a>
                        <p class="text-sm text-gray-600 text-center">
                            Don't have an account? 
                            <a href="{{ route('register') }}" class="text-[#5D9CA9] hover:underline">Register here</a>
                        </p>
                    @endauth
                </div>
            </div>
        </div>
    </div>
</div>
@endsection