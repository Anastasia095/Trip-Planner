<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Create Trip - Trip Planner</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="w-full">
    <div class="relative grid min-h-screen grid-cols-[0.5rem_0.5rem_1fr_0.5rem_0.5rem] sm:grid-cols-[1fr_2.5rem_3fr_2.5rem_1fr] grid-rows-[1fr_1px_auto_1px_1fr] bg-white [--pattern-fg:var(--color-gray-950)]/5 dark:bg-gray-950 dark:[--pattern-fg:var(--color-white)]/10">
        <!-- Header -->
        <header class="col-start-3 col-span-1 row-start-1 flex items-center justify-center pt-2">
            <h1 class="px-2 text-3xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-8xl tracking-tighter text-balance font-medium text-gray-900 dark:text-gray-100">
                Create Trip
            </h1>
        </header>

        <!-- Content Container -->
        <main class="col-start-3 row-start-3 flex flex-col bg-gray-100 p-4 sm:p-6 rounded-xl shadow-lg dark:bg-gray-950">
            <section id="create-trip-section" aria-labelledby="create-trip-heading" class="relative w-full before:absolute before:top-0 before:h-px before:w-[200vw] before:bg-gray-950/5 dark:before:bg-white/10 before:-left-[100vw] after:absolute after:bottom-0 after:h-px after:w-[200vw] after:bg-gray-950/5 dark:after:bg-white/10 after:-left-[100vw] dark:bg-gray-950 rounded-xl p-4 sm:p-6">
                <h2 id="create-trip-heading" class="text-lg sm:text-xl font-semibold mb-4 text-gray-900 dark:text-gray-100">Plan Your Trip</h2>
                <form method="POST" action="{{ route('trips.create') }}">
                    @csrf
                    <!-- Trip Details -->
                    <div class="mb-4">
                        <label for="title" class="block text-base sm:text-lg text-gray-900 dark:text-gray-100">Trip Title</label>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" class="w-full rounded p-2 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-gray-500" required aria-describedby="title-error">
                        @error('title')
                        <p id="title-error" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Directions Details -->
                    <h3 class="text-base sm:text-lg font-semibold mt-6 mb-4 text-gray-900 dark:text-gray-100">Driving Directions</h3>
                    <div class="mb-4">
                        <label for="origin" class="block text-base sm:text-lg text-gray-900 dark:text-gray-100">Origin</label>
                        <input type="text" id="origin" name="origin" value="{{ old('origin') }}" class="w-full rounded p-2 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-gray-500" required aria-describedby="origin-error">
                        @error('origin')
                        <p id="origin-error" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="destination" class="block text-base sm:text-lg text-gray-900 dark:text-gray-100">Destination</label>
                        <input type="text" id="destination" name="destination" value="{{ old('destination') }}" class="w-full rounded p-2 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-gray-500" required aria-describedby="destination-error">
                        @error('destination')
                        <p id="destination-error" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="distance" class="block text-base sm:text-lg text-gray-900 dark:text-gray-100">Distance (miles)</label>
                        <input type="number" id="distance" name="distance" value="{{ old('distance') }}" step="0.1" class="w-full rounded p-2 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-gray-500" required aria-describedby="distance-error">
                        @error('distance')
                        <p id="distance-error" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="vehicle_mpg" class="block text-base sm:text-lg text-gray-900 dark:text-gray-100">Vehicle MPG</label>
                        <input type="number" id="vehicle_mpg" name="vehicle_mpg" value="{{ old('vehicle_mpg') }}" step="0.1" class="w-full rounded p-2 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-gray-500" required aria-describedby="vehicle_mpg-error">
                        @error('vehicle_mpg')
                        <p id="vehicle_mpg-error" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="travel_time" class="block text-base sm:text-lg text-gray-900 dark:text-gray-100">Travel Time (e.g., 6 hours 30 minutes)</label>
                        <input type="text" id="travel_time" name="travel_time" value="{{ old('travel_time') }}" class="w-full rounded p-2 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-gray-500" aria-describedby="travel_time-error">
                        @error('travel_time')
                        <p id="travel_time-error" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Flight Details -->
                    <h3 class="text-base sm:text-lg font-semibold mt-6 mb-4 text-gray-900 dark:text-gray-100">Flight Information</h3>
                    <div class="mb-4">
                        <label for="departure" class="block text-base sm:text-lg text-gray-900 dark:text-gray-100">Departure Airport</label>
                        <input type="text" id="departure" name="departure" value="{{ old('departure') }}" class="w-full rounded p-2 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-gray-500" required aria-describedby="departure-error">
                        @error('departure')
                        <p id="departure-error" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="arrival" class="block text-base sm:text-lg text-gray-900 dark:text-gray-100">Arrival Airport</label>
                        <input type="text" id="arrival" name="arrival" value="{{ old('arrival') }}" class="w-full rounded p-2 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-gray-500" required aria-describedby="arrival-error">
                        @error('arrival')
                        <p id="arrival-error" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="airline" class="block text-base sm:text-lg text-gray-900 dark:text-gray-100">Airline</label>
                        <input type="text" id="airline" name="airline" value="{{ old('airline') }}" class="w-full rounded p-2 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-gray-500" required aria-describedby="airline-error">
                        @error('airline')
                        <p id="airline-error" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="flight_number" class="block text-base sm:text-lg text-gray-900 dark:text-gray-100">Flight Number</label>
                        <input type="text" id="flight_number" name="flight_number" value="{{ old('flight_number') }}" class="w-full rounded p-2 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-gray-500" required aria-describedby="flight_number-error">
                        @error('flight_number')
                        <p id="flight_number-error" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="departure_time" class="block text-base sm:text-lg text-gray-900 dark:text-gray-100">Departure Time</label>
                        <input type="datetime-local" id="departure_time" name="departure_time" value="{{ old('departure_time') }}" class="w-full rounded p-2 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-gray-500" required aria-describedby="departure_time-error">
                        @error('departure_time')
                        <p id="departure_time-error" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="arrival_time" class="block text-base sm:text-lg text-gray-900 dark:text-gray-100">Arrival Time</label>
                        <input type="datetime-local" id="arrival_time" name="arrival_time" value="{{ old('arrival_time') }}" class="w-full rounded p-2 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-gray-500" required aria-describedby="arrival_time-error">
                        @error('arrival_time')
                        <p id="arrival_time-error" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Accommodation Details -->
                    <h3 class="text-base sm:text-lg font-semibold mt-6 mb-4 text-gray-900 dark:text-gray-100">Accommodation Information</h3>
                    <div class="mb-4">
                        <label for="hotel_name" class="block text-base sm:text-lg text-gray-900 dark:text-gray-100">Hotel Name</label>
                        <input type="text" id="hotel_name" name="hotel_name" value="{{ old('hotel_name') }}" class="w-full rounded p-2 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-gray-500" required aria-describedby="hotel_name-error">
                        @error('hotel_name')
                        <p id="hotel_name-error" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="address" class="block text-base sm:text-lg text-gray-900 dark:text-gray-100">Address</label>
                        <input type="text" id="address" name="address" value="{{ old('address') }}" class="w-full rounded p-2 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-gray-500" required aria-describedby="address-error">
                        @error('address')
                        <p id="address-error" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="check_in" class="block text-base sm:text-lg text-gray-900 dark:text-gray-100">Check-In Date</label>
                        <input type="date" id="check_in" name="check_in" value="{{ old('check_in') }}" class="w-full rounded p-2 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-gray-500" required aria-describedby="check_in-error">
                        @error('check_in')
                        <p id="check_in-error" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="mb-4">
                        <label for="check_out" class="block text-base sm:text-lg text-gray-900 dark:text-gray-100">Check-Out Date</label>
                        <input type="date" id="check_out" name="check_out" value="{{ old('check_out') }}" class="w-full rounded p-2 text-gray-900 dark:text-gray-100 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-700 focus:ring-2 focus:ring-gray-500" required aria-describedby="check_out-error">
                        @error('check_out')
                        <p id="check_out-error" class="text-sm text-red-600 dark:text-red-400 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- Submit Button -->
                    <button type="submit" class="inline-block bg-gray-900 text-white dark:bg-gray-100 dark:text-gray-900 px-4 py-2 rounded-lg shadow hover:bg-gray-800 dark:hover:bg-gray-200 transition focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500" aria-label="Create new trip">Create Trip</button>
                </form>
            </section>
        </main>

        <!-- Left and Right patterned borders -->
        <div class="hidden sm:block relative -right-px col-start-2 row-span-full row-start-1 border-x border-x-[var(--pattern-fg)] bg-[repeating-linear-gradient(315deg,var(--pattern-fg)_0,var(--pattern-fg)_1px,transparent_0,transparent_50%)] bg-[length:10px_10px] bg-fixed"></div>
        <div class="hidden sm:block relative -left-px col-start-4 row-span-full row-start-1 border-x border-x-[var(--pattern-fg)] bg-[repeating-linear-gradient(315deg,var(--pattern-fg)_0,var(--pattern-fg)_1px,transparent_0,transparent_50%)] bg-[length:10px_10px] bg-fixed"></div>
    </div>
</body>

</html>
