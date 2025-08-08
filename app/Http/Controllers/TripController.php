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
        return view('dashboard', compact('trips'));
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



        $apiKey = config('services.google_maps.key');

        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'X-Goog-Api-Key' => $apiKey,
            'X-Goog-FieldMask' => 'routes.duration,routes.distanceMeters'
        ])->post('https://routes.googleapis.com/directions/v2:computeRoutes', [
            'origin' => [
                'address' =>  $validated['origin'],
            ],
            'destination' => [
                'address' => $validated['destination'],
            ],
        ]);

        $data = $response->json();
        $meters = $response['routes'][0]['distanceMeters'];
        $miles = $meters * 0.000621371;

        if (!empty($data['routes'][0])) {
            $route = $data['routes'][0];
            $distance = $miles ?? 0;
            $duration = $route['duration'] ?? 0;
        }
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

        //just for decoration purposes
        $imageUrls = [
            "https://www.pinkadventuretours.com/Media/3120/roaring-fork-motor-trail-fall-cabin-600x400.jpg",
            "https://cdn2.smokymountains.com/uploads/2020/08/leaf-peeping-scenic-drive_731x419_acf_cropped.jpg",
            "https://wildlandtrekking.com/content/webp-express/webp-images/doc-root/content/uploads/2020/11/smokies-bg.jpg.webp",
            "https://www.myinnontheriver.com/media/66a83b56c0213bb358b642b0/xlarge.webp",
            "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS5WUCkPjG1y6MNp22n5st6maCuArGYXsvQmw&s",
        ];

        $image_url = $imageUrls[array_rand($imageUrls)];
        // dd($image_url);
        $trip = Trip::create([
            'title' => $validated['title'],
            'flight_id' => $flight->id,
            'accommodation_id' => $accommodation->id,
            'directions_id' => $directions->id,
            'image_url' => $image_url
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

    public function delete($id)
    {
        $trip = Trip::findOrFail($id);
        $trip->delete();

        return redirect()->route('dashboard')->with('success', 'Trip deleted successfully.');
    }
}
