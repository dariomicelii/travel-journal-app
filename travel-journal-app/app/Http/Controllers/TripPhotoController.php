<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\TripPhoto;

class TripPhotoController extends Controller
{
    public function store(Request $request, Trip $trip)
    {
        $request->validate([
            'photo' => 'required|image|max:2048', // max 2MB
            'caption' => 'nullable|string|max:255',
        ]);

        // salva il file
        $path = $request->file('photo')->store('trip_photos', 'public');

        // crea la foto nel DB
        $trip->photos()->create([
            'photo_path' => $path,
            'caption' => $request->caption,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Foto aggiunta con successo',
        ]);
    }
}

