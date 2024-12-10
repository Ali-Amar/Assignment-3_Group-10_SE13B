@extends('layouts.app')

@section('title', 'Book a Tour - PK Guides & Tours')

@section('content')
<div class="container mx-auto px-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-[#5D9CA9] to-[#FAD6A5] rounded-lg shadow-xl p-12 text-white mb-8">
        <h1 class="text-4xl font-bold mb-4">Book Your Adventure</h1>
        <p class="text-lg">Fill out the form below to reserve your spot</p>
    </div>

    <!-- Booking Form -->
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-lg shadow-md p-8">
            <form action="{{ route('bookings.store') }}" method="POST" class="space-y-6">
                @csrf

                @if(isset($tour))
                    <input type="hidden" name="tour_id" value="{{ $tour->id }}">
                    <div class="bg-gray-50 p-4 rounded-lg mb-6">
                        <h3 class="font-semibold text-lg text-[#5D9CA9] mb-2">Selected Tour</h3>
                        <p class="text-gray-700">{{ $tour->name }}</p>
                        <p class="text-gray-600">Price: PKR {{ number_format($tour->price) }}</p>
                        <p class="text-gray-600">Duration: {{ $tour->duration }}</p>
                    </div>
                @else
                    <div class="space-y-2">
                        <label for="tour_id" class="block text-sm font-medium text-gray-700">Select Tour</label>
                        <select name="tour_id" id="tour_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50">
                            <option value="">Choose a tour...</option>
                            @foreach($tours as $tour)
                                <option value="{{ $tour->id }}" {{ old('tour_id') == $tour->id ? 'selected' : '' }}>
                                    {{ $tour->name }} - PKR {{ number_format($tour->price) }}
                                </option>
                            @endforeach
                        </select>
                        @error('tour_id')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                @endif

                <div class="grid md:grid-cols-2 gap-6">
                    <div class="space-y-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50">
                        @error('name')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address</label>
                        <input type="email" name="email" id="email" value="{{ old('email') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50">
                        @error('email')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                        <input type="tel" name="phone" id="phone" value="{{ old('phone') }}"
                               placeholder="03XX-XXXXXXX"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50">
                        @error('phone')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2">
                        <label for="preferred_date" class="block text-sm font-medium text-gray-700">Preferred Date</label>
                        <input type="date" name="preferred_date" id="preferred_date"
                               min="{{ date('Y-m-d') }}"
                               value="{{ old('preferred_date') }}"
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50">
                        @error('preferred_date')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="space-y-2">
                    <label for="message" class="block text-sm font-medium text-gray-700">Additional Message</label>
                    <textarea name="message" id="message" rows="4"
                              class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50">{{ old('message') }}</textarea>
                    @error('message')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex justify-end space-x-4">
                    <a href="{{ route('tours.index') }}" class="btn-secondary">Cancel</a>
                    <button type="submit" class="btn-primary">Book Now</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Booking Information -->
    <section class="max-w-3xl mx-auto mt-12">
        <h2 class="text-2xl font-bold text-[#5D9CA9] mb-6">Booking Information</h2>
        <div class="bg-white rounded-lg shadow-md p-6 space-y-4">
            <div class="flex items-start space-x-4">
                <svg class="w-6 h-6 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <h3 class="font-semibold">Instant Confirmation</h3>
                    <p class="text-gray-600">Receive immediate confirmation of your booking.</p>
                </div>
            </div>
            <div class="flex items-start space-x-4">
                <svg class="w-6 h-6 text-green-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
                <div>
                    <h3 class="font-semibold">Flexible Scheduling</h3>
                    <p class="text-gray-600">Choose your preferred date.</p>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection