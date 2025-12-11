<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TripController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');

Route::get("trips", [TripController::class, 'index']);

Route::get('/trips/map', [TripController::class, 'mapData']);

Route::get("trips/{trip}", [TripController::class, 'show']);

Route::delete('/trips/{trip}', [TripController::class, 'destroy']);

Route::middleware('auth')->group(function () {
    Route::post('/trips/{trip}/photos', [TripPhotoController::class, 'store']);
});
