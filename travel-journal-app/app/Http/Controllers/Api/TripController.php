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
    $trip->load(['tags', 'rating']); // carica tag e rating

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
        ]
    ]);
}

public function mapData() {
    $trips = Trip::select('id', 'destination', 'latitude', 'longitude')->get();

    return response()->json([
        'success' => true,
        'data' => $trips
    ]);
}


}
