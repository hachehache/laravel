@extends('base')

@section('page_title', 'Admin - Réservation - Liste')

@section('content')


<body>
    <form>
            <h1>Admin - Réservation - Liste</h1>
    <!-- BALISE DE SEPARATION -->
    <div class="separation"></div>

<!-- si on trouve confirmation, on passe dans cette partie
lors d'une modification d'une reservation, on aura un message au dessus,
qui signalera que les modifs ont bien été enregitrées-->
@if (Session::has('confirmation'))
<div>
{{Session::get('confirmation')}}
</div>
@endif

<div>
    <br>
    <!-- pour ajouter nouveau client lors reservation -->
    <a href={{ route('admin.reservation.create')}}>Ajouter</a>   
</div>
<br>
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
        <td>{{ $reservation->created_at }}</td>
        <td>
            
            <a href="{{route('admin.reservation.edit' , ['id' => $reservation->id]) }} ">modifier</a>
    
                    {{--------------------------------------}}
                    {{-- a choisir bouton sup ou lien sup --}}
                    {{--------------------------------------}}

            <!-- formulaire de suppression avec un button -->
            <!--
            <form action="{{-- route('admin.reservation.delete' , ['id' => $reservation->id]) --}}" method="post" 
            onsubmit="return window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?');">
            @@csrf
            @@method('DELETE')
            <button type="submit">supprimer</button>
            </form>
            -->
      
        {{-- formulaire de suppression avec un lien --}}
        <br> {{--Conserver le <br>  pour que modif/suppr ne soit pas sur la même 1er ligne--}}
        <form action="{{ route('admin.reservation.delete' , ['id' => $reservation->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <a href="{{ route('admin.reservation.delete' , ['id' => $reservation->id]) }}"
                onclick="event.preventDefault(); if (window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?')) 
                { this.closest('form').submit();}">supprimer</a>"
        </form>
    </td>
</tr>

    @endforeach
    </table>
@endsection
