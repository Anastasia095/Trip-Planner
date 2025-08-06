<x-layouts.app :title="__('Create Trip')">
    <div class="relative grid h-dvh flex-col items-center justify-center px-8 sm:px-0 lg:max-w-none lg:grid-cols-2 lg:px-0">
        <!-- Left Panel (Visible on Large Screens) -->
        <div class="bg-muted relative hidden h-full flex-col p-10 text-white lg:flex dark:border-e dark:border-neutral-800">
            <div class="absolute inset-0 bg-neutral-900"></div>
            <a href="{{ route('home') }}" class="relative z-20 flex items-center text-lg font-medium" wire:navigate>
                <span class="flex h-10 w-10 items-center justify-center rounded-md">
                    <x-app-logo-icon class="me-2 h-7 fill-current text-white" />
                </span>
                {{ config('app.name', 'Laravel') }}
            </a>

            @php
            [$message, $author] = str(Illuminate\Foundation\Inspiring::quotes()->random())->explode('-');
            @endphp

            <div class="relative z-20 mt-auto">
                <blockquote class="space-y-2">
                    <flux:heading size="lg">&ldquo;{{ trim($message) }}&rdquo;</flux:heading>
                    <footer>
                        <flux:heading>{{ trim($author) }}</flux:heading>
                    </footer>
                </blockquote>
            </div>
        </div>

        <!-- Right Panel (Form Content) -->
        <div class="w-full">
            <div class="mx-auto w-full flex flex-col justify-center space-y-6">
                <!-- Logo for Mobile -->
                <a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden" wire:navigate>
                    <span class="flex h-9 w-9 items-center justify-center">
                        <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                    </span>
                    <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
                </a>

                <!-- Form Container (Full Width, No Rounded Corners) -->
                <div class="relative flex flex-col gap-4  p-6 bg-white dark:bg-neutral-950">

                    <!-- Form Header -->
                    <div class="relative z-10 text-center">
                        <flux:heading size="xl" class="flex items-center justify-center gap-2">
                            <i class="fa-solid fa-route"></i>
                            {{ __('Create Trip') }}
                        </flux:heading>
                        <p class="mt-2 text-gray-700 dark:text-gray-300 text-base">
                            Plan your next adventure with all the details in one place.
                        </p>
                    </div>

                    <!-- Form Section -->
                    <section id="create-trip-section" aria-labelledby="create-trip-heading" class="relative z-10 p-5">
                        <flux:heading size="lg" id="create-trip-heading" class="mb-4">
                            Plan Your Trip
                        </flux:heading>
                        <form method="POST" action="{{ route('trips.create') }}" class="space-y-6">
                            @csrf

                            <flux:input
                                name="title"
                                wire:model.lazy="title"
                                :label="__('Trip Title')"
                                required />

                            <flux:heading size="md" class="mt-6">Driving Directions</flux:heading>

                            <flux:input
                                name="origin"
                                wire:model.lazy="origin"
                                :label="__('Origin')"
                                required />

                            <flux:input
                                name="destination"
                                wire:model.lazy="destination"
                                :label="__('Destination')"
                                required />

                            <flux:input
                                name="vehicle_mpg"
                                wire:model.lazy="vehicle_mpg"
                                :label="__('Vehicle MPG')"
                                type="number"
                                step="0.1"
                                required />

                            <flux:heading size="md" class="mt-6">Flight Information</flux:heading>

                            <flux:input
                                name="departure"
                                wire:model.lazy="departure"
                                :label="__('Departure Airport')"
                                required />

                            <flux:input
                                name="arrival"
                                wire:model.lazy="arrival"
                                :label="__('Arrival Airport')"
                                required />

                            <flux:input
                                name="airline"
                                wire:model.lazy="airline"
                                :label="__('Airline')"
                                required />

                            <flux:input
                                name="flight_number"
                                wire:model.lazy="flight_number"
                                :label="__('Flight Number')"
                                required />

                            <flux:input
                                id="departure_time"
                                name="departure_time"
                                wire:model.lazy="departure_time"
                                :label="__('Departure Time')"
                                type="datetime-local"
                                required />

                            <flux:input
                                id="arrival_time"
                                name="arrival_time"
                                wire:model.lazy="arrival_time"
                                :label="__('Arrival Time')"
                                type="datetime-local"
                                required />

                            <flux:heading size="md" class="mt-6">Accommodation</flux:heading>

                            <flux:input
                                name="hotel_name"
                                wire:model.lazy="hotel_name"
                                :label="__('Hotel Name')"
                                required />

                            <flux:input
                                name="address"
                                wire:model.lazy="address"
                                :label="__('Address')"
                                required />

                            <flux:input
                                name="check_in"
                                wire:model.lazy="check_in"
                                :label="__('Check-In Date')"
                                type="date"
                                required />

                            <flux:input
                                name="check_out"
                                wire:model.lazy="check_out"
                                :label="__('Check-Out Date')"
                                type="date"
                                required />

                            <div class="flex justify-end">
                                <flux:button type="submit" variant="primary">
                                    {{ __('Create Trip') }}
                                </flux:button>
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>
    @fluxScripts
    <script src="https://kit.fontawesome.com/f64d99a414.js" crossorigin="anonymous"></script>
</x-layouts.app>
