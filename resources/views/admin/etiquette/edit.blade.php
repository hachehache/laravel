@extends('base')

@section('page_title', 'Admin - Etiquette - Modification')

@section('content')


<body>
    <form>
            <h1>Admin - Etiquette - Modification</h1>
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

@if ($errors->any())
<div>
Attention, les donnéees n'ont pas été enregistrées, il y a des erreurs dans le formulaire.
</div>
@endif

<!-- ne pas utiliser la methode GET car faille secu, le password s'affichera en dur -->
<form action="{{route('admin.etiquette.update',['id' => $etiquette ->id]) }}" method="POST">

<!--csrf permet de securiser, empeche piratage -->
@csrf
<!--permet a laravel de reconnaitre si la method n'est pas GET ou POST -->
<!-- PUT maj complète et PATCH maj partielle -->
<!-- NE PAS METTRE METHODE PUT, sinon erreur à la validation de la modif etiquette -->
<!-- @ method('PUT') -->
        <br>
    <div>
        <label for="description">Nom:</label>
            <!-- si erreur on ajoute cette class --> <!--old permet de recuperer les valeurs presente dans la base -->
        <input class="@error('nom') form--input--error @enderror" type="nom" name="nom" id="" value="{{ old('nom', $etiquette->nom) }}" readonly>
        @error('nom')
        <div class="form--error-message">
        {{ $message }}
        </div>
        @enderror
    </div>
    <br>
    <div>
        <!--  pour avoir le libellé Description, devant le champs description -->
        <label for="description">Description:</label>
        <input class="@error('description') form--input--error @enderror" type="text" name="description" id="" value="{{ old('description', $etiquette->description) }}">
        @error('description')
        <div class="form--error-message">
        {{ $message }}
        </div>

        @enderror
        
    </div>
    <div>
        <br>
        <button type="submit">Valider</button>
    </div>
    <br>
        </form>
    </body>
@endsection