@extends('layouts.app')

@section('title', 'Home - PK Guides & Tours')

@section('content')
<!-- Hero Section -->
<section class="hero-gradient min-h-[80vh] flex items-center relative overflow-hidden">
    <div class="absolute inset-0 bg-black opacity-30"></div>
    <div class="container mx-auto px-6 relative z-10">
        <div class="max-w-3xl animate-fade-in">
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
                Adventure Awaits You!
            </h1>
            <p class="text-xl text-white/90 mb-8">
                Discover scenic routes, adventurous tours, and unforgettable experiences with PK Guides & Tours.
            </p>
            <div class="space-x-4">
                <a href="{{ route('tours.index') }}" class="btn-primary">
                    Explore Tours
                </a>
                <a href="{{ route('about') }}" class="btn-secondary">
                    Learn More
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Featured Services -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <h2 class="responsive-heading text-center mb-12">Our Services</h2>
        <div class="card-grid">
            @foreach($services as $service)
                <div class="card hover-lift">
                    <div class="card-body">
                        <div class="w-16 h-16 bg-[#FAD6A5] rounded-full flex items-center justify-center mb-6">
                            <span class="text-2xl">{{ $service->icon ?? '🏃‍♂️' }}</span>
                        </div>
                        <h3 class="text-xl font-bold mb-4">{{ $service->name }}</h3>
                        <p class="text-gray-600 mb-6">{{ $service->description }}</p>
                        <a href="{{ route('services.index') }}" class="text-[#5D9CA9] hover:text-[#4A8999] font-semibold inline-flex items-center">
                            Learn More
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Featured Tours -->
<section class="py-20">
    <div class="container mx-auto px-6">
        <h2 class="responsive-heading text-center mb-12">Featured Tours</h2>
        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach($featuredTours as $tour)
                <div class="card hover-lift">
                    <div class="image-hover">
                        @if($tour->image)
                            <img src="{{ asset('storage/' . $tour->image) }}" 
                                 alt="{{ $tour->name }}" 
                                 class="w-full h-48 object-cover">
                        @else
                            <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-400">No image available</span>
                            </div>
                        @endif
                        <div class="image-overlay">
                            <a href="{{ route('tours.show', $tour) }}" class="btn-primary">
                                View Details
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <h3 class="text-xl font-bold mb-2">{{ $tour->name }}</h3>
                        <p class="text-gray-600 mb-4">{{ Str::limit($tour->description, 100) }}</p>
                        <div class="flex justify-between items-center">
                            <span class="text-[#F48C06] font-bold">PKR {{ number_format($tour->price) }}</span>
                            <span class="text-gray-500">{{ $tour->duration }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-20 bg-gray-50">
    <div class="container mx-auto px-6">
        <h2 class="responsive-heading text-center mb-12">What Our Clients Say</h2>
        <div class="grid md:grid-cols-3 gap-8">
            @foreach($testimonials as $testimonial)
                <div class="card hover-lift p-8">
                    <div class="text-[#F48C06] text-4xl mb-6">"</div>
                    <p class="text-gray-600 mb-6">{{ $testimonial->content }}</p>
                    <div class="flex items-center">
                        <div class="ml-4">
                            <p class="font-semibold text-gray-800">{{ $testimonial->name }}</p>
                            @if($testimonial->designation)
                                <p class="text-gray-500">{{ $testimonial->designation }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="py-20 hero-gradient text-white">
    <div class="container mx-auto px-6 text-center">
        <h2 class="text-4xl font-bold mb-6">Ready for an Adventure?</h2>
        <p class="text-xl mb-8">Join us for an unforgettable experience exploring Pakistan's most beautiful locations.</p>
        @auth
            <a href="{{ route('bookings.create') }}" class="btn-secondary">Book Now</a>
        @else
            <a href="{{ route('register') }}" class="btn-secondary">Register to Book a Tour</a>
        @endauth
    </div>
</section>

@push('scripts')
<script>
    // Add smooth scrolling
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });

    // Add intersection observer for animations
    const observerOptions = {
        threshold: 0.1
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-fade-in');
            }
        });
    }, observerOptions);

    document.querySelectorAll('.card').forEach(card => {
        observer.observe(card);
    });
</script>
@endpush
@endsection