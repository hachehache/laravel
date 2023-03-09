@extends('base')

@section('page_title', 'Admin - Actu - Création')

@section('content')

		<h1>Admin - Actu - Creation</h1>
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
    </div>
@endif   
    <!-- ne pas utiliser la methode GET car faille secu, le password s'affichera en dur -->
    <form action="{{route('admin.actu.store')}}" method="post">
        
    <!--csrf permet de securiser, empeche piratage -->
    @csrf
    {{-------------- CREATION D'UNE ETIQUETTE ----------------}}

    <fieldset class="actu-creation">
        <legend class="actu-creation"><p><strong>Actu creation</strong></p></legend> 

    {{------- NOM -----------}}
               
    <div class="actu-creation" align="center" width="100px">
        <label for="jour_publication">Jour de publication:</label><br />
        <!-- si erreur on ajoute cette class --> <!--old permet de recuperer les valeurs presente dans la base -->
            <input class="@error('jour_publication') form--input--error @enderror" type="date" name="jour_publication" id="" value="{{ old('jour_publication', $actu->jour_publication) }}">
            @error('jour_publication')
                <div class="form--error-message">
                    {{ $message }}
            
            </div>
            @enderror
    </div>
       <br>
    {{------- DESCRIPTION -----------}}
        <div class="actu-creation" align="center">
            <label for="heure_publication">Heure de publication:</label><br />
            <!-- si erreur on ajoute cette class --> <!--old permet de recuperer les valeurs presente dans la base -->
                <input class="@error('jour_publication') form--input--error @enderror" type="time" name="heure_publication" id="" value="{{ old('heure_publication', $actu->heure_publication) }}">
                @error('heure_publication')
                    <div class="form--error-message">
                        {{ $message }}
            </div>
             @enderror
        </div>

        <br>
            <div class="actu-modif" align="center">
                <!--  pour avoir le libellé Description, devant le champs description -->
                <label for="texte">Saisissez votre texte:</label><br />
                <!-- textarea plutôt que input, permet un retour à la liste, et ascenseur si dépasse la hauteur du champ -->
                <textarea class="@error('texte') form--input--error @enderror" type="textarea" name="texte" id="" value="{{ old('texte', $actu->texte) }}" style="width:800px; height:250px"></textarea>
                @error('texte')
                    <div class="form--error-message">
                        {{ $message }}
                    </div>
                 @enderror 
            </div>
    {{------- VALIDATION -----------}}
    </fieldset>
          
            <br>
            <div class="actu-creation" align="center">
            <button type="submit">Valider</button>
        </div>  
        <br>
        </form>
        <!----- Retour a page précédente ---->
        <div class="retour_page_precedente">
            <a href="{{ route('admin.actu.index') }}">Page précédente</a>
        </div>
        <!----------------------------->
    @endsection