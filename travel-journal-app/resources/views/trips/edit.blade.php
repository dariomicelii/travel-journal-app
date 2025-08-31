@extends('layouts.trips')

@section('title', 'Aggiungi il viaggio')

@section('content')
    <h1>Modifica il viaggio</h1>

    <form action="{{ route('trips.update', $trip) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-control mb-3 d-flex flex-column">
            <label for="destination">Destinazione</label>
            <input type="text" name="destination" id="destination" class="form-control" value="{{ $trip->destination }}" required>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="start_date">Data di inizio</label>
            <input type="date" name="start_date" id="start_date" class="form-control" value="{{ $trip->start_date }}" required>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="end_date">Data di fine</label>
            <input type="date" name="end_date" id="end_date" class="form-control" value="{{ $trip->end_date }}" required>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="notes">Note</label>
            <textarea name="notes" id="notes" class="form-control" required>{{ $trip->notes }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Modifica viaggio</button>
    </form>
@endsection