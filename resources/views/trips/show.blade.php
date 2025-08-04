<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else

    @endif
</head>

<body class="w-full">
    <div class="relative grid min-h-screen grid-cols-[0.5rem_0.5rem_1fr_0.5rem_0.5rem] sm:grid-cols-[1fr_2.5rem_3fr_2.5rem_1fr] grid-rows-[1fr_1px_auto_1px_1fr] bg-white [--pattern-fg:var(--color-gray-950)]/5 dark:bg-gray-950 dark:[--pattern-fg:var(--color-white)]/10">
        <!-- Header -->
        <header class="col-start-3 col-span-1 row-start-1 flex items-center justify-center pt-2">
            <h1 class="px-2 text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-8xl tracking-tighter text-balance font-medium text-gray-900 dark:text-gray-100">
                Trip Planner
            </h1>
        </header>

        <!-- Content Container -->
        <main class="col-start-3 row-start-3 flex flex-col bg-gray-100 p-4 sm:p-6 rounded-xl shadow-lg dark:bg-gray-950">
            <!-- Block 1 -->
            <section id="map-section" aria-labelledby="map-heading" class="relative w-full before:absolute before:top-0 before:h-px before:w-[200vw] before:bg-gray-950/5 dark:before:bg-white/10 before:-left-[100vw] after:absolute after:bottom-0 after:h-px after:w-[200vw] after:bg-gray-950/5 dark:after:bg-white/10 after:-left-[100vw] dark:bg-gray-950 rounded-xl p-4 sm:p-6">
                <h2 id="map-heading" class="text-lg sm:text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Orlando to Cades Cove</h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 w-full">
                    <div class="flex flex-col justify-center text-gray-900 dark:text-gray-100 space-y-3">
                        <p class="text-base sm:text-lg"><strong>Distance:</strong> 435 miles</p>
                        <p class="text-base sm:text-lg"><strong>Travel Time:</strong> 6 hours 30 minutes</p>
                        <p class="text-base sm:text-lg"><strong>Fuel Required:</strong> 15 gal</p>
                    </div>
                    <div class="sm:col-span-2 w-full h-48 sm:h-64 rounded overflow-hidden shadow-sm">
                        <iframe
                            class="w-full h-full border-0"
                            loading="lazy"
                            allowfullscreen
                            title="Driving directions from Orlando, FL to Gatlinburg, TN"
                            src="https://www.google.com/maps/embed/v1/directions?key={{ config('services.google_maps.key') }}&origin=Orlando,FL&destination=Gatlinburg,TN&mode=driving">
                        </iframe>

                    </div>
                </div>
            </section>

            <!-- Block 2 -->
            <section id="flight-section" aria-labelledby="flight-heading" class="mt-6 relative w-full before:absolute before:top-0 before:h-px before:w-[200vw] before:bg-gray-950/5 dark:before:bg-white/10 before:-left-[100vw] after:absolute after:bottom-0 after:h-px after:w-[200vw] after:bg-gray-950/5 dark:after:bg-white/10 after:-left-[100vw] dark:bg-gray-950 rounded-xl p-4 sm:p-6">
                <h2 id="flight-heading" class="text-lg sm:text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Flight Itinerary Info</h2>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-1 text-base sm:text-lg">
                    <li>Departure: Orlando International Airport (MCO)</li>
                    <li>Arrival: McGhee Tyson Airport (TYS)</li>
                    <li>Airline: Delta Airlines</li>
                    <li>Flight Number: DL 1234</li>
                    <li>Departure Time: 10:00 AM</li>
                    <li>Arrival Time: 12:30 PM</li>
                </ul>
                <div class="mt-4">
                    <a href="/storage/pdfs/flight_ticket.pdf" target="_blank" class="inline-block bg-gray-900 text-white dark:bg-gray-100 dark:text-gray-900 px-4 py-2 rounded-lg shadow hover:bg-gray-800 dark:hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" aria-label="View flight ticket PDF">View Flight Ticket PDF</a>
                </div>
            </section>

            <!-- Block 3 -->
            <section id="accommodation-section" aria-labelledby="accommodation-heading" class="mt-6 relative w-full before:absolute before:top-0 before:h-px before:w-[200vw] before:bg-gray-950/5 dark:before:bg-white/10 before:-left-[100vw] after:absolute after:bottom-0 after:h-px after:w-[200vw] after:bg-gray-950/5 dark:after:bg-white/10 after:-left-[100vw] dark:bg-gray-950 rounded-xl p-4 sm:p-6">
                <h2 id="accommodation-heading" class="text-lg sm:text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Accommodations</h2>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-1 text-base sm:text-lg">
                    <li>Hotel Name: Gatlinburg Resort</li>
                    <li>Address: 123 Mountain Rd, Gatlinburg, TN</li>
                    <li>Check-in: June 10, 2025</li>
                    <li>Check-out: June 15, 2025</li>
                    <li>Room Type: Deluxe Suite</li>
                </ul>
                <div class="mt-4">
                    <a href="/storage/pdfs/hotel_reservation.pdf" target="_blank" class="inline-block bg-gray-900 text-white dark:bg-gray-100 dark:text-gray-900 px-4 py-2 rounded-lg shadow hover:bg-gray-800 dark:hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" aria-label="View hotel reservation PDF">View Hotel Reservation PDF</a>
                </div>
            </section>
        </main>

        <!-- Left and Right patterned borders -->
        <div class="hidden sm:block relative -right-px col-start-2 row-span-full row-start-1 border-x border-x-[var(--pattern-fg)] bg-[repeating-linear-gradient(315deg,var(--pattern-fg)_0,var(--pattern-fg)_1px,transparent_0,transparent_50%)] bg-[length:10px_10px] bg-fixed"></div>
        <div class="hidden sm:block relative -left-px col-start-4 row-span-full row-start-1 border-x border-x-[var(--pattern-fg)] bg-[repeating-linear-gradient(315deg,var(--pattern-fg)_0,var(--pattern-fg)_1px,transparent_0,transparent_50%)] bg-[length:10px_10px] bg-fixed"></div>
    </div>
</body>

</html>
