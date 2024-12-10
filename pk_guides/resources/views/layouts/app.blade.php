<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'PK Guides & Tours')</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <header class="bg-[#5D9CA9] text-white fixed w-full top-0 left-0 z-50 shadow-md">
        <nav class="container mx-auto px-6 py-4">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center">
                        <img src="{{ asset('images/logo.jpg') }}" alt="PK Guides & Tours Logo" class="w-12 h-12 mr-4">
                        <span class="text-xl font-bold">PK Guides & Tours</span>
                    </a>
                </div>

                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ route('home') }}" class="hover:bg-[#FAD6A5] hover:text-gray-800 px-3 py-2 rounded transition duration-300">Home</a>
                    <a href="{{ route('about') }}" class="hover:bg-[#FAD6A5] hover:text-gray-800 px-3 py-2 rounded transition duration-300">About</a>
                    <a href="{{ route('services.index') }}" class="hover:bg-[#FAD6A5] hover:text-gray-800 px-3 py-2 rounded transition duration-300">Services</a>
                    <a href="{{ route('tours.index') }}" class="hover:bg-[#FAD6A5] hover:text-gray-800 px-3 py-2 rounded transition duration-300">Tours</a>
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="hover:bg-[#FAD6A5] hover:text-gray-800 px-3 py-2 rounded transition duration-300">
                                Logout
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="hover:bg-[#FAD6A5] hover:text-gray-800 px-3 py-2 rounded transition duration-300">Login</a>
                        <a href="{{ route('register') }}" class="bg-[#FAD6A5] text-gray-800 px-4 py-2 rounded hover:bg-[#F48C06] transition duration-300">Register</a>
                    @endauth
                </div>

                <!-- Mobile menu button -->
                <button class="md:hidden mobile-menu-button">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </button>
            </div>

            <!-- Mobile menu -->
            <div class="md:hidden mobile-menu hidden">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="{{ route('home') }}" class="block px-3 py-2 rounded hover:bg-[#FAD6A5] hover:text-gray-800">Home</a>
                    <a href="{{ route('about') }}" class="block px-3 py-2 rounded hover:bg-[#FAD6A5] hover:text-gray-800">About</a>
                    <a href="{{ route('services.index') }}" class="block px-3 py-2 rounded hover:bg-[#FAD6A5] hover:text-gray-800">Services</a>
                    <a href="{{ route('tours.index') }}" class="block px-3 py-2 rounded hover:bg-[#FAD6A5] hover:text-gray-800">Tours</a>
                    @auth
                        <a href="{{ route('bookings.index') }}" class="block px-3 py-2 rounded hover:bg-[#FAD6A5] hover:text-gray-800">My Bookings</a>
                        <form method="POST" action="{{ route('logout') }}" class="block">
                            @csrf
                            <button type="submit" class="w-full text-left px-3 py-2 rounded hover:bg-[#FAD6A5] hover:text-gray-800">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-2 rounded hover:bg-[#FAD6A5] hover:text-gray-800">Login</a>
                        <a href="{{ route('register') }}" class="block px-3 py-2 rounded bg-[#FAD6A5] text-gray-800 hover:bg-[#F48C06]">Register</a>
                    @endauth
                </div>
            </div>
        </nav>
    </header>

    <main class="pt-24 min-h-screen">
        @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mx-6 mb-4" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mx-6 mb-4" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-8">
        <div class="container mx-auto px-6">
            <div class="flex flex-wrap justify-between">
                <div class="w-full md:w-1/3 mb-6 md:mb-0">
                    <h3 class="text-lg font-bold mb-4">About Us</h3>
                    <p class="text-gray-300">PK Guides & Tours offers exciting adventures and memorable experiences across Pakistan's most beautiful locations.</p>
                </div>
                
                <div class="w-full md:w-1/3 mb-6 md:mb-0">
                    <h3 class="text-lg font-bold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="text-gray-300 hover:text-white">Home</a></li>
                        <li><a href="{{ route('about') }}" class="text-gray-300 hover:text-white">About</a></li>
                        <li><a href="{{ route('services.index') }}" class="text-gray-300 hover:text-white">Services</a></li>
                        <li><a href="{{ route('tours.index') }}" class="text-gray-300 hover:text-white">Tours</a></li>
                    </ul>
                </div>

                <div class="w-full md:w-1/3">
                    <h3 class="text-lg font-bold mb-4">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="text-gray-300">123 Adventure Street</li>
                        <li class="text-gray-300">Islamabad, Pakistan</li>
                        <li class="text-gray-300">Phone: +92 300 1234567</li>
                        <li class="text-gray-300">Email: info@pkguidestours.com</li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-700 mt-8 pt-8 text-center">
                <p class="text-gray-300">&copy; {{ date('Y') }} PK Guides & Tours. All rights reserved.</p>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>