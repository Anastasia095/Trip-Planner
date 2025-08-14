<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 flex flex-col items-center justify-center text-center min-h-[300px]"
            style="background-image: url('https://images.unsplash.com/photo-1542273917363-3b1817f69a2d?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGZvcmVzdHxlbnwwfHwwfHx8MA%3D%3D'); background-size: cover; background-position: center;">

            <div class="absolute inset-0 bg-gray-700 opacity-30 rounded-xl z-0"></div>


            <div class="relative z-10 flex flex-col gap-4">
                <a href="{{ route('trips.new') }}"
                    class="bg-gray-900 text-white dark:bg-gray-100 dark:text-gray-900 px-4 py-2 rounded-lg shadow hover:bg-gray-800 dark:hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                    + Create New Trip
                </a>
                <p class="text-sm text-gray-100 dark:text-gray-300">
                    View your trip details with all information in one place.<br>
                    Plan and track your adventures seamlessly.
                </p>
            </div>
        </div>

        <div
            class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 bg-white dark:bg-gray-950">
            <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />

            <main class="relative z-10 flex flex-col gap-10">

                <header class="text-center">
                    <h1
                        class="text-2xl sm:text-3xl font-semibold text-gray-900 dark:text-gray-100 flex items-center justify-center gap-2">
                        <i class="fa-solid fa-route"></i>
                        {{ $trip->title }}
                    </h1>
                    <p class="mt-2 text-gray-700 dark:text-gray-300 text-base sm:text-lg">
                        All details for your trip in one place.
                    </p>
                </header>


                <section aria-labelledby="map-heading" class="space-y-4">
                    <h2 id="map-heading"
                        class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                        <i class="fa-solid fa-car-side"></i> Driving Directions
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">

                        <div class="text-gray-900 dark:text-gray-100 sm:text-lg space-y-2">

                            <div class="pl-6">

                                <strong>Fuel Efficiency: </strong><i class="fa-solid fa-gas-pump mr-1"></i>
                                {{ number_format($fuel, 2) }} gal
                                <span class="text-sm text-gray-500">(@ {{ $trip->directions->vehicle_mpg }} MPG)</span>

                            </div>
                        </div>


                        <div class="sm:col-span-2 w-full h-56 sm:h-64 rounded shadow overflow-hidden">
                            @php
                                $origin = urlencode($trip->directions->origin);
                                $destination = urlencode($trip->directions->destination);
                            @endphp
                            <iframe class="w-full h-full border-0" loading="lazy" allowfullscreen
                                title="Driving directions from {{ $trip->directions->origin }} to {{ $trip->directions->destination }}"
                                src="https://www.google.com/maps/embed/v1/directions?key={{ config('services.google_maps.key') }}&origin={{ $origin }},FL&destination={{ $destination }},TN&mode=driving">
                            </iframe>
                        </div>
                    </div>
                </section>

                <section aria-labelledby="flight-heading" class="space-y-4">
                    <h2 id="flight-heading"
                        class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                        <i class="fa-solid fa-plane"></i> Flight Itinerary
                    </h2>

                    <div class="pl-6">
                        <strong>Departure:</strong> {{ $trip->flight->departure }}<br />
                        <strong>Arrival:</strong> {{ $trip->flight->arrival }}<br />
                        <strong>Airline:</strong> {{ $trip->flight->airline }}<br />
                        <strong>Flight Number:</strong> {{ $trip->flight->flight_number }}<br />
                        <strong>Departure Time:</strong>
                        {{ date('M j, Y, g:i A', strtotime($trip->flight->departure_time)) }}<br />
                        <strong>Arrival Time:</strong>
                        {{ date('M j, Y, g:i A', strtotime($trip->flight->arrival_time)) }}<br />
                    </div>

                    <div class="text-right">
                        <a href="{{ $trip->flight->itinerary_pdf }}" target="_blank"
                            class="inline-block bg-gray-900 text-white dark:bg-gray-100 dark:text-gray-900 px-4 py-2 rounded-lg shadow hover:bg-gray-800 dark:hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            View Flight Ticket PDF
                        </a>
                    </div>
                </section>


                <section aria-labelledby="accommodation-heading" class="space-y-4">
                    <h2 id="accommodation-heading"
                        class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                        <i class="fa-solid fa-hotel"></i> Accommodations
                    </h2>

                    <div class="pl-6">
                        <strong>Hotel:</strong> {{ $trip->accommodation->hotel_name }}<br />

                        <strong>Address:</strong>
                        <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($trip->accommodation->address) }}"
                            target="_blank" rel="noopener noreferrer"
                            class="text-blue-600 dark:text-blue-400 hover:underline">
                            {{ $trip->accommodation->address }}
                        </a>
                        <br />
                        <strong>Check-in:</strong>
                        {{ date('M j, Y, g:i A', strtotime($trip->accommodation->check_in)) }}<br />
                        <strong>Check-out:</strong>
                        {{ date('M j, Y, g:i A', strtotime($trip->accommodation->check_out)) }}<br />
                    </div>

                    <div class="text-right">
                        <a href="/storage/pdfs/hotel_reservation.pdf" target="_blank"
                            class="inline-block bg-gray-900 text-white dark:bg-gray-100 dark:text-gray-900 px-4 py-2 rounded-lg shadow hover:bg-gray-800 dark:hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                            View Hotel Reservation PDF
                        </a>
                    </div>
                </section>
                <div class="flex justify-center">
                    <a href="{{ route('trips.delete', $trip->id) }}"
                        class="inline-block bg-red-600 text-white dark:bg-red-700 dark:text-white px-4 py-2 rounded-lg shadow hover:bg-red-800 dark:hover:bg-red-800 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 max-w-xs text-center">
                        Delete Trip
                    </a>
                </div>
            </main>
        </div>
    </div>

    @push('scripts')
        <script src="https://kit.fontawesome.com/f64d99a414.js" crossorigin="anonymous"></script>
    @endpush
</x-layouts.app>
