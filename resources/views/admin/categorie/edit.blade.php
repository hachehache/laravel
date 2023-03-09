@extends('base')

@section('page_title', 'Admin - Catégorie - Modification')

@section('content')


<h1>Admin - Catégorie - Modification</h1>
<!-- BALISE DE SEPARATION -->
<div class="separation"></div>

 <!----- Retour a Dashboard ---->
 <div class="retour_dashboard">
    <a href="{{ route('dashboard') }}">Retour au Tableau de bord</a>
</div>
<!----------------------------->

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
<form action="{{route('admin.categorie.update',['id' => $categorie ->id]) }}" method="POST">

<!--csrf permet de securiser, empeche piratage -->
@csrf
<!--permet a laravel de reconnaitre si la method n'est pas GET ou POST -->
<!-- PUT maj complète et PATCH maj partielle -->
<!-- NE PAS METTRE METHODE PUT, sinon erreur à la validation de la modif etiquette -->
<!-- @ method('PUT') -->
<fieldset class="categorie-modif">
        <legend class="categorie-modif"><p><strong>Catégorie modification</strong></p></legend> 
    <br>
        <div class="categorie-modif" align="center">
                <label for="nom" style="padding-right: 70px">Nom: </label><br />
                    <!-- si erreur on ajoute cette class --> <!--old permet de recuperer les valeurs presente dans la base -->
                <input class="@error('nom') form--input--error @enderror" type="nom" name="nom" id="" value="{{ old('nom', $categorie->nom) }}" readonly>
                @error('nom')
                <div class="form--error-message">
                {{ $message }}
                </div>
                @enderror
        </div>
        <div class="categorie-modif" align="center">
                <!--  pour avoir le libellé Description, devant le champs description -->
                <label for="description" style="padding-right: 70px">Description</label><br />
                <input class="@error('description') form--input--error @enderror" type="text" name="description" id="" value="{{ old('description', $categorie->description) }}">
                @error('description')
                <div class="form--error-message">
                {{ $message }}
                </div>
                @enderror  
        </div>

</fieldset>
<br>
        <div class="categorie-modif" align="center"> 
            <button type="submit">Valider</button>
        </div>
<br>
    </form>
    <!----- Retour a page précédente ---->
    <div class="retour_page_precedente">
        <a href="{{ route('admin.categorie.index') }}">Page précédente</a>
    </div>
    <!----------------------------->

@endsection