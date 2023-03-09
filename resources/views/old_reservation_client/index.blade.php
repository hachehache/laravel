@extends('base')

@section('page_title', 'Admin - Réservation - Liste')

@section('content')


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

<div class="bouton_ajouter">
    <br>
    <!-- pour ajouter nouveau client lors reservation -->
    <a href="{{ route('admin.reservation.create')}}" style="color: green;">Ajouter</a>   
</div>
<br>

<div class="reservation_liste">
<table>
    <table width="100%" CELLSPACING="1" CELLPADDING="5"  border="2">   <tr>
        <thead bgcolor="silver">
            
              <!-- pour modifier une reservation -->
        <tr>{{--Conserver le tr>  pour que modif/suppr ne soit pas sur la même 1er ligne--}}
              <!--  th*7  on aura 7 balises -->
              <th colspan='1'>nom</th>
              <th colspan='1'>prénom</th>
              <th colspan='1'>jour</th>
              <th colspan='1'>heure</th>
              <th colspan='1'>couverts</th>
              <th colspan='1'>tél</th>
              <th colspan='1'>email</th>
              <th colspan='1'>date d'appel</th>
              
              <th colspan='1'>actions</th>
        </tr>
    </thead>
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
            <div class="bouton_modifier">
            <a href="{{route('admin.reservation.edit' , ['id' => $reservation->id]) }}" style="color: green;">modifier</a>
            </div>
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
            <div class="bouton_supprimer">
            <a href="{{ route('admin.reservation.delete' , ['id' => $reservation->id]) }}"
                onclick="event.preventDefault() ; if (window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?')) 
                { this.closest('form').submit();}"  style="color: orange;">supprimer</a>
            </div>
        </form>
    </td>
</tr>

    @endforeach
    </table>
</div>
@endsection
