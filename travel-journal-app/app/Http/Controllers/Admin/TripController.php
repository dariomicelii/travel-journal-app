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


        return view('trips.create', compact('ratings', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $newTrip = new Trip();

        $newTrip->image_path = $data['image_path'];
        $newTrip->destination = $data['destination'];
        $newTrip->start_date = $data['start_date'];
        $newTrip->rating_id = $data['rating_id'];
        $newTrip->end_date = $data['end_date'];
        $newTrip->notes = $data['notes'];

        $newTrip->save();

        //Controllo se esistono i tag nell'array
        if($request->has('tags')) {
            $newTrip->tags()->attach($data['tags']);
        }

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
        $ratings = Rating::all();
        $tags = Tag::all();
        return view('trips.edit', compact('trip', 'ratings', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Trip $trip)
    {
        $data = $request->all();

        $trip->image_path = $data['image_path'];
        $trip->destination = $data['destination'];
        $trip->start_date = $data['start_date'];
        $trip->end_date = $data['end_date'];
        $trip->rating_id = $data['rating_id'];
        $trip->notes = $data['notes'];

        $trip->update();

        //Verifico se esistono i tag nell'array
        if($request->has('tags')) {
            //Sincronizziamo i tag
            $trip->tags()->sync($data['tags']);
        }else{
            //Se non ci sono tag nell'array, stacchiamo tutti i tag
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
