<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        {{-- Top Cards / Visual Blocks --}}
        <!-- Unified Top Card -->
        <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 flex flex-col items-center justify-center text-center min-h-[300px]"
            style="background-image: url('https://images.unsplash.com/photo-1542273917363-3b1817f69a2d?fm=jpg&q=60&w=3000&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTB8fGZvcmVzdHxlbnwwfHwwfHx8MA%3D%3D'); background-size: cover; background-position: center;">

            <!-- Overlay for readability -->
            <div class="absolute inset-0 bg-gray-700 opacity-30 rounded-xl z-0"></div>

            <!-- Content -->
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

        {{-- Main Trip Content --}}
        <div class="relative h-full flex-1 overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-6 bg-white dark:bg-gray-950">
            @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 dark:bg-green-900/20 rounded-lg text-green-800 dark:text-green-200 text-base sm:text-lg" role="alert">
                {{ session('success') }}
            </div>
            @endif

            @if (isset($trips) && $trips->count())
            <section aria-labelledby="trips-heading">
                <x-placeholder-pattern class="absolute inset-0 size-full stroke-gray-900/20 dark:stroke-neutral-100/20" />
                <h2 id="trips-heading" class="text-lg sm:text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">
                    Your Trips
                </h2>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 auto-rows-fr">
                    @foreach ($trips as $trip)
                    <div class="aspect-video  bg-white dark:bg-gray-800 rounded-lg shadow-md p-4 flex flex-col relative hover:shadow-xl"
                        aria-labelledby="trip-{{ $trip->id }}-heading"
                        style="background-image: url('{{ $trip->image_url }}'); background-size: cover; background-position: center;">
                        <!-- Overlay -->
                        <div class="absolute inset-0 bg-gray-700 opacity-30 rounded-lg z-0 transition-opacity duration-300 hover:opacity-30"></div>

                        <!-- Trip Info -->
                        <div class="relative z-10 flex flex-col h-full">
                            <h3 id="trip-{{ $trip->id }}-heading" class="text-base sm:text-lg font-semibold text-gray-900 dark:text-gray-100">
                                {{ $trip->title }}
                            </h3>
                            <ul class="list-disc list-inside text-gray-700 dark:text-gray-300 space-y-1 text-sm sm:text-base mt-2 flex-grow">
                                <li><strong>{{ $trip->title }}</strong></li>
                            </ul>
                            <a href="{{ route('trips.show', $trip->id) }}"
                                class="mt-4 inline-block bg-gray-900 text-white dark:bg-gray-100 dark:text-gray-900 px-4 py-2 rounded-lg shadow transform transition-transform duration-200 hover:scale-105 hover:bg-gray-800 dark:hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500"
                                aria-label="View details for {{ $trip->title }}">
                                View Trip Details
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </section>
            @else
            <section aria-labelledby="no-trips-heading">
                <h2 id="no-trips-heading" class="text-lg sm:text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">
                    No Trips Yet
                </h2>
                <p class="text-base sm:text-lg text-gray-700 dark:text-gray-300">Get started by creating your first trip!</p>
            </section>
            @endif
        </div>
    </div>
</x-layouts.app>
