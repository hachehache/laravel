@extends('base')

@section('page_title', 'Admin - Réservation - Creation')

@section('content')

<body>
   <form>
            <h1>Admin - Réservation - Creation</h1>
    <!-- BALISE DE SEPARATION -->
    <div class="separation"></div>
   
    <div class="corps-formulaire">
        <div class="gauche">
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
    <form action="{{route('admin.reservation.store')}}" method="POST">
        
    <!--csrf permet de securiser, empeche piratage -->
    @csrf
    

    {{-------------- CREATION D'UNE RESERVATION ----------------}}
    {{------- NOM -----------}}
    
    <div>
						<div class="groupe" align="center">
           <label for="nom">Nom: </label>
           <div class="container">
            <input class="@error('nom') form--input--error @enderror" type="text" name="nom" id="" value="{{ old('nom', $reservation->nom) }}">
            @error('nom')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    {{------- PRENOM -----------}}
                        <div class="groupe" align="center">
            <label for="prenom">Prénom: </label>
            <div class="container">
            <input class="@error('prenom') form--input--error @enderror" type="text" name="prenom" id="" value="{{ old('prenom', $reservation->prenom) }}">
                        @error('prenom')
                <div class="form--error-message">
                        {{ $message }}
                </div>
                    @enderror
            </div>
        </div>
    {{------- JOUR -----------}}
            <div class="groupe" align="center">
            <label for="jour">Jour: </label>
            <div class="container">
            <input class="@error('jour') form--input--error @enderror" type="date" name="jour" id="" value="{{ old('jour', $reservation->jour) }}">
            </div>  
                    @error('jour')
                    <div class="form--error-message">
                La date doit être le jour même ou un jour ultérieur.
            </div>
                        {{ $message }}
                    </div>
                    @enderror
            </div>
    </div>
</div>
    {{------- HEURE -----------}} 
            <div class="groupe" align="center">
            <label for="heure">Heure: </label>
            <div class="container">
            <br>
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
    </div>
    {{------- NOMBRE DE PERSONNES -----------}}
            <div class="groupe" align="center">
        <div>
            <label for="nombre_personnes">Nombre de personnes: </label>
            <div class="container">
            <br>
            <input class="@error('nombre_personnes') form--input--error @enderror" type="number" name="nombre_personnes" id="" value="{{ old('nombre_personnes', $reservation->nombre_personnes) }}">
            @error('nombre_personnes')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
      
    {{------- TELEPHONE -----------}}
            <div class="groupe" align="center">
        <div>
            <label for="tel">Tel: </label>
            <div class="container">
            <br>
            <input class="@error('tel') form--input--error @enderror" type="tel" name="tel" id="" value="{{ old('tel', $reservation->tel) }}" placeholder="06 12 34 56 78">
            @error('tel')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
        </div>
    <div>
    {{------- MAIL -----------}}
            <div class="groupe" align="center">
        <div>
            <label for="mail">Mail: </label>
            <div class="container">
            <br>
            <input class="@error('Mail') form--input--error @enderror" type="email" name="mail" id="" value="{{ old('email', $reservation->email) }}">
            @error('mail')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
           
        </div>
    </div>
</div>
    {{------- VALIDATION -----------}}
        </div>
    </div>
</div>
        	<!-- CENTRAGE DU BOUTON -->
							<div class="pied-formulaire" align="center">
                                <!-- BOUTON D'ENVOI -->
                    <button type="submit">Valider</button>
                            </div>  
                            <br>
        </form>
    </body>
    @endsection
     