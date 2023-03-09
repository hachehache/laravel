@extends('base')

@section('page_title', 'Admin - Réservation - Creation')

@section('content')

            <h1>Admin - Réservation - Creation</h1>
    <!-- BALISE DE SEPARATION -->
    <div class="separation"></div>
    
 <!----- Retour a Dashboard ---->
 <div class="retour_dashboard">
    <a href="{{ route('dashboard') }}">Retour au Tableau de bord</a>
</div>
<!----------------------------->
   
   <!-- <div class="corps-formulaire"></div> -->
      <!--   <div class="gauche"></div>  -->
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
    <form action="{{route('admin.reservation.store')}}" method="post">
        
    <!--csrf permet de securiser, empeche piratage -->
    @csrf
 <!-- @@method('PUT')ne pas mettre dans le create sinon erreur -->


    {{-------------- CREATION D'UNE RESERVATION ----------------}}
    <fieldset class="reservation-creation">
        <legend class="reservation-creation"><p><strong>Reservation en ligne</strong></p></legend> 
    {{------- NOM -----------}}
    <div class="reservation-creation">
           <label for="nom" style="padding-right: 70px">Nom: </label>
            <input class="@error('nom') form--input--error @enderror" type="text" name="nom" size="30" id="" value="{{ old('nom', $reservation->nom) }}">
            @error('nom')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
    </div>
    
<br>
    {{------- PRENOM -----------}}
    <div class="reservation-creation">
            <label for="prenom" style="padding-right: 55px">Prénom: </label>
            <input class="@error('prenom') form--input--error @enderror" type="text" name="prenom" size="30" id="" value="{{ old('prenom', $reservation->prenom) }}">
            @error('prenom')
            <div class="form--error-message">
                    {{ $message }}
            </div>
            @enderror
    </div>
        
<br>

    {{------- JOUR -----------}}
    <div class="reservation-creation">
            <label for="jour" style="padding-right: 77px">Jour: </label>
            <input class="@error('jour') form--input--error @enderror" type="date" name="jour" id="" value="{{ old('jour', $reservation->jour) }}">
            @error('jour')
            <div class="form--error-message">
                La date doit être le jour même ou un jour ultérieur.
            </div>
            @enderror
    </div>    
<br>
    {{------- HEURE -----------}} 
    <div class="reservation-creation">
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
    <div class="reservation-creation">
            <label for="nombre_personnes" style="padding-right: 80px">Nombre de personnes: </label>
            <input class="@error('nombre_personnes') form--input--error @enderror" type="number" name="nombre_personnes" id="" value="{{ old('nombre_personnes', $reservation->nombre_personnes) }}">
            @error('nombre_personnes')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
    </div>
    <br>
    {{------- TELEPHONE -----------}}
         
    <div class="reservation-creation">
            <label for="tel" style="padding-right: 70px">Tel: </label>
              <!-- placeholder: aide pour indiquer le format n° phone -->
            <input class="@error('tel') form--input--error @enderror" type="tel" name="tel"  size="20" id="" value="{{ old('tel', $reservation->tel) }}" placeholder="06 12 34 56 78">
            @error('tel')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
    </div>

        <br>

    {{------- MAIL -----------}}
    <div class="reservation-creation">
            <label for="mail"  style="padding-right: 70px">Mail: </label>
            <input class="@error('email') form--input--error @enderror" type="email" name="email" size="30" id="" value="{{ old('email', $reservation->email) }}" placeholder="admin@example.com">
            @error('email')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
           
        

    {{------- VALIDATION -----------}}
</fieldset>

<br>
        	<!-- CENTRAGE DU BOUTON -->
							<div class="reservation-creation" align="center">
                                <!-- BOUTON D'ENVOI -->
                    <button type="submit">Valider</button>
    </div>  
                            <br>
        </form>
        <!----- Retour a page précédente ---->
        <div class="retour_page_precedente">
            <a href="{{ route('admin.reservation.index') }}">Page précédente</a>
        </div>
        <!----------------------------->
    @endsection
     