@extends('base')

@section('page_title', 'Admin - Réservation - Liste')

@section('content')
<h1>Admin - Réservation - Liste</h1>


<table>
            <tr>
                <!--  th*7  on aura 7 balises -->
                <th>nom</th>
                <th>description</th>
                <!-- pour modifier une categorie -->
                <th>actions</th>
        </tr>
    <!--  on est dans le back coté Admin -->
    {{--dump ($categories)--}}
    @foreach ($reservations as $reservation)
    {{--  dump ($categories)--}}
    <tr>
        <td>{{ $reservation->nom }}</td>
        <td>{{ $reservation->description }}</td>
        <td>
        <!-- pour ajouter nouveau client lors categorie -->
        <a href={{ route('admin.reservation.create')}}>Ajouter</a>
    </td>
    </tr> 
    @endforeach
    @endsection