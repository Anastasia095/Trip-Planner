<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Flight;
use App\Models\Accommodation;
use App\Models\Directions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Services\FileUploader;


class TripController extends Controller
{
    public function index()
    {
        $trips = Trip::all();
        return view('dashboard', compact('trips'));
    }

    public function new()
    {
        return view('trips.new');
    }

    public function create(Request $request, FileUploader $uploader)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'origin' => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'vehicle_mpg' => 'numeric|min:1',
        ]);

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
            'image_url' => $image_url
        ]);

        if (!$trip) {
            dd("trip failed to save");
        }

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
            'trip_id' => $trip->id,
            'origin' => $validated['origin'],
            'destination' => $validated['destination'],
            'distance' => $distance,
            'vehicle_mpg' => $validated['vehicle_mpg'],
            'travel_time' => $duration,
        ]);
        if (!$directions) {
            dd("trip failed to save");
        }

        $fileUrl = null;

        if ($request->hasFile('file')) {
            $media = $uploader->uploadAndSave($request->file('file'), 'flight-documents');

            $fileUrl = '/storage/' . $media->path;
            // dd($fileUrl);
        }

        return redirect()->route('dashboard')->with('success', 'Trip created successfully!');
    }


    public function show($id)
    {
        $trip = Trip::with(['flight', 'accommodation', 'directions'])->findOrFail($id);

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
