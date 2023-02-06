@extends('base')

@section('page_title', 'Admin - Etiquette - Création')

@section('content')


<body>
    <form>
            <h1>Admin - Etiquette - Creation</h1>
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
    <form action="{{route('admin.etiquette.store')}}" method="POST">
        
    <!--csrf permet de securiser, empeche piratage -->
    @csrf
    {{-------------- CREATION D'UNE ETIQUETTE ----------------}}
    {{------- NOM -----------}}
            <br>
        <div>
             <!--old permet de recuperer les valeurs presente dans la base -->
            <!-- Label pour avoir le libellé Nom, devant le champs etiquette -->
           <label for="nom">Nom: </label>
            <input class="@error('nom') form--input--error @enderror" type="text" name="nom" id="" value="{{ old('nom', $etiquette->nom) }}">
            @error('nom')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
        </div>
        <br>
    {{------- DESCRIPTION -----------}}
        <div>
             <!--  pour avoir le libellé Description, devant le champs description -->
            <label for="description">Description: </label>
            <input class="@error('description') form--input--error @enderror" type="text" name="description" value="{{ old('description', $etiquette->description) }}">
            @error('description')
            <div class="form--error-message">
                {{ $message }}
            </div>
             @enderror
        </div>
    {{------- VALIDATION -----------}}
        </div>
        <div>
            <br>
            <button type="submit">Valider</button>
        </div>  
        <br>
        </form>
    @endsection