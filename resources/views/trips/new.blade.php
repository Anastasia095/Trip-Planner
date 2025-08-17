<x-layouts.app :title="__('Create Trip')">
    <div class="w-full">
        <div class="mx-100 flex flex-col justify-center">
            <!-- Logo for Mobile -->
            <a href="{{ route('home') }}" class="z-20 flex flex-col items-center gap-2 font-medium lg:hidden"
                wire:navigate>
                <span class="flex h-9 w-9 items-center justify-center">
                    <x-app-logo-icon class="size-9 fill-current text-black dark:text-white" />
                </span>
                <span class="sr-only">{{ config('app.name', 'Laravel') }}</span>
            </a>
            <div class="relative flex rounded-lg flex-col gap-4  p-6 bg-white dark:bg-neutral-950">
                <div class="relative z-10 text-center">
                    <flux:heading size="xl" class="flex items-center justify-center gap-2">
                        <i class="fa-solid fa-route"></i>
                        {{ __('Create Trip') }}
                    </flux:heading>
                    <p class="mt-2 text-gray-700 dark:text-gray-300 text-base">
                        Plan your next adventure with all the details in one place.
                    </p>
                </div>
                <section id="create-trip-section" aria-labelledby="create-trip-heading" class="relative z-10 p-5">
                    <flux:heading size="lg" id="create-trip-heading" class="mb-4">
                        Plan Your Trip
                    </flux:heading>
                    <form method="POST" action="{{ route('trips.create') }}" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf

                        <flux:input name="title" wire:model.lazy="title" :label="__('Trip Title')" required />

                        <flux:heading size="md" class="mt-6">Driving Directions</flux:heading>

                        <flux:input name="origin" wire:model.lazy="origin" :label="__('Origin')" required />

                        <flux:input name="destination" wire:model.lazy="destination" :label="__('Destination')"
                            required />

                        <flux:input name="vehicle_mpg" wire:model.lazy="vehicle_mpg" :label="__('Vehicle MPG')"
                            type="number" step="0.1" required />

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
    @fluxScripts
    <script src="https://kit.fontawesome.com/f64d99a414.js" crossorigin="anonymous"></script>
</x-layouts.app>
