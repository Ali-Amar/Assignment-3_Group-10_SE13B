@extends('layouts.admin')

@section('title', 'Edit Tour - PK Guides & Tours')

@section('header', 'Edit Tour')

@section('content')
<div class="max-w-3xl mx-auto">
    <form action="{{ route('tours.update', $tour) }}" method="POST" enctype="multipart/form-data" class="bg-white rounded-lg shadow-md p-6">
        @csrf
        @method('PUT')
        
        <div class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Tour Name</label>
                <input type="text" name="name" id="name" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50"
                       value="{{ old('name', $tour->name) }}" required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" 
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50"
                          required>{{ old('description', $tour->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700">Price (PKR)</label>
                    <input type="number" name="price" id="price" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50"
                           value="{{ old('price', $tour->price) }}" required min="0" step="0.01">
                    @error('price')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="duration" class="block text-sm font-medium text-gray-700">Duration</label>
                    <input type="text" name="duration" id="duration" 
                           class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50"
                           value="{{ old('duration', $tour->duration) }}" required>
                    @error('duration')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="type" class="block text-sm font-medium text-gray-700">Type</label>
                    <select name="type" id="type" 
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50"
                            required>
                        <option value="scenic" {{ old('type', $tour->type) == 'scenic' ? 'selected' : '' }}>Scenic</option>
                        <option value="adventure" {{ old('type', $tour->type) == 'adventure' ? 'selected' : '' }}>Adventure</option>
                        <option value="fun_trip" {{ old('type', $tour->type) == 'fun_trip' ? 'selected' : '' }}>Fun Trip</option>
                    </select>
                    @error('type')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div>
                <label for="image" class="block text-sm font-medium text-gray-700">Tour Image</label>
                @if($tour->image)
                    <div class="mt-2 mb-4">
                        <img src="{{ asset('storage/' . $tour->image) }}" 
                             alt="{{ $tour->name }}" 
                             class="w-32 h-32 object-cover rounded">
                    </div>
                @endif
                <input type="file" name="image" id="image" 
                       class="mt-1 block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-[#5D9CA9] file:text-white hover:file:bg-[#FAD6A5]"
                       accept="image/*">
                <p class="mt-1 text-sm text-gray-500">Leave empty to keep the current image</p>
                @error('image')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" 
                       class="rounded border-gray-300 text-[#5D9CA9] shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50"
                       {{ old('is_active', $tour->is_active) ? 'checked' : '' }}>
                <label for="is_active" class="ml-2 block text-sm text-gray-700">Active</label>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('tours.index') }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary">Update Tour</button>
            </div>
        </div>
    </form>
</div>
@endsection