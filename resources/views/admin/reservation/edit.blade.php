@extends('base')

@section('page_title', 'Admin - Réservation - Modification')

@section('content')
<h1>Admin - Réservation - Modification</h1>

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
<form action="{{route('admin.reservation.update',['id' => $reservation ->id]) }}" method="POST">

<!--csrf permet de securiser, empeche piratage -->
@csrf

    <div>
            <!-- si erreur on ajoute cette class --> <!--old permet de recuperer les valeurs presente dans la base -->
        <input class=@error('nom') form--input--error @enderror type="nom" name="nom" id="" value="{{ old('nom', $reservation->nom) }}">
        @error('nom')
        <div>
        {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <input class=@error('prenom') form--input--error @enderror type="text" name="prenom" id="" value="{{ old('prenom', $reservation->prenom) }}">
        @error('prenom')
        <div>
        {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <input class=@error('jour') form--input--error @enderror type="date" name="jour" id="" value="{{ old('date', $reservation->jour) }}">
        @error('jour')
        <div>
        {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <!-- voir option de mettre rdv tous les 1/4 d'heure, et éviter RDV 12:07 mais plutôt choix 12:00,12:15 ou 12:30 etc.. -->
        <input class=@error('heure') form--input--error @enderror type="time" name="heure" id="" value="{{ old('heure', $reservation->heure) }}">
        @error('heure')
        <div>
        {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <input class=@error('nombre_personnes') form--input--error @enderror type="number" name="nombre_personnes" id="" value="{{ old('nombre_personnes', $reservation->nombre_personnes) }}">
        @error('nombre_personnes')
        <div>
        {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <!-- placeholder: aide pour indiquer le format n° phone -->
        <input class=@error('tel') form--input--error @enderror type="tel" name="tel" id="" value="{{ old('tel', $reservation->tel) }}" placeholder="06 12 34 56 78">
        @error('tel')
        <div>
        {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <input class=@error('mail') form--input--error @enderror type="email" name="email" id="" value="{{ old('email', $reservation->email) }}">
        @error('email')
        <div>
        {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <!-- date de creation de la reservation -->
    <input class=@error('created_at') form--input--error @enderror type="datetime" name="created_at" id="" value="{{ old('created_at', $reservation->created_at) }}">
    @error('created_at')
    <div>
    {{ $message }}
    </div>
    @enderror    
</div>
        <button type="submit">Valider</button>

    </form>
@endsection