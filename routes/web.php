<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use App\Http\Controllers\TripController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\AccommodationController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::prefix('trips')->name('trips.')->group(function () {
    Route::get('/new', [TripController::class, 'new'])->name('new');
    Route::post('/create', [TripController::class, 'create'])->name('create');
    Route::get('/delete/{trip}', [TripController::class, 'delete'])->name('delete');
    Route::get('/{trip}', [TripController::class, 'show'])->name('show');
});

Route::prefix('flights')->name('flights.')->group(function () {
    Route::get('/new/{trip}', [FlightController::class, 'new'])->name('new');
    Route::post('/create', [FlightController::class, 'create'])->name('create');
    Route::get('/delete/{flight}', [FlightController::class, 'delete'])->name('delete');
});

Route::prefix('accommodations')->name('accommodations.')->group(function () {
    Route::get('/new/{trip}', [AccommodationController::class, 'new'])->name('new');
    Route::post('/create', [AccommodationController::class, 'create'])->name('create');
    Route::get('/delete/{accommodation}', [AccommodationController::class, 'delete'])->name('delete');
});

Route::get('/dashboard', [TripController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

Route::post('upload', App\Http\Controllers\UploadController::class)->name('upload');

require __DIR__ . '/auth.php';
