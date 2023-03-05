@extends('base')

@section('page_title', 'Admin - Réservation - Modification')

@section('content')


            <h1>Admin - Réservation - Modification</h1>

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

@if ($errors->any())
    <div>
    Attention, les donnéees n'ont pas été enregistrées, il y a des erreurs dans le formulaire.
    </div>
@endif

<!-- ne pas utiliser la methode GET car faille secu, le password s'affichera en dur -->
<form action="{{ route('admin.reservation.update',['id' => $reservation->id]) }}" method="post">

<!--csrf permet de securiser, empeche piratage -->
<!-- csrf si on a un formulaire c'est obligatoire, sinon on risque d'avoir message "formulaire périmé" -->
@csrf
<!--permet a laravel de reconnaitre si la method n'est pas GET ou POST -->
<!-- PUT maj complète et PATCH maj partielle -->
@method('PUT')

<fieldset>

    <div class="reservation-modif">
        <label for="nom">Nom: </label>
            <!-- readonly permet de rentrer dans le champ nom uniquement en lecture
            On evite toute accident d'effacement du nom lors d'un changement -->
            <!-- si erreur on ajoute cette class --> <!--old permet de recuperer les valeurs presente dans la base -->
        <input class="@error('nom') form--input--error @enderror" type="text" name="nom" id="" value="{{ old('nom', $reservation->nom) }}">
        @error('nom')
        <div class="form--error-message">
        {{ $message }}
        </div>
        @enderror
    </div>

    <div class="reservation-modif">
        <label for="prenom">Prenom: </label>
        <input class="@error('prenom') form--input--error @enderror" type="text" name="prenom" id="" value="{{ old('prenom', $reservation->prenom) }}">
        @error('prenom')
        <div class="form--error-message">
                {{ $message }}
        </div>
        @enderror
    </div>
    <div class="reservation-modif">
        <label for="jour">Jour: </label>
        <input class="@error('jour') form--input--error @enderror" type="date" name="jour" id="" value="{{ old('jour', $reservation->jour) }}">
        @error('jour')
        <div class="form--error-message">
            La date doit être le jour même ou un jour ultérieur.
        </div>
          @enderror
    </div>
<br>

    <div class="reservation-modif">
    <label for="heure">Heure: </label>
    <select name="heure" id="">
        @foreach ($creneaux_horaires as $creneau_horaire)
        <option value="{{ $creneau_horaire }}" @if (old('heure', $reservation->heure) == $creneau_horaire) selected @endif>{{ $creneau_horaire }}</option>
        @endforeach
    </select>
    @error('heure')
        <div class="form--error-message">
            {{ $message }}
        </div>
    @enderror  
    </div>

<br>
    <div class="reservation-modif">
    <label for="nombre_personnes">Nbre Pers: </label>
        <input class="@error('nombre_personnes') form--input--error @enderror" type="number" name="nombre_personnes" id="" value="{{ old('nombre_personnes', $reservation->nombre_personnes) }}">
        @error('nombre_personnes')
        <div class="form--error-message">
            {{ $message }}
        </div>
        @enderror
    </div>
<br>
    <div class="reservation-modif">
                     <!-- REVOIR FORMAT DU CHAMPS TELEPHONE INVALID A LA MODIFICATION -->
        <label for="tel">Tel: </label>
        <!-- placeholder: aide pour indiquer le format n° phone -->
        <input class="@error('tel') form--input--error @enderror" type="tel" name="tel" id="" value="{{ old('tel', $reservation->tel) }}" placeholder="06 12 34 56 78">
        @error('tel')
        <div class="form--error-message">
            {{ $message }}
        </div>
        @enderror
    </div>
<br>
    <div class="reservation-modif">
                    <!-- REVOIR FORMAT DU CHAMPS EMAIL INVALID A LA MODIFICATION -->
        <label for="mail">Mail: </label>
        <input class="@error('mail') form--input--error @enderror" type="email" name="email" id="" value="{{ old('email', $reservation->email) }}">
        @error('email')
        <div class="form--error-message">
            {{ $message }}
        </div>
        @enderror
    </div>

</fieldset>
<br>
    <div class="reservation-modif">
        <!--label for="date">Date de l'enregistrement: </label -->
        <!-- date de creation de la reservation -->
        <!-- METTRE LA DATE DU MOMENT, SINON ERREUR A L'ENREGISTREMENT -->
    
        <button type="submit">Valider</button>
    </div>  
<br>
    </form>
@endsection