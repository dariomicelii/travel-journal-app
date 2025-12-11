<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip;

class TripController extends Controller
{
    public function index() {
    $trips = Trip::with('tags', 'rating')->get();

    // Mappiamo ogni viaggio per estrarre solo i campi utili e la stringa del rating
    $trips = $trips->map(function($trip) {
        return [
            'id' => $trip->id,
            'destination' => $trip->destination,
            'notes' => $trip->notes,
            'image_path' => $trip->image_path,
            'start_date' => $trip->start_date,
            'end_date' => $trip->end_date,
            'tags' => $trip->tags,
            'rating' => $trip->rating ? $trip->rating->rating : null, // <-- qui la stringa
        ];
    });

    return response()->json([
        "success" => true,
        "data" => $trips
    ]);
}



    public function show(Trip $trip)
{
    // carica tag, rating e foto
    $trip->load(['tags', 'rating', 'photos']);

    // trasforma le foto per avere l'URL completo
    $photos = $trip->photos->map(function($photo) {
        return [
            'id' => $photo->id,
            'url' => asset('storage/' . $photo->photo_path), // percorso pubblico
            'caption' => $photo->caption
        ];
    });

    return response()->json([
        'success' => true,
        'data' => [
            'id' => $trip->id,
            'destination' => $trip->destination,
            'notes' => $trip->notes,
            'image_path' => $trip->image_path,
            'start_date' => $trip->start_date,
            'end_date' => $trip->end_date,
            'rating' => $trip->rating ? $trip->rating->rating : null,
            'tags' => $trip->tags,
            'photos' => $trip->photos->map(fn($p) => [
                'id' => $p->id,
                'url' => asset('storage/' . $p->photo_path),
                'caption' => $p->caption
            ]), // aggiunta qui
        ]
    ]);
}

public function map()
{
    $trips = Trip::with('tags', 'rating')->get();

    $trips = $trips->map(function($trip) {
        return [
            'id' => $trip->id,
            'destination' => $trip->destination,
            'latitude' => $trip->latitude,
            'longitude' => $trip->longitude,
            'start_date' => $trip->start_date,
            'end_date' => $trip->end_date,
            'tags' => $trip->tags,
            'rating' => $trip->rating ? $trip->rating->rating : null,
        ];
    });

    return response()->json([
        'success' => true,
        'data' => $trips
    ]);
}


}
