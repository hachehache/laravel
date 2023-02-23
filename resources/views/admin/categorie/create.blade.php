@extends('base')

@section('page_title', 'Admin - Catégorie - Création')

@section('content')


            <h1>Admin - Catégorie - Creation</h1>
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
    <form action="{{route('admin.categorie.store')}}" method="post">
        
    <!--csrf permet de securiser, empeche piratage -->
    @csrf
<!-- @@method('PUT')ne pas mettre dans le create sinon erreur --> 
    {{-------------- CREATION D'UNE CATEGORIE ----------------}}

    <fieldset>
    {{------- NOM -----------}}

        <div class="categorie-creation">
            <!--old permet de recuperer les valeurs presente dans la base -->
            <!-- Label pour avoir le libellé Nom, devant le champs catégorie -->
           <label for="nom">Nom: </label>
            <input class="@error('nom') form--input--error @enderror" type="text" name="nom" size="30" id="" value="{{ old('nom', $categorie->nom) }}">
            @error('nom')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
        </div>

        <br>
    {{------- DESCRIPTION -----------}}
    <div class="categorie-creation">
            <!--  pour avoir le libellé Description, devant le champs description -->
            <label for="description">Description: </label>
            <input class="@error('description') form--input--error @enderror" type="text" name="description" size="30" value="{{ old('description', $categorie->description) }}">
            @error('description')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
    </div>
        
    </fieldset>
    {{------- VALIDATION -----------}}
    
<br>
        <div class="categorie-creation">
            <button type="submit">Valider</button>
        </div>  
<br> 
        </form>
    @endsection
     