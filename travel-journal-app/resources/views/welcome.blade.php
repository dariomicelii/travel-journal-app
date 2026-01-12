@extends('layouts.app')
@section('content')

<div class="jumbotron p-5 mb-4 bg-light rounded-3">
    <div class="container py-5">
        <div class="logo_laravel">
            <a href="{{ url('/') }}" class="d-flex align-items-center text-decoration-none">
    <!-- Icona segnaposto -->
    <svg width="40" height="40" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
        <!-- Pin della mappa -->
        <path d="M32 4C22 4 14 12 14 22c0 11 18 34 18 34s18-23 18-34c0-10-8-18-18-18z" fill="#4ECDC4"/>
        <!-- Cerchio interno -->
        <circle cx="32" cy="22" r="6" fill="#fff"/>
    </svg>
    <span class="ms-2 fw-bold text-white">TJ</span>
</a>
        </div>
        <h1 class="display-5 fw-bold">
            Benvenuto su TravelJournal <i class="bi bi-circle"></i>
        </h1>

        <p class="col-md-8 fs-4">
            TravelJournal è il tuo diario digitale dei viaggi: salva, organizza e rivivi i tuoi itinerari preferiti, scopri nuove destinazioni e condividi le tue esperienze in un click. Tutto in un’unica piattaforma intuitiva, con mappe, foto e valutazioni dei tuoi viaggi.
        </p>
        <a href="http://127.0.0.1:8000/trips" class="btn btn-primary btn-lg" type="button">Vai ai viaggi</a>
    </div>
</div>

<div class="content">
    <div class="container">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora temporibus, dicta nemo aliquam totam nisi deserunt soluta quas voluptatum ab beatae praesentium necessitatibus minus, facilis illum rerum officiis accusamus dolores!</p>
    </div>
</div>
@endsection