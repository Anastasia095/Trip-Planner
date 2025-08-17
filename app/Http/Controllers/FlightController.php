<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Flight;
use Illuminate\Http\Request;
use App\Services\FileUploader;


class FlightController extends Controller
{
    public function new(Trip $trip)
    {
        return view('flights.new', compact('trip'));
    }

    public function create(Request $request, FileUploader $uploader)
    {
        $validated = $request->validate([
            'trip_id' => 'required',
            'departure' => 'required|string|max:255',
            'arrival' => 'required|string|max:255',
            'airline' => 'required|string|max:255',
            'flight_number' => 'required|string|max:255',
            'departure_time' => 'required|date',
            'arrival_time' => 'required|date|after_or_equal:departure_time',
            'file' => 'nullable|file|mimes:pdf|max:5120',
        ]);

        $fileUrl = null;

        if ($request->hasFile('file')) {
            try {
                $media = $uploader->uploadAndSave($request->file('file'), 'flight-documents');

                $fileUrl = '/storage/' . $media->path;
                // dd($fileUrl);
            } catch (\Exception $e) {
                return back()->withErrors(['file' => 'An error occurred while uploading the file.']);
            }
        }


        $flight = Flight::create([
            'trip_id' => $validated['trip_id'],
            'departure' => $validated['departure'],
            'arrival' => $validated['arrival'],
            'airline' => $validated['airline'],
            'flight_number' => $validated['flight_number'],
            'departure_time' => $validated['departure_time'],
            'arrival_time' => $validated['arrival_time'],
            'itinerary_pdf' => $fileUrl,
        ]);
        if (!$flight) {
            dd("trip failed to save");
        }

        return redirect()
            ->route('trips.show', $flight->trip_id)
            ->with('success', 'Flight added successfully!');
    }

    public function delete($id)
    {
        $flight = Flight::findOrFail($id);
        $flight->delete();

        return redirect()->back()->with('success', 'Flight deleted successfully.');
    }
}
