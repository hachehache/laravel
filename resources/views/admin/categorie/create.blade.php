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
    <form action="{{route('admin.categorie.create')}}" method="POST">
        
    <!--csrf permet de securiser, empeche piratage -->
    @csrf
    
        <!--div class="form-group"-->
        <div>
  <!-- si erreur on ajoute cette class --> <!--old permet de recuperer les valeurs presente dans la base -->
            <!--  pour avoir le libellé Nom, devant le champs catégorie -->
           <label for="nom">Nom </label>
            <input class=@error('nom') form--input--error @enderror type="text" name="nom">
            
            @error('nom')
            <div>
            {{ $message }}
            </div>
            @enderror
        </div>
         
        <div>
            <!--  pour avoir le libellé Description, devant le champs description -->
            <label for="description">Description</label>
            <!--textarea type="text" name="description" ></textarea -->
            <input class=@error('description') form--input--error @enderror type="text" name="description">
            @error('description')
            <div>
            {{ $message }}
        </div>
            @enderror
        </div>
    
        <!--div class="form-group"-->  
            <!-- input type="submit" value="valider" -->
        </div>
            <button type="submit">Valider</button>
           
        </form>
    @endsection
     