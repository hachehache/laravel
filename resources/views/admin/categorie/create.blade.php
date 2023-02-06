@extends('base')

@section('page_title', 'Admin - Catégorie - Création')

@section('content')
<h1>Admin - Catégorie - Creation</h1>
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
    <form action="{{route('admin.categorie.store')}}" method="POST">
        
    <!--csrf permet de securiser, empeche piratage -->
    @csrf
 
    {{-------------- CREATION D'UNE CATEGORIE ----------------}}
    {{------- NOM -----------}}
        <div>
            <!--old permet de recuperer les valeurs presente dans la base -->
            <!-- Label pour avoir le libellé Nom, devant le champs catégorie -->
           <label for="nom">Nom: </label>
            <input class="@error('nom') form--input--error @enderror" type="text" name="nom" id="" value="{{ old('nom', $categorie->nom) }}">
            @error('nom')
            <div class="form--error-message">
            {{ $message }}
            </div>
            @enderror
        </div>
    {{------- DESCRIPTION -----------}}
        <div>
            <!--  pour avoir le libellé Description, devant le champs description -->
            <label for="description">Description: </label>
            <input class="@error('description') form--input--error @enderror" type="text" name="description" value="{{ old('description', $categorie->description) }}">
            @error('description')
            <div class="form--error-message">
            {{ $message }}
        </div>
            @enderror
        </div>
    {{------- VALIDATION -----------}}
        </div>
        <div>
            <button type="submit">Valider</button>
        </div>   
        </form>
    @endsection
     