@extends('layouts.trips')

@section("title", "Dettagli del viaggio")

@section("content")

    <h2>{{ $trip->destination }}</h2>
    <p>Data di partenza: {{ $trip->start_date }}</p>
    <p>Data di ritorno: {{ $trip->end_date }}</p>
    <p>Note: {{ $trip->notes }}</p>

    <div class="d-flex py-4">
        <a class="btn btn-outline-warning" href="{{ route('trips.edit', $trip) }}">Modifica</a>

        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Elimina
        </button>

        
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