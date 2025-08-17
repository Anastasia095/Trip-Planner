<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">

        <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 flex flex-col items-center justify-center text-center min-h-[300px]"
            style="background-image: url('https://images.unsplash.com/photo-1542273917363-3b1817f69a2d?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGZvcmVzdHxlbnwwfHwwfHx8MA%3D%3D'); background-size: cover; background-position: center;">
            <div class="absolute inset-0 bg-gray-800 opacity-50 rounded-xl z-0"></div>

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
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 dark:bg-green-900/20 rounded-lg text-green-800 dark:text-green-200 text-base sm:text-lg"
                        role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <section aria-labelledby="map-heading" class="space-y-4">
                    <h2 id="map-heading"
                        class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                        <i class="fa-solid fa-car-side"></i> Driving Directions
                    </h2>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-6">
                        <div class="text-gray-900 dark:text-gray-100 sm:text-lg space-y-2 pl-6">
                            <strong>Fuel Efficiency: </strong>
                            <i class="fa-solid fa-gas-pump mr-1"></i>{{ number_format($fuel, 2) }} gal
                            <span class="text-sm text-gray-500">(@ {{ $trip->directions->vehicle_mpg }} MPG)</span>
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
                @if ($trip->flight->isNotEmpty())
                    <section aria-labelledby="flight-heading" class="space-y-4">
                        <h2 id="flight-heading"
                            class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                            <i class="fa-solid fa-plane"></i> Flight Itinerary
                        </h2>

                        @foreach ($trip->flight as $item)
                            <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm space-y-2">
                                <strong>Departure:</strong> {{ $item->departure }}<br />
                                <strong>Arrival:</strong> {{ $item->arrival }}<br />
                                <strong>Departure Time:</strong>
                                {{ date('M j, Y, g:i A', strtotime($item->departure_time)) }}<br />
                                <strong>Arrival Time:</strong>
                                {{ date('M j, Y, g:i A', strtotime($item->arrival_time)) }}<br />
                                <div class="flex items-center gap-2">
                                    <span>{{ $item->airline }} ({{ $item->flight_number }})</span>
                                    <a href="{{ route('flights.delete', $item->id) }}"
                                        class="text-red-600 hover:text-red-800" title="Delete Flight">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                                @isset($item->itinerary_pdf)
                                    <div class="text-right">
                                        <a href="{{ $item->itinerary_pdf }}" target="_blank"
                                            class="inline-block bg-gray-900 text-white dark:bg-gray-100 dark:text-gray-900 px-4 py-2 rounded-lg shadow hover:bg-gray-800 dark:hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                            View Flight Ticket PDF
                                        </a>
                                    </div>
                                @endisset
                            </div>
                        @endforeach
                    </section>
                @endif
                <section class="flex justify-center mt-6">
                    <a href="{{ route('flights.new', $trip->id) }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fa-solid fa-plus mr-2"></i> Add Flight
                    </a>
                </section>
                @if ($trip->accommodation->isNotEmpty())
                    <section aria-labelledby="accommodation-heading" class="space-y-4 mt-6">
                        <h2 id="accommodation-heading"
                            class="text-xl font-semibold text-gray-900 dark:text-gray-100 flex items-center gap-2">
                            <i class="fa-solid fa-hotel"></i> Accommodations
                        </h2>

                        @foreach ($trip->accommodation as $item)
                            <div class="p-4 border border-gray-200 dark:border-gray-700 rounded-lg shadow-sm space-y-2">
                                <strong>Address:</strong>
                                <a href="https://www.google.com/maps/search/?api=1&query={{ urlencode($item->address) }}"
                                    target="_blank" rel="noopener noreferrer"
                                    class="text-blue-600 dark:text-blue-400 hover:underline">
                                    {{ $item->address }}
                                </a><br />
                                <strong>Check-in:</strong>
                                {{ date('M j, Y, g:i A', strtotime($item->check_in)) }}<br />
                                <strong>Check-out:</strong>
                                {{ date('M j, Y, g:i A', strtotime($item->check_out)) }}<br />
                                <div class="flex items-center gap-2">
                                    <strong>{{ $item->hotel_name }}</strong>
                                    <a href="{{ route('accommodations.delete', $item->id) }}"
                                        class="text-red-600 hover:text-red-800" aria-label="Delete Accommodation">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </a>
                                </div>
                                @isset($item->confirmation_pdf)
                                    <div class="text-right">
                                        <a href="{{ $item->confirmation_pdf }}" target="_blank"
                                            class="inline-block bg-gray-900 text-white dark:bg-gray-100 dark:text-gray-900 px-4 py-2 rounded-lg shadow hover:bg-gray-800 dark:hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                                            View Hotel Reservation PDF
                                        </a>
                                    </div>
                                @endisset
                            </div>
                        @endforeach
                    </section>
                @endif
                <section class="flex justify-center mt-6">
                    <a href="{{ route('accommodations.new', $trip->id) }}"
                        class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        <i class="fa-solid fa-plus mr-2"></i> Add Accommodation
                    </a>
                </section>

                <section class="flex justify-center mt-8">
                    <a href="{{ route('trips.delete', $trip->id) }}"
                        class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded-lg shadow hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                        <i class="fa-solid fa-trash-can mr-2"></i> Delete Trip
                    </a>
                </section>

            </main>
        </div>
    </div>

    @fluxScripts
    <script src="https://kit.fontawesome.com/f64d99a414.js" crossorigin="anonymous"></script>
</x-layouts.app>
