<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Rating;
use App\Models\Tag;

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
        //prendo le valutazioni
        $ratings = Rating::all();

        //prendo i tag
        $tags = Tag::all();

        $trip = new Trip();

        return view('trips.create', compact('ratings', 'tags', 'trip'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'destination' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'rating_id' => 'nullable|exists:ratings,id',
        'notes' => 'nullable|string',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'image_path' => 'nullable|string',
        'tags' => 'nullable|array',
        'tags.*' => 'exists:tags,id'
    ]);

    $data = $request->all();
    $newTrip = new Trip();

    $newTrip->image_path = $data['image_path'] ?? null;
    $newTrip->destination = $data['destination'];
    $newTrip->start_date = $data['start_date'];
    $newTrip->end_date = $data['end_date'];
    $newTrip->rating_id = $data['rating_id'] ?? null;
    $newTrip->notes = $data['notes'] ?? null;
    $newTrip->latitude = $data['latitude'];
    $newTrip->longitude = $data['longitude'];

    $newTrip->save();

    if (!empty($data['tags'])) {
        $newTrip->tags()->attach($data['tags']);
    }

    return redirect()->route('trips.index');
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
        $ratings = Rating::all();
        $tags = Tag::all();
        return view('trips.edit', compact('trip', 'ratings', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
{
    $request->validate([
        'destination' => 'required|string|max:255',
        'start_date' => 'required|date',
        'end_date' => 'required|date|after_or_equal:start_date',
        'rating_id' => 'nullable|exists:ratings,id',
        'notes' => 'nullable|string',
        'latitude' => 'required|numeric',
        'longitude' => 'required|numeric',
        'image_path' => 'nullable|string',
        'tags' => 'nullable|array',
        'tags.*' => 'exists:tags,id'
    ]);

    $data = $request->all();

    $trip->image_path = $data['image_path'] ?? null;
    $trip->destination = $data['destination'];
    $trip->start_date = $data['start_date'];
    $trip->end_date = $data['end_date'];
    $trip->rating_id = $data['rating_id'] ?? null;
    $trip->notes = $data['notes'] ?? null;
    $trip->latitude = $data['latitude'];
    $trip->longitude = $data['longitude'];

    $trip->save();

    if (!empty($data['tags'])) {
        $trip->tags()->sync($data['tags']);
    } else {
        $trip->tags()->detach();
    }

    return redirect()->route('trips.show', $trip);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Trip $trip)
{
    // Se esiste un'immagine associata, la elimina dallo storage
    if ($trip->image_path && Storage::exists('public/' . $trip->image_path)) {
        Storage::delete('public/' . $trip->image_path);
    }

    // Elimina la relazione con i tag, se usi il pivot table
    $trip->tags()->detach();

    // Elimina il record dal database
    $trip->delete();

    return redirect()->route('trips.index')->with('message', 'Viaggio eliminato con successo!');
}
}
