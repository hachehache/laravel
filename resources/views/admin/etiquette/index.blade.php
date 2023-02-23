@extends('base')

@section('page_title', 'Admin - Etiquette - Liste')

@section('content')

<h1>Admin - Etiquette - Liste</h1>
<!-- BALISE DE SEPARATION -->
<div class="separation"></div>

<!-- si on trouve confirmation, on passe dans cette partie
lors d'une modification d'une etiquette, on aura un message au dessus,
qui signalera que les modifs ont bien été enregitrées-->
@if (Session::has('confirmation'))
<div>
{{Session::get('confirmation')}}
</div>
@endif
<br>

<div>
    <!-- pour ajouter nouvelle etiquette -->
    <a href="{{ route('admin.etiquette.create')}}"  style="color: green;">Ajouter</a>
</div>


<!---------- A FINALISER- Bouton de TRI ----->
<br>
<div id="tri1" style="display:none;">
    <input type="radio" name="tri" value="Asc" id="tri1" onclick="verif_button();"/><label>Ordre Croissant</label>
</div>
<br>
<div id="tri2" style="display:none;">
    <input type="radio" name="tri" value="Desc" id="tri2" onclick="verif_button();"/><label>Ordre Décroissant</label>
</div>
<!------------------------------->
    <table>
        <table width="100%" CELLSPACING="1" CELLPADDING="5"  border="2">   <tr>
            <thead bgcolor="silver">

            <!--  th*7  on aura 7 balises -->
            <!-- pour modifier une etiquette -->
            <tr>      
            <th colspan='1'>Nom</th>
            <th colspan='1'>Description</th>
             <!-- pour modifier une plat -->
            <th colspan='1'>Actions</th>
            </tr>
        </thead>
    <!--  on est dans le back coté Admin -->
    {{--dump ($etiquette)--}}
    @foreach ($etiquettes as $etiquette)
    {{-- dump ($etiquettes) --}}
    <tr>
        <td>{{ $etiquette->nom }}</td>
        <td>{{ $etiquette->description }}</td>
        <td>
            <a href="{{ route('admin.etiquette.edit' , ['id' => $etiquette->id]) }}" style="color: green;">modifier</a>
        
                    {{--------------------------------------}}
                    {{-- a choisir bouton sup ou lien sup --}}
                    {{--------------------------------------}}

            <!-- formulaire de suppression avec un button -->
            <!--
            <form action="{{-- route('admin.etiquette.delete' , ['id' => $etiquette->id]) --}}" method="post" 
            onsubmit="return window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?');">
            @@csrf
            @@method('DELETE') 
            <button type="submit">supprimer</button>
            </form> 
            -->
        
          
            {{-- formulaire de suppression avec un lien --}}
            <br> {{--Conserver le <br>  pour que modif/suppr ne soit pas sur la même 1er ligne--}}

            <form action="{{ route('admin.etiquette.delete' , ['id' => $etiquette->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{ route('admin.etiquette.delete' , ['id' => $etiquette->id]) }}"
                    onclick="event.preventDefault(); if (window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?')) 
                    { this.closest('form').submit();}" style="color: red;">supprimer</a>"
            </div>
            </form>
        
    </tr> 
    @endforeach
    </table>
@endsection
