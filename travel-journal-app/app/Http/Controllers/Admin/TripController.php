<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trips = Trip::all();
        return view('trips.index', compact('trips'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('trips.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newTrip = new Trip();

        $newTrip->destination = $data['destination'];
        $newTrip->start_date = $data['start_date'];
        $newTrip->end_date = $data['end_date'];
        $newTrip->notes = $data['notes'];

        $newTrip->save();

        return redirect()->route('trips.index', $newTrip);
    }

    /**
     * Display the specified resource.
     */
    public function show(Trip $trip)
    {
        return view('trips.show', compact('trip'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Trip $trip)
    {
        return view('trips.edit', compact('trip'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        $data = $request->all();

        $trip->destination = $data['destination'];
        $trip->start_date = $data['start_date'];
        $trip->end_date = $data['end_date'];
        $trip->notes = $data['notes'];

        $trip->update();

        return redirect()->route('trips.index', $trip);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
    {
        $trip->delete();

        return redirect()->route('trips.index');
    }
}
