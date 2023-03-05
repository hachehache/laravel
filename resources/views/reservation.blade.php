@extends('base')

@section('page_title', 'Réservation Client')

@section('content')
<h2>Page des Réservations clients</h2>


<body>
    <header>
    <form>
        <br>
       {{-- formulaire de reservation par le client --}}
       <fieldset>
        {{------- NOM -----------}}
    
        <div class="reservation-creation">
               <label for="nom">Nom: </label>
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
                <label for="prenom">Prénom: </label>
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
                <label for="jour">Jour: </label>
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
                <label for="heure">Heure: </label>
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
                <label for="nombre_personnes">Nombre de personnes: </label>
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
                <label for="tel">Tel: </label>
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
                <label for="mail">Mail: </label>
                <input class="@error('email') form--input--error @enderror" type="email" name="email" size="30" id="" value="{{ old('email', $reservation->email) }}">
                @error('email')
                <div class="form--error-message">
                    {{ $message }}
                </div>
                @enderror
               
            
    
        {{------- VALIDATION -----------}}
    </fieldset>
    
        
                <!-- CENTRAGE DU BOUTON -->
                                <div class="reservation-creation">
                                    <!-- BOUTON D'ENVOI -->
                        <button type="submit">Valider</button>
        </div>  
                                <br>
            </form>
            <!-----------formulaire coté Client----------------------------------------------->
    <br> 
                <div class="horaire_ouverture">
                    <h3>Nos horaires d'ouverture :</h3>
   
                    <p> Tous les jours de: 7h-14h / 20h-00h</p> 
                    <p> Petit-déjeuner dès 7h30</p> 
                </div>
    <br>

    </form>
</header>      
    </body>

</html>

@endsection
