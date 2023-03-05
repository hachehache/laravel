@extends('base')


@section('page_title', 'Admin - Catégorie - Liste')

@section('content')

            <h1>Admin - Catégorie - Liste</h1>
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
<br>

<div class="bouton_ajouter">
    <!-- pour ajouter nouvelle categorie -->
    <a href="{{ route('admin.categorie.create')}}" style="color: green;">Ajouter</a>
</div>
<br>
<div class="categorie_liste">
    <table>
        <table CELLSPACING="1" CELLPADDING="5"  border="2">   <tr>
            <thead bgcolor="silver">
                <tr>
                     <!--  th*7  on aura 7 balises -->
                    <th colspan='1'>nom</th>
                    <th colspan='1'>description</th>
                    <!-- pour modifier une categorie -->
                    <th colspan='1'>actions</th>
                </tr>
            </thead>
    <!--  on est dans le back coté Admin -->
    {{--dump ($categories)--}}
    @foreach ($categories as $categorie)
    {{--  dump ($categories)--}}
    <tr>
        <td>{{ $categorie->nom }}</td>
        <td>{{ $categorie->description }}</td>
        
        <td>
            <div class="bouton_modifier">
            <a href="{{route('admin.categorie.edit' , ['id' => $categorie->id]) }}" style="color: green;">modifier</a>
            </div>
                    {{--------------------------------------}}
                    {{-- a choisir bouton sup ou lien sup --}}
                    {{--------------------------------------}}

            <!-- formulaire de suppression avec un button -->
            <!--
            <form action="{{-- route('admin.categorie.delete' , ['id' => $categorie->id]) --}}" method="post" 
                onsubmit="return window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?');">
                @@csrf
            @@method('DELETE')
            <button type="submit">supprimer</button>
            </form>
        -->
          
            {{-- formulaire de suppression avec un lien --}}
            <br> {{--Conserver le <br>  pour que modif/suppr ne soit pas sur la même 1er ligne--}}
            <form action="{{ route('admin.categorie.delete' , ['id' => $categorie->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="bouton_supprimer">
                <a href="{{ route('admin.categorie.delete' , ['id' => $categorie->id]) }}"
                    onclick="event.preventDefault(); if (window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?')) 
                    { this.closest('form').submit();}" style="color: orange;">supprimer</a>
                </div>   
    </div>
        </form>
        </td>
    </tr>
    @endforeach
    </table>
</div>
@endsection
