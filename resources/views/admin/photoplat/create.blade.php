@extends('base')

@section('page_title', 'Admin -Photoplat - Création')

@section('content')

		<h1>Admin -Photoplat - Creation</h1>
<!-- BALISE DE SEPARATION -->
<div class="separation"></div>
<br>
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
    Verifier que la photo n'est pas déja enregistre dans la base.
    </div>
@endif   
    <!-- ne pas utiliser la methode GET car faille secu, le password s'affichera en dur -->
    <form action="{{route('admin.photoplat.store')}}" method="post">
        
    <!--csrf permet de securiser, empeche piratage -->
    @csrf
    {{-------------- CREATION D'UNE photoplat ----------------}}

   
  
        {{------- NOM -----------}}
    
       
            
    
   

        <div>

            <!-- PAS DE DESCRIPTION DANS LA BASE-->
             <!--  pour avoir le libellé Description, devant le champs description -->
             <!--   <label for="description">Description: </label>
            <input class="@@error('description') form--input--error @@error" type="text" name="description" size="30" value="{{-- old('description', $photoplat->description)--}}">-->
             <!--   @@error('description')-->
            <!--<div class="form--error-message">-->
             <!--       {{-- $message --}}
            </div> -->
             <!--    @@enderror -->
        </div>
        <fieldset>
<br>
        {{------- CHEMIN -----------}}
        <div class="photoplat-creation">
            <!--  pour avoir le libellé Description, devant le champs description -->
           <label for="file-upload">Upload du fichier: </label><br />
         <br>
           <input class="@error('chemin') form--input--error @enderror" type="file" name="chemin" size="" value="">
           @error('chemin')
           <div class="form--error-message">
               {{ $message }}
           </div>
            @enderror
       </div>
<br>
    <br>
        {{------- DESCRIPTION -----------}}
        <div class="photoplat-creation">
           <!--  pour avoir le libellé Description, devant le champs description -->
           <label for="description">Description:</label>
           <input class="@error('description') form--input--error @enderror" type="text" name="description" id="" value="">
           @error('description')
               <div class="form--error-message">
                   {{ $message }}
               </div>
            @enderror 
            </div>

            {{----------Inserer la photo dans une categorie-------------}}
            <div>
                <!--old permet de recuperer les valeurs presente dans la base -->
                <!-- Label pour avoir le libellé Nom, devant le champs catégorie -->
       
                  <!--<fieldset>-->
                  <!-- <select name="categorie_id" id=""> a virer -->
                            <!-- AFFICHAGE DE LA LISTE DES CATEGORIES -->
             <!--    <legend class="menu-categorie"><p><strong>Liste des Catégories</strong></p></legend> -->
                 <!--             @@foreach ($categories as $categorie) -->
                  <!--         <label for="">{{-- $categorie->nom --}}</label> -->
                       <!--  name=unique car une photo ne peut-être que dans une seule catégorie -->
                   <!--              <input type="radio" name="unique" value="" id="" > <br> -->
                   <!--            @@endforeach -->
                 
                 </fieldset>
                
    {{------- VALIDATION -----------}}
            <br>
            <div class="photoplat-creation">
            <button type="submit">Valider</button>
        </div>  
        <br>
        </form>
    @endsection