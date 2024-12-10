@extends('layouts.app')

@section('title', 'Our Services - PK Guides & Tours')

@section('content')
<div class="container mx-auto px-6">
    <!-- Services Header -->
    <div class="bg-gradient-to-r from-[#5D9CA9] to-[#FAD6A5] rounded-lg shadow-xl p-12 text-white text-center mb-12">
        <h1 class="text-4xl font-bold mb-4">Our Services</h1>
        <p class="text-lg">Discover the range of exciting services we offer to make your adventure memorable</p>
    </div>

    <!-- Services Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <div class="p-6">
                <div class="w-16 h-16 bg-[#FAD6A5] rounded-full flex items-center justify-center mb-4">
                    <span class="text-2xl">🛡️</span>
                </div>
                <h2 class="text-xl font-bold text-[#5D9CA9] mb-4">Outdoors Safety Courses</h2>
                <p class="text-gray-600 mb-4">Stay safe while exploring the outdoors with our professional safety training courses.</p>
                @auth
                    <a href="{{ route('bookings.create') }}" class="btn-primary inline-block">Book Now</a>
                @else
                    <a href="{{ route('register') }}" class="btn-primary inline-block">Register to Book</a>
                @endauth
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <div class="p-6">
                <div class="w-16 h-16 bg-[#FAD6A5] rounded-full flex items-center justify-center mb-4">
                    <span class="text-2xl">🚴</span>
                </div>
                <h2 class="text-xl font-bold text-[#5D9CA9] mb-4">Cycle Tours</h2>
                <p class="text-gray-600 mb-4">Explore the scenic and adventurous rail trails on our cycle tours.</p>
                @auth
                    <a href="{{ route('bookings.create') }}" class="btn-primary inline-block">Book Now</a>
                @else
                    <a href="{{ route('register') }}" class="btn-primary inline-block">Register to Book</a>
                @endauth
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <div class="p-6">
                <div class="w-16 h-16 bg-[#FAD6A5] rounded-full flex items-center justify-center mb-4">
                    <span class="text-2xl">🏃</span>
                </div>
                <h2 class="text-xl font-bold text-[#5D9CA9] mb-4">Fun Trips</h2>
                <p class="text-gray-600 mb-4">Join us for bike trips through Islamabad forests or take part in our Murree Adventure Course.</p>
                @auth
                    <a href="{{ route('bookings.create') }}" class="btn-primary inline-block">Book Now</a>
                @else
                    <a href="{{ route('register') }}" class="btn-primary inline-block">Register to Book</a>
                @endauth
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-xl transition duration-300">
            <div class="p-6">
                <div class="w-16 h-16 bg-[#FAD6A5] rounded-full flex items-center justify-center mb-4">
                    <span class="text-2xl">📦</span>
                </div>
                <h2 class="text-xl font-bold text-[#5D9CA9] mb-4">Package Trips</h2>
                <p class="text-gray-600 mb-4">Complete packages including accommodation, bike hire, and pack hire.</p>
                @auth
                    <a href="{{ route('bookings.create') }}" class="btn-primary inline-block">Book Now</a>
                @else
                    <a href="{{ route('register') }}" class="btn-primary inline-block">Register to Book</a>
                @endauth
            </div>
        </div>
    </div>

    <!-- Features Section -->
    <section class="mb-12">
        <h2 class="text-3xl font-bold text-center text-[#5D9CA9] mb-8">Why Choose Our Services?</h2>
        <div class="grid md:grid-cols-3 gap-8">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="text-[#F48C06] text-2xl mb-4">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Safety First</h3>
                <p class="text-gray-600">All our activities are conducted with the highest safety standards and professional equipment.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="text-[#F48C06] text-2xl mb-4">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Expert Guides</h3>
                <p class="text-gray-600">Our team consists of experienced and certified guides who know the terrain inside out.</p>
            </div>

            <div class="bg-white p-6 rounded-lg shadow-md">
                <div class="text-[#F48C06] text-2xl mb-4">
                    <svg class="w-12 h-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-bold mb-2">Flexible Scheduling</h3>
                <p class="text-gray-600">Choose from various time slots that best suit your schedule and preferences.</p>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="bg-[#5D9CA9] text-white rounded-lg shadow-xl p-12 text-center">
        <h2 class="text-3xl font-bold mb-4">Ready to Start Your Adventure?</h2>
        <p class="text-lg mb-8">Book your service now and experience the best of what Pakistan has to offer.</p>
        @auth
            <a href="{{ route('bookings.create') }}" class="btn-secondary">Book Now</a>
        @else
            <a href="{{ route('register') }}" class="btn-secondary">Register to Book</a>
        @endauth
    </section>
</div>
@endsection