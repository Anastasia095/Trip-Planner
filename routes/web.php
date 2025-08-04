<?php

use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TripController::class, 'index'])->name('trips.index');
Route::get('/trips/new', [TripController::class, 'new'])->name('trips.new');
Route::post('/trips/create', [TripController::class, 'create'])->name('trips.create');
// Route::get('/trip/{id}', [TripController::class, 'show'])->name('trips.show');
Route::get('/trips/{trip}', [TripController::class, 'show'])->name('trips.show');
