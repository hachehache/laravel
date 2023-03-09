@extends('base')

@section('page_title', 'Admin -Photoplat - Création')

@section('content')

		<h1>Admin -Photoplat - Creation</h1>
<!-- BALISE DE SEPARATION -->
<div class="separation"></div>

 <!----- Retour a Dashboard ---->
 <div class="retour_dashboard">
    <a href="{{ route('dashboard') }}">Retour au Tableau de bord</a>
</div>
<!----------------------------->

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
   
<fieldset class="photoplat-creation">
    <legend class="photoplat-creation"><p><strong>Photoplat création</strong></p></legend> 

<br>
        {{------- CHEMIN -----------}}
        <div class="photoplat-creation">
            <!--  pour avoir le libellé Description, devant le champs description -->
           <label for="file-upload" >Upload du fichier: </label><br />
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
           <label for="description" style="padding-right: 10px">Description:</label>
           <input class="@error('description') form--input--error @enderror" type="text" name="description" id="" value="">
           @error('description')
               <div class="form--error-message">
                   {{ $message }}
               </div>
            @enderror 
            </div>
</fieldset>
               
    {{------- VALIDATION -----------}}
            <br>
            <div class="photoplat-creation" align="center">
            <button type="submit">Valider</button>
        </div>  
        <br>
        </form>
        <!----- Retour a page précédente ---->
        <div class="retour_page_precedente">
            <a href="{{ route('admin.photoplat.index') }}">Page précédente</a>
        </div>
        <!----------------------------->
    @endsection