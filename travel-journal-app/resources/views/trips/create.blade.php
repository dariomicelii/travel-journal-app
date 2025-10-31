@extends('layouts.trips')

@section('title', 'Aggiungi un nuovo viaggio')

@section('content')
    <h1>Aggiungi un nuovo viaggio</h1>

    <form action="{{ route('trips.store') }}" method="POST">
        @csrf
        <div class="form-control mb-3 d-flex flex-column">
            <label for="image_path">URL Immagine</label>
            <input type="text" name="image_path" id="image_path" class="form-control" required  >
        </div>

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
            <label for="rating_id">Valutazione</label>
            <select name="rating_id" id="rating_id" class="form-control" required>
                <option value="" disabled selected>Seleziona una valutazione</option>
                @foreach($ratings as $rating)
                    <option value="{{ $rating->id }}">{{ $rating->rating }}</option>
                @endforeach
            </select>

        </div>


        <div class="form-control mb-3 d-flex flex-wrap">
            @foreach($tags as $tag)
            <div class="tag me-2">
                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag-{{ $tag->id }}" >
                <label for="tag-{{ $tag->id }}">{{ $tag->name }}</label>
            </div>
            @endforeach
        </div>


        <div class="form-control mb-3 d-flex flex-column">
            <label for="notes">Note</label>
            <textarea name="notes" id="notes" class="form-control" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Aggiungi viaggio</button>
    </form>
@endsection