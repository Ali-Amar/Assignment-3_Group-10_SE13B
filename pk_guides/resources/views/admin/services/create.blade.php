@extends('layouts.admin')

@section('title', 'Create New Service - PK Guides & Tours')

@section('header', 'Create New Service')

@section('content')
<div class="max-w-3xl mx-auto">
    <form action="{{ route('services.store') }}" method="POST" class="bg-white rounded-lg shadow-md p-6">
        @csrf
        <div class="space-y-6">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Service Name</label>
                <input type="text" name="name" id="name" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50"
                       value="{{ old('name') }}" required>
                @error('name')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
                <textarea name="description" id="description" rows="4" 
                          class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50"
                          required>{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="icon" class="block text-sm font-medium text-gray-700">Icon (Emoji or Icon Class)</label>
                <input type="text" name="icon" id="icon" 
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50"
                       value="{{ old('icon') }}" placeholder="e.g., 🏃‍♂️ or fa-hiking">
                @error('icon')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center">
                <input type="checkbox" name="is_active" id="is_active" 
                       class="rounded border-gray-300 text-[#5D9CA9] shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50"
                       {{ old('is_active', true) ? 'checked' : '' }}>
                <label for="is_active" class="ml-2 block text-sm text-gray-700">Active</label>
            </div>

            <div class="flex justify-end space-x-4">
                <a href="{{ route('services.index') }}" class="btn-secondary">Cancel</a>
                <button type="submit" class="btn-primary">Create Service</button>
            </div>
        </div>
    </form>
</div>
@endsection