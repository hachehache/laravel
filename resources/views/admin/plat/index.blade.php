@extends('base')

@section('page_title', 'Admin - Plat - Liste')

@section('content')
<h1>Admin - Plat - Liste</h1>

<!-- si on trouve confirmation, on passe dans cette partie
lors d'une modification d'une plat, on aura un message au dessus,
qui signalera que les modifs ont bien été enregitrées-->
@if (Session::has('confirmation'))
<div>
{{Session::get('confirmation')}}
</div>
@endif

<div>
    <!-- pour ajouter nouveau plat -->
    <a href={{ route('admin.plat.create')}}>Ajouter</a>
    
</div>
    <table>
        <tr>
              <!--  th*7  on aura 7 balises -->
              <th>nom</th>
              <th>prix</th>
              <th>description</th>
              <!-- pour modifier une plat -->
              <th>actions</th>
        </tr>
    <!--  on est dans le back coté Admin -->
    {{--dump ($plats)--}}
    @foreach ($plats as $plat)
    {{--  dump ($plats)--}}
    <tr>
        <td>{{ $plat->nom }}</td>
        <td>{{ $plat->prix }}</td>
        <td>{{ $plat->description }}</td>
        <td>
            <a href="{{route('admin.plat.edit' , ['id' => $plat->id]) }} ">modifier</a>
    
                    {{--------------------------------------}}
                    {{-- a choisir bouton sup ou lien sup --}}
                    {{--------------------------------------}}

            <!-- formulaire de suppression avec un button -->
        <form action="{{ route('admin.plat.delete' , ['id' => $plat->id]) }}" method="post" 
            onsubmit="return window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?');">
            @csrf
        @method('DELETE')
        <button type="submit">supprimer</button>
        </form>
      
        {{-- formulaire de suppression avec un lien --}}
        <form action="{{ route('admin.plat.delete' , ['id' => $plat->id]) }}" method="post">
            @csrf
            @method('DELETE')
            <a href="{{ route('admin.plat.delete' , ['id' => $plat->id]) }}"
                onclick="event.preventDefault(); if (window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?')) 
                { this.closest('form').submit();}">supprimer</a>"
        </form>
    </td>
</tr>
    @endforeach
    </table>
@endsection
