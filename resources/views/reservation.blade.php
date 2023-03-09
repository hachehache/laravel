@extends('base')

@section('page_title', 'Réservation Client')

@section('content')
<h2>Page des Réservations clients</h2>

 <!----- Retour Accueil ---->
 <div class="retour_Accueil">
    <a href="{{ route('home') }}">Retour Accueil</a>
</div>
<!----------------------------->

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
    <form action="{{route('reservation')}}" method="post">
        

         <!--csrf permet de securiser, empeche piratage -->
    @csrf
        <br>
       {{-- formulaire de reservation par le client --}}
       <fieldset class="reservation-creation_client"> 

        <legend class="menu-categorie"><p><strong>Reservation en ligne</strong></p></legend> 
        {{------- NOM -----------}}
    
        <div class="reservation-creation_client">
               <label for="nom" style="padding-right: 70px">Nom: </label>
                <input class="@error('nom') form--input--error @enderror" type="text" name="nom" size="30" id="" value="">
                @error('nom')
                <div class="form--error-message">
                    {{ $message }}
                </div>
                @enderror
        </div>
        
    <br>
        {{------- PRENOM -----------}}
        <div class="reservation-creation_client">
                <label for="prenom" style="padding-right: 55px">Prénom: </label>
                <input class="@error('prenom') form--input--error @enderror" type="text" name="prenom" size="30" id="" value="">
                @error('prenom')
                <div class="form--error-message">
                        {{ $message }}
                </div>
                @enderror
        </div>
            
    <br>
    
        {{------- JOUR -----------}}
        <div class="reservation-creation_client">
                <label for="jour" style="padding-right: 77px">Jour: </label>
                <input class="@error('jour') form--input--error @enderror" type="date" name="jour" id="" value="">
                @error('jour')
                <div class="form--error-message">
                    La date doit être le jour même ou un jour ultérieur.
                </div>
                @enderror
        </div>    
    <br>
        {{------- HEURE -----------}} 
        <div class="reservation-creation_client">
            <label for="heure" style="padding-right: 100px">Heure: </label>
            <select name="heure" id="">
                @foreach ($creneaux_horaires as $creneau_horaire)
                    <option value="{{ $creneau_horaire }}" @if (old('heure', $reservation->heure) == $creneau_horaire) selected @endif>{{ $creneau_horaire }}</option>
                @endforeach
            </select>
            @error('heure')
                <div class="form--error-message">
                    {{ $message }}
                </div>
            @enderror
    </div>
        
    <br>
        {{------- NOMBRE DE PERSONNES -----------}}
    <br> 
    <div class="reservation-creation_client">
                <label for="nombre_personnes" style="padding-right: 80px">Nombre de personnes: </label>
                <input class="@error('nombre_personnes') form--input--error @enderror" type="number" name="nombre_personnes" id="" value="">
                @error('nombre_personnes')
                <div class="form--error-message">
                    {{ $message }}
                </div>
                @enderror
        </div>
        <br>
        {{------- TELEPHONE -----------}}
             
        <div class="reservation-creation_client">
                <label for="tel" style="padding-right: 70px">Tel: </label>
                  <!-- placeholder: aide pour indiquer le format n° phone -->
                <input class="@error('tel') form--input--error @enderror" type="tel" name="tel"  size="20" id="" value="" placeholder="06 12 34 56 78">
                @error('tel')
                <div class="form--error-message">
                    {{ $message }}
                </div>
                @enderror
        </div>
    
            <br>
    
        {{------- MAIL -----------}}
        <div class="reservation-creation_client">
                <label for="mail" style="padding-right: 70px">Mail: </label>
                <input class="@error('email') form--input--error @enderror" type="email" name="email" size="30" id="" value="">
                @error('email')
                <div class="form--error-message">
                    {{ $message }}
                </div>
                @enderror
                <br>
    
        {{------- VALIDATION -----------}}
    </fieldset>
                    <br>
    
                <!-- CENTRAGE DU BOUTON -->
                <div class="reservation-creation_client">
                                    <!-- BOUTON D'ENVOI -->
                        <button type="submit">Valider</button>
        </div>  
                                <br>
            </form>
      
          <!-----------formulaire coté Client----------------------------------------------->
   
          <hr>
          <!----------INFO DU RESTAURANT EN BD------------------------------------------------->
    <table  width="20%" border="5" cellspacing="1" cellpadding="1" align="center">
        <tr><td>
            <p class="alignRight">
                    <h3>Adresse du Restaurant :</h3>
                        {{-- -- affichage de l'adresse et tel --}}
                        {{ $adresse }}
                    
                    <h3>Téléphone :</h3>
                        {{$tel }}
            </p>   
        </td><tr>
    </table>  
    <br>

    <table  width="20%" border="5" cellspacing="1" cellpadding="1" align="center">
        <tr><td>
            <p class="alignLeft">
                {{-- pour affichage de la carte                     --}}
                {{-- !!$map : oblige a afficher le code             --}}
                {{--     et non le nom de la carte,                 --}} 
                {{-- c'est un system de secu passif                 --}} 
                {{-- tous les caractères dangereux sont echappés    --}}
                <h3>Plan de notre Restaurant:</h3>
            </p>   
    </td><tr>
</table>  

<br>

    <table  width="20%" border="5" cellspacing="1" cellpadding="1" align="center">
        <tr><td>
            <p class="alignLeft">
                {{!! $map !!}}
            </p>   
        </td><tr>
    </table>  

<br>


<table  width="20%" border="5" cellspacing="1" cellpadding="1" align="center">
        <tr><td>
                <p class="alignLeft">
                    <h3>Nos horaires d'ouverture :</h3>
                    {{$horaire }}
                </p>   
        </td><tr>
</table>  

<br>

<table  width="60%" border="5" cellspacing="1" cellpadding="1" align="center">
        <tr><td>
            <p class="alignLeft">
                <h2>Vous prévoyez de féter un événement: </h2>
                    
                <p> Un anniversaire, une Bar Mitza, une naissance ... </p>
                <p> Prenez Contact avec nous.</p>
            </p>   
        </td><tr>
</table>  
    <!---------------------------------------------------------------->

            </form>
@endsection
