@extends('layouts.admin')

@section('title', 'Manage Bookings - PK Guides & Tours')

@section('header', 'Manage Bookings')

@section('content')
<div class="bg-white rounded-lg shadow-md overflow-hidden">
    <!-- Filters -->
    <div class="p-6 border-b border-gray-200">
        <form class="flex flex-wrap gap-4">
            <div class="flex-1 min-w-[200px]">
                <select name="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50">
                    <option value="">All Statuses</option>
                    <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                    <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                    <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                </select>
            </div>
            <button type="submit" class="btn-primary">Filter</button>
            <a href="{{ route('admin.bookings') }}" class="btn-secondary">Reset</a>
        </form>
    </div>

    <!-- Bookings Table -->
    <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Booking ID</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Customer</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tour</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($bookings as $booking)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">#{{ $booking->id }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm font-medium text-gray-900">{{ $booking->name }}</div>
                            <div class="text-sm text-gray-500">{{ $booking->email }}</div>
                            <div class="text-sm text-gray-500">{{ $booking->phone }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $booking->tour->name }}</div>
                            <div class="text-sm text-gray-500">PKR {{ number_format($booking->tour->price) }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $booking->preferred_date->format('M d, Y') }}</div>
                            <div class="text-sm text-gray-500">Booked: {{ $booking->created_at->format('M d, Y') }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <form action="{{ route('admin.bookings.update-status', $booking) }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <select name="status" 
                                        onchange="this.form.submit()"
                                        class="rounded-md border-gray-300 shadow-sm focus:border-[#5D9CA9] focus:ring focus:ring-[#5D9CA9] focus:ring-opacity-50 text-sm 
                                        {{ $booking->status === 'confirmed' ? 'bg-green-100' : 
                                           ($booking->status === 'cancelled' ? 'bg-red-100' : 
                                           'bg-yellow-100') }}">
                                    <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                    <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                </select>
                            </form>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <a href="{{ route('bookings.show', $booking) }}" 
                               class="text-[#5D9CA9] hover:text-[#FAD6A5] mr-3">
                                View Details
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div class="px-6 py-4 border-t border-gray-200">
        {{ $bookings->links() }}
    </div>
</div>
@endsection