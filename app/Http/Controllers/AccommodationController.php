<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\Accommodation;
use Illuminate\Http\Request;
use App\Services\FileUploader;


class AccommodationController extends Controller
{
    public function new(Trip $trip)
    {
        return view('accommodations.new', compact('trip'));
    }

    public function create(Request $request, FileUploader $uploader)
    {
        $validated = $request->validate([
            'trip_id' => 'required',
            'hotel_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after_or_equal:check_in',
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


        $accommodation = Accommodation::create([
            'trip_id' => $validated['trip_id'],
            'hotel_name' => $validated['hotel_name'],
            'address' => $validated['address'],
            'check_in' => $validated['check_in'],
            'check_out' => $validated['check_out'],
            'reservation_pdf' => $fileUrl,
        ]);
        if (!$accommodation) {
            dd("accommodation failed to save");
        }


        return redirect()
            ->route('trips.show', $accommodation->trip_id)
            ->with('success', 'Accommodation added successfully!');
    }

    public function delete($id)
    {
        $trip = Accommodation::findOrFail($id);
        $trip->delete();

        return redirect()->back()->with('success', 'Accommodation deleted successfully.');
    }
}
