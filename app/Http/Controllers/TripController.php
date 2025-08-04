<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index()
    {
        // $trips = Trip::all();
        // return view('index', compact('trips'));
        return view('trips.index');
    }

    public function create()
    {
        return view('trips.create');
    }

    // public function show($id)
    public function show()
    {
        // $trip = Trip::findOrFail($id);
        // return view('tripdetails.blade', compact('trip'));
        return view('trips.show');
    }
}
