@extends('layouts.trips')

@section("title", "I tuoi viaggi")

@section("content")

<div class="row g-4 mt-4">
    @foreach($trips as $trip)
        <div class="col-12 col-sm-6 col-md-4">
            <div class="card h-100">
                <img src="{{ asset($trip->image_path) }}" class="card-img-top" alt="{{ $trip->destination }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $trip->destination }}</h5>
                    <p class="card-text">{{ $trip->notes }}</p>
                    <p class="card-text">Partenza: {{ $trip->start_date }}</p>
                    <p class="card-text">Ritorno: {{ $trip->end_date }}</p>
                    <a href="{{ route('trips.show', $trip) }}" class="btn btn-primary">Visualizza dettagli</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<div class="d-flex py-4">
    <a class="btn btn-outline-primary" href="{{ route('trips.create') }}">Aggiungi viaggio</a>
</div>

@endsection
