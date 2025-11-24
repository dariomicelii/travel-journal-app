@extends('layouts.trips')

@section('title', 'Modifica il viaggio')

@section('content')

    <form action="{{ route('trips.update', $trip) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-control mb-3 d-flex flex-column">
            <label for="image_path">URL Immagine</label>
            <input type="text" name="image_path" id="image_path" class="form-control" value="{{ $trip->image_path }}" required  >

        <div class="form-control mb-3 d-flex flex-column">
            <label for="destination">Destinazione</label>
            <input type="text" name="destination" id="destination" class="form-control" value="{{ $trip->destination }}" required>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="latitude">Latitudine</label>
            <input type="number" name="latitude" id="latitude" class="form-control" value="{{ $trip->latitude }}" step="any" required>
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="longitude">Longitudine</label>
            <input type="number" name="longitude" id="longitude" class="form-control" value="{{ $trip->longitude }}" step="any" required>
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
            <label for="rating_id">Valutazione</label>
            <select name="rating_id" id="rating_id" class="form-control" required>
                <option value="" disabled>Seleziona una valutazione</option>
                @foreach($ratings as $rating)
                    <option value="{{ $rating->id }}" {{ $trip->rating_id == $rating->id ? 'selected' : '' }}>{{ $rating->rating }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-control mb-3 d-flex flex-wrap">
            @foreach($tags as $tag)
            <div class="tag me-2">
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag-{{ $tag->id }}" {{ $trip->tags->contains($tag->id) ? 'checked' : '' }}>
                <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
            </div>
            @endforeach
        </div>

        <div class="form-control mb-3 d-flex flex-column">
            <label for="notes">Note</label>
            <textarea name="notes" id="notes" class="form-control" required>{{ $trip->notes }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Modifica viaggio</button>
    </form>
@endsection