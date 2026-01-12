@extends('layouts.trips')

@section("title", "Dettagli del viaggio")

@section("content")
<div class="d-flex justify-content-center my-4">
  <div class="card shadow-sm" style="max-width: 800px; width: 100%;">
    <div class="row g-0">
      <!-- Immagine più larga -->
      <div class="col-md-5">
        @if ($trip->image_path)
          <img src="{{ asset($trip->image_path) }}" 
               alt="Immagine del viaggio" 
               class="img-fluid h-100 rounded-start" 
               style="object-fit: cover;">
        @endif
      </div>
      <div class="col-md-7">
        <div class="card-body py-2 px-3">
          <h3 class="card-title mb-2">{{ $trip->destination }}</h3>
          <p class="mb-1"><strong>Partenza:</strong> {{ $trip->start_date }}</p>
          <p class="mb-1"><strong>Ritorno:</strong> {{ $trip->end_date }}</p>
          <p class="mb-1"><strong>Valutazione:</strong> {{ $trip->rating->rating ?? 'N/A' }}</p>
          <p class="mb-1"><strong>Note:</strong> {{ $trip->notes }}</p>
          <p class="mb-1"><strong>Tags:</strong>
              @forelse($trip->tags as $tag)
                  <span class="badge" style="background-color: {{ $tag->color }}">{{ $tag->name }}</span>
              @empty
                  Nessuno
              @endforelse
          </p>
          <div class="d-flex gap-2 mt-2">
            <a class="btn btn-outline-warning btn-sm" href="{{ route('trips.edit', $trip) }}">Modifica</a>
            <button type="button" class="btn btn-outline-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal">Elimina</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>





    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina viaggio</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Sei sicuro di voler eliminare questo viaggio?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
        <form action="{{ route('trips.destroy', $trip) }}" method="POST" class="ms-2">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-outline-danger">Elimina definitivamente</button>
        </form>
      </div>
    </div>
  </div>
</div>

@endsection