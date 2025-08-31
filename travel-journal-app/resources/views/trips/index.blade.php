@extends('layouts.trips')

@section("title", "I tuoi viaggi")

@section("content")
    

<table>
    <thead>
        <tr>
            <th>Destinazione</th>
            <th>Data di partenza</th>
            <th>Data di ritorno</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($trips as $trip)
            <tr>
                <td>{{ $trip->destination }}</td>
                <td>{{ $trip->start_date }}</td>
                <td>{{ $trip->end_date }}</td>
                <td>
                    <a href="{{ route('trips.show', $trip) }}">Visualizza</a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection