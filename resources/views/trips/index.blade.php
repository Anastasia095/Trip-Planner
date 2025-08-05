<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else

    @endif
</head>

<body class="w-full overflow-x-hidden">
    <div
        class="relative grid min-h-screen
         grid-cols-[0.5rem_0.5rem_1fr_0.5rem_0.5rem]
         sm:grid-cols-[1fr_2.5rem_3fr_2.5rem_1fr]
         grid-rows-[1fr_1px_auto_1px_1fr]
         bg-white [--pattern-fg:var(--color-gray-950)]/5
         dark:bg-gray-950
         dark:[--pattern-fg:var(--color-white)]/10
         max-w-full
         overflow-hidden">


        <header class="col-start-3 col-span-1 row-start-1 flex items-center justify-center pt-2">
            <h1 class="px-2 text-3xl sm:text-4xl md:text-5hodxl lg:text-6xl xl:text-8xl tracking-tighter text-balance font-medium text-gray-900 dark:text-gray-100">
                Trip Planner
            </h1>
        </header>


        <main class="col-start-3 row-start-3 flex flex-col bg-gray-100 p-4 sm:p-6 rounded-xl shadow-lg dark:bg-gray-950">

            @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 dark:bg-green-900/20 rounded-lg text-green-800 dark:text-green-200 text-base sm:text-lg" role="alert">
                {{ session('success') }}
            </div>
            @endif

            <section id="create-trip-section" aria-labelledby="create-trip-heading" class="relative w-full before:absolute before:top-0 before:h-px before:w-[200vw] before:bg-gray-950/5 dark:before:bg-white/10 before:-left-[100vw] after:absolute after:bottom-0 after:h-px after:w-[200vw] after:bg-gray-950/5 dark:after:bg-white/10 after:-left-[100vw] dark:bg-gray-950 rounded-xl p-4 sm:p-6">
                <h2 id="create-trip-heading" class="text-lg sm:text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Plan Your Next Adventure</h2>
                <a href="{{ route('trips.new') }}" class="inline-block bg-gray-900 text-white dark:bg-gray-100 dark:text-gray-900 px-4 py-2 rounded-lg shadow hover:bg-gray-800 dark:hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" aria-label="Create a new trip">Create New Trip</a>
            </section>


            @if (isset($trips))
            <section id="trips-section" aria-labelledby="trips-heading" class="mt-6 relative w-full before:absolute before:top-0 before:h-px before:w-[200vw] before:bg-gray-950/5 dark:before:bg-white/10 before:-left-[100vw] after:absolute after:bottom-0 after:h-px after:w-[200vw] after:bg-gray-950/5 dark:after:bg-white/10 after:-left-[100vw] dark:bg-gray-950 rounded-xl p-4 sm:p-6">
                <h2 id="trips-heading" class="text-lg sm:text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Your Trips</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($trips as $trip)
                    <article class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-4 flex flex-col relative" aria-labelledby="trip-{{ $trip->id }}-heading"
                        style="background-image: url('https://experiencecadescove.com/media/66e9dc561f28818ddd70cdb9/original.webp'); background-size: cover; background-position: center;">
                        <div class="absolute inset-0 bg-gray-700 opacity-50 rounded-lg z-0"></div>
                        <div class="relative z-10 flex flex-col h-full">
                            <h3 id="trip-{{ $trip->id }}-heading" class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100">{{ $trip->title }}</h3>
                            <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-1 text-sm sm:text-base mt-2 flex-grow">
                                <li><strong>{{ $trip->title }}</strong></li>
                            </ul>
                            <a href="{{ route('trips.show', $trip->id) }}" class="mt-4 inline-block bg-gray-900 text-white dark:bg-gray-100 dark:text-gray-900 px-4 py-2 rounded-lg shadow hover:bg-gray-800 dark:hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" aria-label="View details for {{ $trip->title }}">View Trip Details</a>
                        </div>
                    </article>
                    @endforeach
                </div>
            </section>

            @else
            <section id="no-trips-section" aria-labelledby="no-trips-heading" class="mt-6 relative w-full before:absolute before:top-0 before:h-px before:w-[200vw] before:bg-gray-950/5 dark:before:bg-white/10 before:-left-[100vw] after:absolute after:bottom-0 after:h-px after:w-[200vw] after:bg-gray-950/5 dark:after:bg-white/10 after:-left-[100vw] dark:bg-gray-950 rounded-xl p-4 sm:p-6">
                <h2 id="no-trips-heading" class="text-lg sm:text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">No Trips Yet</h2>
                <p class="text-base sm:text-lg text-gray-700 dark:text-gray-300">Get started by creating your first trip!</p>
            </section>
            @endif
        </main>

        <!-- Left and Right patterned borders -->
        <div class="hidden sm:block relative -right-px col-start-2 row-span-full row-start-1 border-x border-x-[var(--pattern-fg)] bg-[repeating-linear-gradient(315deg,var(--pattern-fg)_0,var(--pattern-fg)_1px,transparent_0,transparent_50%)] bg-[length:10px_10px] bg-fixed"></div>
        <div class="hidden sm:block relative -left-px col-start-4 row-span-full row-start-1 border-x border-x-[var(--pattern-fg)] bg-[repeating-linear-gradient(315deg,var(--pattern-fg)_0,var(--pattern-fg)_1px,transparent_0,transparent_50%)] bg-[length:10px_10px] bg-fixed"></div>
    </div>
</body>

</html>
