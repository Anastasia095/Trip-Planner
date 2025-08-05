<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Flight;
use App\Models\Accommodation;
use App\Models\Directions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('trips.index', compact('trips'));
    }

    public function new()
    {
        return view('trips.create');
    }

    public function create(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'vehicle_mpg' => 'required|numeric|min:1',
            'departure' => 'required|string|max:255',
            'arrival' => 'required|string|max:255',
            'airline' => 'required|string|max:255',
            'flight_number' => 'required|string|max:255',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after_or_equal:departure_time',
            'hotel_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after_or_equal:check_in'
        ]);

        // Call Google Distance Matrix API
        $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json', [
            'units' => 'imperial',
            'origins' => $validated['origin'],
            'destinations' => $validated['destination'],
            'key' => config('services.google_maps.key'),
        ]);

        $distance = null;
        $duration = null;

        if ($response->successful()) {
            $data = $response->json();
            $element = $data['rows'][0]['elements'][0] ?? null;

            if ($element && $element['status'] === 'OK') {
                $distance = $element['distance']['text'];
                $duration = $element['duration']['text'];
            }
        }

        // Save to directions table
        $directions = Directions::create([
            'origin' => $validated['origin'],
            'destination' => $validated['destination'],
            'distance' => $distance,
            'vehicle_mpg' => $validated['vehicle_mpg'],
            'travel_time' => $duration,
        ]);
        if (!$directions) {
            dd("trip failed to save");
        }
        $flight = Flight::create([
            'departure' => $validated['departure'],
            'arrival' => $validated['arrival'],
            'airline' => $validated['airline'],
            'flight_number' => $validated['flight_number'],
            'departure_time' => $validated['departure_time'],
            'arrival_time' => $validated['arrival_time'],
        ]);
        if (!$flight) {
            dd("trip failed to save");
        }
        $accommodation = Accommodation::create([
            'hotel_name' => $validated['hotel_name'],
            'address' => $validated['address'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
        ]);
        if (!$accommodation) {
            dd("trip failed to save");
        }
        $trip = Trip::create([
            'title' => $validated['title'],
            'flight_id' => $flight->id,
            'accommodation_id' => $accommodation->id,
            'directions_id' => $directions->id,
        ]);

        if (!$trip) {
            dd("trip failed to save");
        }

        return redirect()->route('trips.index')->with('success', 'Trip created successfully!');
    }


    public function show($id)
    {
        $trip = Trip::findOrFail($id);
        $fuel = $trip->directions->distance / $trip->directions->vehicle_mpg;
        return view('trips.show', compact('trip', 'fuel'));
    }
}
