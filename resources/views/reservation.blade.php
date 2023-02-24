@extends('base')

@section('page_title', 'Réservation')

@section('content')
<h2>Formulaire de Réservation</h2>


<body>
    <header>
    <form>
        <br>
       {{-- formulaire page de contact --}}
	<div class="formulaire">
        <h2>formulaire de reservation</h2>
                <form action="#" method="post">
                    
                    <!-- DIV AVEC CLASS GROUPE CONTIENT LES CHAMPS :  NOM, PRENOM, EMAIL, TELEPHONE, MESSAGE -->
                    <!-- LA CLASS SERA UTILE DANS LE FICHIER CSS POUR DEFINIR LA MISE EN FORM -->
                        <!-- CHAMP NOM -->
                        <div class="formulaire">
                            <label> Votre Nom</label>
                            <input type="text">                    
                        </div>
                        
                        <div class="formulaire">
                            <label for="date">Date</label>
                            <input type='date'>
                        </div>
                        
                        <div class="formulaire">
                            <label for="time">Heure</label>
                            <input type='time'>
                        </div>

                        <div class="formulaire">
                            <label for="number">Nbre de Personnes</label>
                            <input type="number">
                        </div>
                        
                        <!-- CHAMP EMAIL -->
                        <div class="formulaire">
                            <label> Votre Adresse Email</label>
                            <input type="text">
                        </div>
                        
                        <!-- CHAMP TELEPHONE -->
                        <div class="formulaire">
                            <label> Votre N° Téléphone</label>
                            <input type="text">
                        </div>

                        <!-- CHAMP MESSAGE -->
                            <div class="formulaire">
                                <label>Message</label>
                                <textarea placeholder="Saisissez ici..."></textarea>
                            </div>				
                        	
</div>

                                <!-- CENTRAGE DU BOUTON -->
                            <div class="pied-formulaire" align="center">
                            <!-- BOUTON D'ENVOI -->
                                <button>Envoyer le message</button>
                            </div>            
                </form>

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
