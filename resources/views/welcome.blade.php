<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full overflow-hidden">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trip Planner</title>
    <link rel="icon" href="/favicon.ico" sizes="any">
    <link rel="icon" href="/favicon.svg" type="image/svg+xml">
    <link rel="apple-touch-icon" href="/apple-touch-icon.png">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#FDFDFC] dark:bg-[#0a0a0a] text-[#1b1b18] min-h-screen overflow-hidden ">
    <header class="relative w-full h-screen flex items-center justify-center overflow-hidden">

        <video autoplay loop muted playsinline class="absolute top-0 left-0 w-full h-full object-cover z-0">
            <source src="{{ asset('storage/videos/home.mp4') }}" type="video/mp4">
            Your browser does not support the video tag.
        </video>

        <!-- overlay -->
        <div class="absolute inset-0 bg-black/50 z-10"></div>

        <div class="relative z-20 flex flex-col items-center gap-4 text-center px-4 -mt-20">
            <h1 class="text-white text-5xl lg:text-6xl font-bold tracking-wide"
                style="text-shadow: 2px 2px 10px rgba(0,0,0,0.7);">
                Welcome to Trip Planner
            </h1>
            <p class="text-white text-lg lg:text-xl max-w-xl opacity-90"
                style="text-shadow: 1px 1px 8px rgba(0,0,0,0.6);">
                Discover new destinations, plan your adventures, and create unforgettable memories.
            </p>

            @if (Route::has('login'))
                <nav class="flex flex-col sm:flex-row items-center gap-4 mt-6">
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="px-6 py-3 bg-white text-black font-semibold rounded-md shadow-lg hover:bg-gray-200 transition">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="px-6 py-3 bg-white text-black font-semibold rounded-md shadow-lg hover:bg-gray-200 transition">
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="px-6 py-3 bg-transparent border border-white text-white font-semibold rounded-md hover:bg-white hover:text-black transition">
                                Register
                            </a>
                        @endif
                    @endauth
                </nav>
            @endif
        </div>
    </header>
</body>

</html>
