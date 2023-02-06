@extends('base')

@section('page_title', 'Admin - Plat - Modification')

@section('content')
<h1>Admin - Plat - Modification</h1>

<!-- si on trouve confirmation, on passe dans cette partie
lors d'une modification d'une plat, on aura un message au dessus,
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
<form action="{{route('admin.plat.update',['id' => $plat ->id]) }}" method="POST">

<!--csrf permet de securiser, empeche piratage -->
@csrf
<!--permet a laravel de reconnaitre si la method n'est pas GET ou POST -->
<!-- PUT maj complète et PATCH maj partielle -->
<!-- NE PAS METTRE METHODE PUT, sinon erreur à la validation de la modif plat -->
<!-- @ method('PUT') -->

    <div>
        <label for="nom">Nom:</label>
            <!-- si erreur on ajoute cette class --> <!--old permet de recuperer les valeurs presente dans la base -->
        <input class="@error('nom') form--input--error @enderror" type="nom" name="nom" id="" value="{{ old('nom', $plat->nom) }}" readonly>
        @error('nom')
        <div class="form--error-message">
        {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <label for="prix">Prix:</label>
        <!-- si erreur on ajoute cette class --> <!--old permet de recuperer les valeurs presente dans la base -->
    <input class="@error('prix') form--input--error @enderror" type="numeric" name="prix" id="" value="{{ old('prix', $plat->prix) }}">
    @error('nom')
    <div class="form--error-message">
    {{ $message }}
    </div>
    @enderror
</div>
    <div>
        <!--  pour avoir le libellé Description, devant le champs description -->
        <label for="description">Description:</label>
        <input class="@error('description') form--input--error @enderror" type="text" name="description" id="" value="{{ old('description', $plat->description) }}">
        @error('description')
        <div class="form--error-message">
        {{ $message }}
        </div>
        @enderror
    </div>
    <div>
        <!--  pour avoir le libellé, devant le champs epingle -->
        <label for="epingle">Epingle:</label>
        <input class="@error('epingle') form--input--error @enderror" type="text" name="epingle" id="" value="{{ old('epingle', $plat->epingle) }}">
        @error('epingle')
        <div class="form--error-message">
        {{ $message }}
        </div>
        @enderror
    </div>
        <button type="submit">Valider</button>
    </form>
@endsection