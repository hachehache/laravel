@extends('base')

@section('page_title', 'Admin - Plat - Liste')

@section('content')

<h1>Admin - Plat - Liste</h1>
<!-- BALISE DE SEPARATION -->
<div class="separation"></div>

<!-- si on trouve confirmation, on passe dans cette partie
lors d'une modification d'une plat, on aura un message au dessus,
qui signalera que les modifs ont bien été enregitrées-->
@if (Session::has('confirmation'))
<div>
{{Session::get('confirmation')}}
</div>
@endif
<div>
    <br>{{--Conserver le <br>  pour que modif/suppr ne soit pas sur la même 1er ligne--}}
    <!-- pour ajouter nouveau plat -->
    <a href="{{ route('admin.plat.create')}}" style="color: green;">Ajouter</a>  
</div>
<br> {{--Conserver le <br>  pour que modif/suppr ne soit pas sur la même 1er ligne--}}
<!------------------------------->
    <table>
        <table width="100%" CELLSPACING="1" CELLPADDING="5"  border="2">   <tr>
            <thead bgcolor="silver">
                <tr>{{--Conserver le tr>  pour que modif/suppr ne soit pas sur la même 1er ligne--}}
                     <!--  th*7  on aura 7 balises -->
                     <th colspan='1'>nom</th>
                    <th colspan='1'>prix</th>
                    <th colspan='1'>description</th>
                    <th colspan='1'>epingle</th>
                    <th colspan='1'>photo_plat_id</th>
                  <!--  <th colspan='1'>chemin photo</th> -->
                    <th colspan='1'>categorie_id</th>
                    <th colspan='1'>etiquette_id</th>

                    <!-- pour modifier une plat -->
                    <th colspan='1'>actions</th>
                </tr>
            </thead>
    <!--  on est dans le back coté Admin -->
    {{--dump ($plats)--}}
    @foreach ($plats as $plat)
  {{--dump ($plats) --}}
    <tr>
        <td>{{ $plat->nom }}</td>
        <td>{{ $plat->prix }}</td>
        <td>{{ $plat->description }}</td>
        <td>{{ $plat->epingle }}</td>
        <td>{{ $plat->photo_plat_id }}</td>
      <!--  <td>{{-- $plat->photo_Plat_id->chemin--}}</td>-->
        <td>{{ $plat->categorie_id }} </td>
        <td>{{ $plat->etiquette_id }}</td>
        <td>
            <a href="{{route('admin.plat.edit' , ['id' => $plat->id]) }}" style="color: green;">modifier</a>
    
                    {{---------------------------------------------}}
                    {{-- a choisir bouton sup ou lien sup        --}}
                    {{-- Ici on a choisi pour le lien.           --}}
                    {{-- Pour le bouton, voir lignes commande    --}}
                    {{-- en modèle dans les autres index.blade   --}}
                    {{---------------------------------------------}}

            {{-- formulaire de suppression avec un lien --}}
            <br> {{--Conserver le <br>  pour que modif/suppr ne soit pas sur la même 1er ligne--}}
        <form action="{{ route('admin.plat.delete' , ['id' => $plat->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <a href="{{ route('admin.plat.delete' , ['id' => $plat->id]) }}"
                onclick="event.preventDefault(); if (window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?')) 
                { this.closest('form').submit();}" style="color: red;">supprimer</a>"
         </div>
        </form>
    </td>
</tr>
    @endforeach
    </table>
@endsection
