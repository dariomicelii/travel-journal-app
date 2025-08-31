@extends('layouts.trips')

@section('title', 'Aggiungi un nuovo viaggio')

@section('content')
    <h1>Aggiungi un nuovo viaggio</h1>

    <form action="{{ route('trips.store') }}" method="POST">
        @csrf
        <div class="form-control mb-3 d-flex flex-column">
            <label for="destination">Destinazione</label>
            <input type="text" name="destination" id="destination" class="form-control" required>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="start_date">Data di inizio</label>
            <input type="date" name="start_date" id="start_date" class="form-control" required>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="end_date">Data di fine</label>
            <input type="date" name="end_date" id="end_date" class="form-control" required>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="notes">Note</label>
            <textarea name="notes" id="notes" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi viaggio</button>
    </form>
@endsection