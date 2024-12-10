@extends('layouts.app')

@section('title', 'Our Tours - PK Guides & Tours')

@section('content')
<div class="container mx-auto px-6 py-8">
    <!-- Tours Header -->
    <div class="bg-gradient-to-r from-[#5D9CA9] to-[#FAD6A5] rounded-lg shadow-xl p-12 text-white text-center mb-12">
        <h1 class="text-4xl font-bold mb-4">Explore Our Tours</h1>
        <p class="text-lg">Discover the beauty of Pakistan with our carefully crafted tour packages</p>
    </div>

    <!-- Tour Filters -->
    <div class="mb-12">
        <div class="flex flex-wrap gap-4 justify-center">
            <button class="tour-filter btn-secondary active" data-type="all">All Tours</button>
            <button class="tour-filter btn-primary" data-type="scenic">Scenic Tours</button>
            <button class="tour-filter btn-primary" data-type="adventure">Adventure Tours</button>
            <button class="tour-filter btn-primary" data-type="fun_trip">Fun Trips</button>
        </div>
    </div>

    <!-- Tours Grid -->
    <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        @foreach($tours as $tour)
            <div class="card tour-card hover-lift" data-type="{{ $tour->type }}">
                <div class="image-hover">
                    @if($tour->image)
                        <img src="{{ asset('storage/' . $tour->image) }}" 
                             alt="{{ $tour->name }}" 
                             class="w-full h-64 object-cover">
                    @else
                        <div class="w-full h-64 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-400">No image available</span>
                        </div>
                    @endif
                </div>
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <h2 class="text-xl font-bold text-gray-800">{{ $tour->name }}</h2>
                        <span class="px-3 py-1 bg-[#FAD6A5] text-gray-800 rounded-full text-sm">
                            {{ ucfirst(str_replace('_', ' ', $tour->type)) }}
                        </span>
                    </div>
                    <p class="text-gray-600 mb-4">{{ Str::limit($tour->description, 100) }}</p>
                    <div class="flex justify-between items-center mb-4">
                        <span class="text-[#F48C06] text-xl font-bold">PKR {{ number_format($tour->price) }}</span>
                        <span class="text-gray-500">{{ $tour->duration }}</span>
                    </div>
                    <div class="flex space-x-3">
                        <a href="{{ route('tours.show', $tour) }}" class="btn-primary flex-1 justify-center">View Details</a>
                        @auth
                            <a href="{{ route('bookings.create', ['tour' => $tour->id]) }}" 
                               class="btn-secondary flex-1 justify-center">Book Now</a>
                        @else
                            <a href="{{ route('login') }}" class="btn-secondary flex-1 justify-center">Login to Book</a>
                        @endauth
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Features Section -->
    <section class="grid md:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <div class="text-[#F48C06] text-3xl mb-4">👥</div>
            <h3 class="text-lg font-bold mb-2">Expert Guides</h3>
            <p class="text-gray-600">Professional and experienced guides for your safety</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <div class="text-[#F48C06] text-3xl mb-4">🎨</div>
            <h3 class="text-lg font-bold mb-2">Customizable</h3>
            <p class="text-gray-600">Tours can be tailored to your preferences</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <div class="text-[#F48C06] text-3xl mb-4">💰</div>
            <h3 class="text-lg font-bold mb-2">Best Value</h3>
            <p class="text-gray-600">Competitive prices for premium experiences</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <div class="text-[#F48C06] text-3xl mb-4">⭐</div>
            <h3 class="text-lg font-bold mb-2">Top Rated</h3>
            <p class="text-gray-600">Consistently high customer satisfaction</p>
        </div>
    </section>
</div>

@push('scripts')
<script>
    // Tour filtering functionality
    document.addEventListener('DOMContentLoaded', function() {
        const filterButtons = document.querySelectorAll('.tour-filter');
        const tourCards = document.querySelectorAll('.tour-card');

        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                const filterType = button.dataset.type;
                
                // Update button styles
                filterButtons.forEach(btn => {
                    btn.classList.remove('btn-secondary', 'active');
                    btn.classList.add('btn-primary');
                });
                button.classList.remove('btn-primary');
                button.classList.add('btn-secondary', 'active');

                // Filter tours with animation
                tourCards.forEach(card => {
                    if (filterType === 'all' || card.dataset.type === filterType) {
                        card.style.display = 'block';
                        card.classList.add('animate-fade-in');
                    } else {
                        card.style.display = 'none';
                        card.classList.remove('animate-fade-in');
                    }
                });
            });
        });
    });
</script>
@endpush
@endsection