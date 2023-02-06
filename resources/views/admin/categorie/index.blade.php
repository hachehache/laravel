@extends('base')

@section('page_title', 'Admin - Catégorie - Liste')

@section('content')
<h1>Admin - Catégorie - Liste</h1>

<!-- si on trouve confirmation, on passe dans cette partie
lors d'une modification d'une reservation, on aura un message au dessus,
qui signalera que les modifs ont bien été enregitrées-->
@if (Session::has('confirmation'))
<div>
{{Session::get('confirmation')}}
</div>
@endif

<div>
    <!-- pour ajouter nouvelle categorie -->
    <a href={{ route('admin.categorie.create')}}>Ajouter</a>
    
</div>
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
    @foreach ($categories as $categorie)
    {{--  dump ($categories)--}}
    <tr>
        <td>{{ $categorie->nom }}</td>
        <td>{{ $categorie->description }}</td>
        
        <td>
            <a href="{{route('admin.categorie.edit' , ['id' => $categorie->id]) }} ">modifier</a>
          
                    {{--------------------------------------}}
                    {{-- a choisir bouton sup ou lien sup --}}
                    {{--------------------------------------}}

            <!-- formulaire de suppression avec un button -->
            <form action="{{ route('admin.categorie.delete' , ['id' => $categorie->id]) }}" method="post" 
                onsubmit="return window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?');">
                @csrf
            @method('DELETE')
            <button type="submit">supprimer</button>
            </form>
          
            {{-- formulaire de suppression avec un lien --}}
            <form action="{{ route('admin.categorie.delete' , ['id' => $categorie->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{ route('admin.categorie.delete' , ['id' => $categorie->id]) }}"
                    onclick="event.preventDefault(); if (window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?')) 
                    { this.closest('form').submit();}">supprimer</a>"
            </form>
        </td>
    </tr>
    @endforeach
    </table>
@endsection
