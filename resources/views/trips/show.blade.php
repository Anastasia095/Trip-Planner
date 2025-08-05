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

<body class="w-full overflow-x-hidden">
    <div class="fixed inset-x-0 top-0 z-10 border-b border-black/5 dark:border-white/10" bis_skin_checked="1">
        <div class="bg-white dark:bg-gray-950" bis_skin_checked="1">
            <div class="flex h-14 items-center justify-between gap-8 px-4 sm:px-6" bis_skin_checked="1">
                <div class="flex items-center gap-2" bis_skin_checked="1"><a class="shrink-0" aria-label="Home"
                        href="/">
                        <svg viewBox="0 0 40 21" fill="none" class="h-5 text-black dark:text-white">
                            <path class="fill-sky-400"
                                d="M17.183 0C12.6 0 9.737 2.291 8.59 6.873c1.719-2.29 3.723-3.15 6.014-2.577 1.307.326 2.242 1.274 3.275 2.324 1.685 1.71 3.635 3.689 7.894 3.689 4.582 0 7.445-2.291 8.591-6.872-1.718 2.29-3.723 3.15-6.013 2.576-1.308-.326-2.243-1.274-3.276-2.324C23.39 1.98 21.44 0 17.183 0ZM8.59 10.309C4.01 10.309 1.145 12.6 0 17.182c1.718-2.291 3.723-3.15 6.013-2.577 1.308.326 2.243 1.274 3.276 2.324 1.685 1.71 3.635 3.689 7.894 3.689 4.582 0 7.445-2.29 8.59-6.872-1.718 2.29-3.722 3.15-6.013 2.577-1.307-.327-2.242-1.276-3.276-2.325-1.684-1.71-3.634-3.689-7.893-3.689Z">
                            </path>
                        </svg></a>
                    <h1 class="text-gray-900 dark:text-gray-100">Trip Planner</h1>
                    <a
                        class="flex items-center justify-center gap-0.5 rounded-2xl bg-gray-950/5 px-2 py-0.5 text-xs/5 font-medium text-gray-950 tabular-nums hover:bg-gray-950/7.5 data-active:bg-gray-950/7.5 dark:bg-white/10 dark:text-white dark:hover:bg-white/12.5 dark:data-active:bg-white/12.5"
                        href="/" aria-expanded="false">
                        Home
                    </a>
                </div>
                <div class="flex items-center gap-6 max-md:hidden" bis_skin_checked="1">

                    </svg></a><a aria-label="GitHub repository" href="https://github.com/Anastasia095"><svg
                            viewBox="0 0 20 20" class="size-5 fill-black/40 dark:fill-gray-400">
                            <path
                                d="M10 0C4.475 0 0 4.475 0 10a9.994 9.994 0 006.838 9.488c.5.087.687-.213.687-.476 0-.237-.013-1.024-.013-1.862-2.512.463-3.162-.612-3.362-1.175-.113-.287-.6-1.175-1.025-1.412-.35-.188-.85-.65-.013-.663.788-.013 1.35.725 1.538 1.025.9 1.512 2.337 1.087 2.912.825.088-.65.35-1.088.638-1.338-2.225-.25-4.55-1.112-4.55-4.937 0-1.088.387-1.987 1.025-2.688-.1-.25-.45-1.274.1-2.65 0 0 .837-.262 2.75 1.026a9.28 9.28 0 012.5-.338c.85 0 1.7.112 2.5.337 1.912-1.3 2.75-1.024 2.75-1.024.55 1.375.2 2.4.1 2.65.637.7 1.025 1.587 1.025 2.687 0 3.838-2.337 4.688-4.562 4.938.362.312.675.912.675 1.85 0 1.337-.013 2.412-.013 2.75 0 .262.188.574.688.474A10.016 10.016 0 0020 10c0-5.525-4.475-10-10-10z">
                            </path>
                        </svg></a>
                </div>
                <div class="flex items-center gap-2.5 md:hidden" bis_skin_checked="1"><button type="button"
                        aria-label="Search" class="inline-grid size-7 place-items-center rounded-md"><svg
                            viewBox="0 0 16 16" fill="currentColor" class="size-4">
                            <path fill-rule="evenodd"
                                d="M9.965 11.026a5 5 0 1 1 1.06-1.06l2.755 2.754a.75.75 0 1 1-1.06 1.06l-2.755-2.754ZM10.5 7a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Z"
                                clip-rule="evenodd"></path>
                        </svg></button><button type="button"
                        class="relative inline-grid size-7 place-items-center rounded-md text-gray-950 hover:bg-gray-950/5 dark:text-white dark:hover:bg-white/10 undefined"
                        aria-label="Navigation">
                        <path
                            d="M8 2a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM8 6.5a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM9.5 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z">
                        </path>
                        </svg>
                    </button></div>
            </div>
        </div>
    </div>
    <div
        class="relative grid min-h-screen grid-cols-[0.5rem_0.5rem_1fr_0.5rem_0.5rem] sm:grid-cols-[1fr_2.5rem_5fr_2.5rem_1fr]
grid-rows-[1fr_1px_auto_1px_1fr] bg-white [--pattern-fg:var(--color-gray-950)]/5 dark:bg-gray-950 dark:[--pattern-fg:var(--color-white)]/10">
        <!-- Header -->
        <header class="col-start-3 col-span-1 row-start-1 flex items-center justify-center mt-15 pt-2">
        </header>

        <!-- Content Container -->
        <main
            class="col-start-3 row-start-3 flex flex-col bg-gray-100 p-4 sm:p-6 rounded-xl shadow-lg dark:bg-gray-950">
            <!-- Block 1 -->
            <section id="map-section" aria-labelledby="map-heading"
                class="relative w-full before:absolute before:top-0 before:h-px before:w-[200vw] before:bg-gray-950/5 dark:before:bg-white/10 before:-left-[100vw] after:absolute after:bottom-0 after:h-px after:w-[200vw] after:bg-gray-950/5 dark:after:bg-white/10 after:-left-[100vw] dark:bg-gray-950 rounded-xl p-4 sm:p-6">
                <h2 id="map-heading" class="text-lg sm:text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">{{
                    $trip->title }}</h2>
                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4 w-full">
                    <div class="text-gray-900 dark:text-gray-100 sm:text-lg">
                        <p><strong>Fuel Efficiency:</strong></p>
                        <p><i class="fa-solid fa-gas-pump mr-1"></i> {{ number_format($fuel, 2) }} gal <span class="text-sm text-gray-500">(@ {{ $trip->directions->vehicle_mpg }} MPG)</span></p>
                    </div>

                    <div class="sm:col-span-2 w-full h-48 sm:h-64 rounded overflow-hidden shadow-sm">
                        @php
                        $origin = urlencode($trip->directions->origin);
                        $destination = urlencode($trip->directions->destination);
                        @endphp

                        <iframe class="w-full h-full border-0" loading="lazy" allowfullscreen
                            title="Driving directions from Orlando, FL to Gatlinburg, TN"
                            src="https://www.google.com/maps/embed/v1/directions?key={{ config('services.google_maps.key') }}&origin={{ $origin }},FL&destination={{ $destination }},TN&mode=driving">
                        </iframe>

                    </div>
                </div>
            </section>

            <!-- Block 2 -->
            <section id="flight-section" aria-labelledby="flight-heading"
                class="mt-6 relative w-full before:absolute before:top-0 before:h-px before:w-[200vw] before:bg-gray-950/5 dark:before:bg-white/10 before:-left-[100vw] after:absolute after:bottom-0 after:h-px after:w-[200vw] after:bg-gray-950/5 dark:after:bg-white/10 after:-left-[100vw] dark:bg-gray-950 rounded-xl p-4 sm:p-6">
                <h2 id="flight-heading" class="text-lg sm:text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">
                    Flight Itinerary Info</h2>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-1 text-base sm:text-lg">
                    <li><i class="fa-solid fa-plane-departure"></i> Departure: {{$trip->flight->departure}}</li>
                    <li><i class="fa-solid fa-plane-arrival"></i> Arrival: {{$trip->flight->arrival}}</li>
                    <li>Airline: {{$trip->flight->airline}}</li>
                    <li>Flight Number: {{$trip->flight->flight_number}}</li>
                    <li>Departure Time: {{ date('M j, Y, g:i A', strtotime($trip->flight->departure_time)) }}</li>
                    <li>Arrival Time: {{ date('M j, Y, g:i A', strtotime($trip->flight->arrival_time)) }}</li>
                </ul>
                <div class="mt-4">
                    <a href="/storage/pdfs/flight_ticket.pdf" target="_blank"
                        class="inline-block bg-gray-900 text-white dark:bg-gray-100 dark:text-gray-900 px-4 py-2 rounded-lg shadow hover:bg-gray-800 dark:hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                        aria-label="View flight ticket PDF">View Flight Ticket PDF</a>
                </div>
            </section>

            <!-- Block 3 -->
            <section id="accommodation-section" aria-labelledby="accommodation-heading"
                class="mt-6 relative w-full before:absolute before:top-0 before:h-px before:w-[200vw] before:bg-gray-950/5 dark:before:bg-white/10 before:-left-[100vw] after:absolute after:bottom-0 after:h-px after:w-[200vw] after:bg-gray-950/5 dark:after:bg-white/10 after:-left-[100vw] dark:bg-gray-950 rounded-xl p-4 sm:p-6">
                <h2 id="accommodation-heading"
                    class="text-lg sm:text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Accommodations</h2>
                <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-1 text-base sm:text-lg">
                    <li>Hotel Name: {{$trip->accommodation->hotel_name}}</li>
                    <li>
                        Address:
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($trip->accommodation->address) }}"
                            target="_blank" rel="noopener noreferrer">
                            {{ $trip->accommodation->address }}
                        </a>
                    </li>

                    <li>Check-in: {{ $trip->accommodation->check_in }}</li>
                    <li>Check-out: {{ $trip->accommodation->check_out }}</li>
                </ul>
                <div class="mt-4">
                    <a href="/storage/pdfs/hotel_reservation.pdf" target="_blank"
                        class="inline-block bg-gray-900 text-white dark:bg-gray-100 dark:text-gray-900 px-4 py-2 rounded-lg shadow hover:bg-gray-800 dark:hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                        aria-label="View hotel reservation PDF">View Hotel Reservation PDF</a>
                </div>
            </section>
        </main>

        <!-- Left and Right patterned borders -->
        <div
            class="hidden sm:block relative -right-px col-start-2 row-span-full row-start-1 border-x border-x-[var(--pattern-fg)] bg-[repeating-linear-gradient(315deg,var(--pattern-fg)_0,var(--pattern-fg)_1px,transparent_0,transparent_50%)] bg-[length:10px_10px] bg-fixed">
        </div>
        <div
            class="hidden sm:block relative -left-px col-start-4 row-span-full row-start-1 border-x border-x-[var(--pattern-fg)] bg-[repeating-linear-gradient(315deg,var(--pattern-fg)_0,var(--pattern-fg)_1px,transparent_0,transparent_50%)] bg-[length:10px_10px] bg-fixed">
        </div>
    </div>
</body>

</html>
<script src="https://kit.fontawesome.com/f64d99a414.js" crossorigin="anonymous"></script>
