@extends('base')

@section('page_title', 'Contact')

@section('content')

    
            <!--========================================================================= --> 
<body>                    
    
                            <h1>Page de Contact</h1>     

 <!----- Retour Accueil ---->
 <div class="retour_Accueil">
    <a href="{{ route('home') }}">Retour Accueil</a>
</div>
<!----------------------------->

<!--------Bouton reservation qui redirige vers page reservation-------------------->
<div class="contact_reservation">
<a href="{{ route('reservation') }}" class="btn3"> Réservation </a>
</div>
<br>
<!----------------------------->
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
 
    <!---------- FORMULAIRE ---------------------->

    <!--  Formulaire de Contact en HTML avec passage du formulaire en CSS -->

        <form>
        
                        <!-- TITRE -->
                <h1>Nous Contacter</h1>

                 <!-- *************************************-->       
                 <table width="40%" border="3" cellspacing="1" cellpadding="1" align="center">
                    <tr><td>       
                        <!-- DIV AVEC CLASS GROUPE CONTIENT LES CHAMPS :  NOM, PRENOM, EMAIL, TELEPHONE, MESSAGE -->
                        <!-- LA CLASS SERA UTILE DANS LE FICHIER CSS POUR DEFINIR LA MISE EN FORM -->
                        <!-- CHAMP NOM -->
                        <div class="contener_contact">
                            <div class="groupe">
                                <div class="champ">
                                <label> Votre Nom :</label><br />
                                <input classe="input_contact" type="text">
                                </div>
                            </div>  
                            
                            <!-- CHAMP EMAIL -->
                            <div class="groupe">
                                <div class="champ">
                                <label> Votre Adresse Email :</label><br />
                                <input type="text">
                            </div>
                            
                            <!-- CHAMP TELEPHONE -->
                            <div class="groupe">
                                <label> Votre N° Téléphone :</label><br />
                                <input type="text">
                            </div>
                            
                            <!-- CHAMP MESSAGE -->
                            <div class="droite">
                            <!-- CHAMP MESSAGE -->
                                <div class="groupe">
                                <label>Message :</label>
                                <!-- CE N'EST PAS UN INPUT MAIS UN TEXAREA -->
                                <textarea placeholder="Saisissez ici ..."></textarea>
                                </div>				
                            </div>	
    
                            <!-- CENTRAGE DU BOUTON -->
                            <div class="pied-formulaire" align="center">
                                <!-- BOUTON D'ENVOI -->
                                <button>Envoyer le message</button>
                            </div>
                        </div>
                        </td><tr>
                        </table>     
                             
        </form>
    
        
    <br>
</body>    
@endsection
