<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/trips/new', [TripController::class, 'new'])->name('trips.new');
Route::get('/trips/delete/{trip}', [TripController::class, 'delete'])->name('trips.delete');
Route::post('/trips/create', [TripController::class, 'create'])->name('trips.create');
Route::get('/trips/{trip}', [TripController::class, 'show'])->name('trips.show');

Route::get('/dashboard', [TripController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__ . '/auth.php';
