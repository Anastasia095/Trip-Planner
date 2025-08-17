<x-layouts.app :title="__('Add Accommodation')">
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
                        <i class="fa-solid fa-hotel"></i>
                        {{ 'Add Accommodation Info' }}
                    </flux:heading>
                </div>
                <section id="create-trip-section" aria-labelledby="create-trip-heading" class="relative z-10 p-5">
                    <form method="POST" action="{{ route('accommodations.create') }}" enctype="multipart/form-data"
                        class="space-y-6">
                        @csrf

                        @if ($errors->any())
                            <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                                <ul class="list-disc list-inside">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <flux:input type="hidden" name="trip_id" wire:model.lazy="trip_id" value="{{ $trip->id }}"
                            required />


                        <flux:heading size="md" class="mt-6">Accommodation</flux:heading>

                        <flux:input name="hotel_name" wire:model.lazy="hotel_name" :label="__('Hotel Name')" required />

                        <flux:input name="address" wire:model.lazy="address" :label="__('Address')" required />

                        <flux:input name="check_in" wire:model.lazy="check_in" :label="__('Check-In Date')"
                            type="date" required />

                        <flux:input name="check_out" wire:model.lazy="check_out" :label="__('Check-Out Date')"
                            type="date" required />

                        {{-- PDF Upload --}}
                        <flux:heading size="md" class="mt-6">Reservation Confirmation</flux:heading>

                        <input type="file" name="file" accept="application/pdf"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer 
           bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-neutral-800 dark:border-gray-600 
           dark:placeholder-gray-400">
                        <flux:button type="submit" variant="primary">
                            {{ 'Save' }}
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
