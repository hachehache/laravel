@extends('base')

@section('page_title', 'Admin - Actu - Liste')

@section('content')

<h1>Admin - Actu - Liste</h1>
<!-- BALISE DE SEPARATION -->
<div class="separation"></div>

 <!----- Retour a Dashboard ---->
 <div class="retour_dashboard">
    <a href="{{ route('dashboard') }}">Retour au Tableau de bord</a>
</div>
<!----------------------------->

<!-- si on trouve confirmation, on passe dans cette partie
lors d'une modification d'une actu, on aura un message au dessus,
qui signalera que les modifs ont bien été enregitrées-->
@if (Session::has('confirmation'))
<div>
{{Session::get('confirmation')}}
</div>
@endif
<br>

<div class="bouton_ajouter">
    <!-- pour ajouter nouvelle actu -->
    <a href="{{ route('admin.actu.create')}}"  style="color: green;">Ajouter</a>
</div>

<!------------------------------->
<div class="actu_liste">
    <table>
        <table CELLSPACING="1" CELLPADDING="5"  border="2">   <tr>
            <thead bgcolor="silver">
            <tr>      
            <th colspan='1'> Jour de publication</th>
            <th colspan='1'>Heure de publication</th>
            <th colspan='1'>Texte</th>
             <!-- pour modifier une plat -->
            <th colspan='1'>Actions</th>
            </tr>
        </thead>
    <!--  on est dans le back coté Admin -->
    {{--dump ($actu)--}}
    @foreach ($actus as $actu)
    {{-- dump ($actus) --}}
    <tr>
        <td>{{ $actu->jour_publication }}</td>
        <td>{{ $actu->heure_publication }}</td>
        <td>{{ $actu->texte }}</td>
        <td>
            <div class="bouton_modifier">
            <a href="{{ route('admin.actu.edit' , ['id' => $actu->id]) }}" style="color: green;">modifier</a>
            </div>
                    {{--------------------------------------}}
                    {{-- a choisir bouton sup ou lien sup --}}
                    {{--------------------------------------}}

            <!-- formulaire de suppression avec un button -->
            <!--
            <form action="{{-- route('admin.actu.delete' , ['id' => $actu->id]) --}}" method="post" 
            onsubmit="return window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?');">
            @@csrf
            @@method('DELETE') 
            <button type="submit">supprimer</button>
            </form> 
            -->
        
          
            {{-- formulaire de suppression avec un lien --}}
            <br> {{--Conserver le <br>  pour que modif/suppr ne soit pas sur la même 1er ligne--}}

            <form action="{{ route('admin.actu.delete' , ['id' => $actu->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <div class="bouton_supprimer">
                <a href="{{ route('admin.actu.delete' , ['id' => $actu->id]) }}"
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
