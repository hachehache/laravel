@extends('base')

@section('page_title', 'Admin - Réservation - Liste')

@section('content')
<h1>Admin - Réservation - Liste</h1>

<div>
    <!-- pour ajouter nouveau client lors reservation -->
    <a href={{ route('admin.reservation.create')}}>Ajouter</a>
    
</div>
    <table>
        <tr>
              <!--  th*7  on aura 7 balises -->
              <th>nom</th>
              <th>prénom</th>
              <th>jour</th>
              <th>heure</th>
              <th>couverts</th>
              <th>tél</th>
              <th>email</th>
              <th>date d'appel</th>
              <!-- pour modifier une reservation -->
              <th>actions</th>
        </tr>
    <!--  on est dans le back coté Admin -->
    {{--dump ($reservations)--}}
    @foreach ($reservations as $reservation)
    {{--  dump ($reservations)--}}
    <tr>
        <td>{{ $reservation->nom }}</td>
        <td>{{ $reservation->prenom }}</td>
        <td>{{ $reservation->jour }}</td>
        <td>{{ $reservation->heure }}</td>
        <td>{{ $reservation->nombre_personnes }}</td>
        <td>{{ $reservation->tel }}</td>
        <td>{{ $reservation->email }}</td>
        <!-- date de creation de la reservation -->
        <td>{{ $reservation->created_at  }}</td>
        <td>
            <a href="{{route('admin.reservation.edit' , ['id' => $reservation->id]) }} ">modifier</a>
        </td>
    </tr> 
    @endforeach
    </table>
@endsection
