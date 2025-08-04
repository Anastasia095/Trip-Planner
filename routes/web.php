<?php

use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

Route::get('/', [TripController::class, 'index'])->name('trips.index');
Route::get('/trip/create', [TripController::class, 'create'])->name('trips.create');
// Route::get('/trip/{id}', [TripController::class, 'show'])->name('trips.show');
Route::get('/trip', [TripController::class, 'show'])->name('trips.show');
