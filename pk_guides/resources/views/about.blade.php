@extends('layouts.app')

@section('title', 'About Us - PK Guides & Tours')

@section('content')
<div class="container mx-auto px-6">
    <!-- About Header -->
    <section class="mb-12">
        <div class="bg-gradient-to-r from-[#5D9CA9] to-[#FAD6A5] rounded-lg shadow-xl p-12 text-white">
            <h1 class="text-4xl font-bold mb-6">About PK Guides & Tours</h1>
            <p class="text-lg">Your gateway to discovering the incredible beauty and adventures that Pakistan has to offer.</p>
        </div>
    </section>

    <!-- Main Content -->
    <div class="grid md:grid-cols-2 gap-12 mb-12">
        <!-- About Content -->
        <div class="space-y-6">
            <div>
                <h2 class="text-2xl font-bold text-[#5D9CA9] mb-4">Our Story</h2>
                <p class="text-gray-600">For over two years, PK Guides & Tours has been curating memorable experiences that provide excitement, adventure, and lasting memories for our guests. Whether you're looking for a fun day out with family or an intense adventure through the forests and trails, we've got something for everyone.</p>
            </div>

            <!-- Core Values -->
            <div>
                <h2 class="text-2xl font-bold text-[#5D9CA9] mb-4">Our Core Values</h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-2">Fun</h3>
                        <p class="text-gray-600">We create enjoyable, exciting, and engaging tours for all ages.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-2">Safety</h3>
                        <p class="text-gray-600">Our priority is to ensure that all our activities are conducted with the highest safety standards.</p>
                    </div>
                    <div class="bg-white p-6 rounded-lg shadow-md">
                        <h3 class="text-xl font-semibold mb-2">Entertainment</h3>
                        <p class="text-gray-600">We ensure that your journey is filled with entertainment and excitement, from beginning to end.</p>
                    </div>
                </div>
            </div>

            <!-- Achievements -->
            <div>
                <h2 class="text-2xl font-bold text-[#5D9CA9] mb-4">Our Achievements</h2>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-center">
                        <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Over 1000+ successful tours conducted
                    </li>
                    <li class="flex items-center">
                        <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        100% safety record maintained
                    </li>
                    <li class="flex items-center">
                        <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                        Winner of Best Tour Operator Award 2023
                    </li>
                </ul>
            </div>
        </div>

        <!-- Testimonials -->
        <div>
            <h2 class="text-2xl font-bold text-[#5D9CA9] mb-6">Client Testimonials</h2>
            <div class="space-y-6">
                @foreach($testimonials as $testimonial)
                    <div class="bg-[#FAD6A5] rounded-lg p-6 shadow-md">
                        <p class="text-gray-800 mb-4">{{ $testimonial->content }}</p>
                        <div class="font-semibold text-[#5D9CA9]">
                            <p class="text-lg">{{ $testimonial->name }}</p>
                            @if($testimonial->designation)
                                <p class="text-sm">{{ $testimonial->designation }}</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- CTA Section -->
    <section class="bg-[#5D9CA9] text-white rounded-lg shadow-xl p-12 text-center mb-12">
        <h2 class="text-3xl font-bold mb-4">Join Our Adventures</h2>
        <p class="text-lg mb-8">Experience the beauty of Pakistan with our expert guides and carefully crafted tours.</p>
        <a href="{{ route('tours.index') }}" class="btn-secondary">View Our Tours</a>
    </section>
</div>
@endsection