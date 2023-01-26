@extends('base')

@section('page_title', 'Contact')

@section('content')
    <h1>Contact</h1>
    <h3>Adresse du Restaurant :</h3>
    {{-- -- affichage de l'adresse et tel --}}
    {{ $adresse }}<br>
    <br>
    <h3>Téléphone :</h3>
    {{$tel }}<br>
    <br>
    {{-- pour affichage de la carte --}}
    {{-- !!$map : oblige a afficher le code et non le nom de la carte, c'est un system de secu passif --}} 
    {{-- tous les caractères dangereux sont echappés      --}}
    <h3>Plan de notre Restaurant :</h3>
    {{!! $map !!}}<br>
    <br> 
    <h3>Nos horaires d'ouverture :</h3>
    {{$horaire }}<br>
    <br>
    <h3>Notre formulaire de contact :</h3>
    <br>
    <!---------- FORMULAIRE ---------------------->

    <!--  Formulaire de Contact en HTML avec passage du formulaire en CSS -->

    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <title> Formulaire CONTACT EN HTML ET CSS</title>
                            <!-- BIBLIOTHEQUE D'ICONES - FONTAWESOME CDN SOUS GOOGLE - -->
                                <!-- font-awesome/6.2.1/css/all.min.css -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- BALISE DE STYLE AVEC SON CHEMIN -->
        <!-- <link rel="stylesheet" href="C:/Users/user/OneDrive/Documents/projets/Git-Test/asset/css/style-contact.css"> -->
        
        <link rel="stylesheet" href="asset/css/style-contact-restau.css">
        
        
    </head>
    <body>
        <form>
        
                        <!-- TITRE -->
                <h1>Nous Contacter</h1>
                        <!-- BALISE DE SEPARATION -->
                        <div class="separation"></div>
                        <!-- BALISE DE SEPARATION -->
                        <div class="corps-formulaire">
                            <div class="gauche">
                        
                        
                        <!-- DIV AVEC CLASS GROUPE CONTIENT LES CHAMPS :  NOM, PRENOM, EMAIL, TELEPHONE, MESSAGE -->
                        <!-- LA CLASS SERA UTILE DANS LE FICHIER CSS POUR DEFINIR LA MISE EN FORM -->
                        <!-- CHAMP NOM -->
                            <div class="groupe">
                            <label> Votre Nom</label>
                            <input type="text">
                            <!-- ICONE USER NOM -->
                            <i class="fa-solid fa-user"></i>
                            </div>
                            
                            <!-- CHAMP PRENOM -->
                            <div class="groupe">
                            <label> Votre Prénom</label>
                            <input type="text">
                            <!-- ICONE USER PRENOM-->
                            <i class="fa-solid fa-user"></i>
                            </div>
                            
                            <!-- CHAMP EMAIL -->
                            <div class="groupe">
                            <label> Votre Adresse Email</label>
                            <input type="text">
                                <!-- ICONE EMAIL -->
                            <i class="fa-solid fa-envelope"></i>
                            </div>
                            
                            <!-- CHAMP TELEPHONE -->
                            <div class="groupe">
                            <label> Votre N° Téléphone</label>
                            <input type="text">
                                <!-- ICONE TELEPHONE -->
                            <i class="fa-solid fa-phone"></i>
                            </div>
                        </div>
                            
                            <!-- CHAMP MESSAGE -->
                            <div class="droite">
                            <!-- CHAMP MESSAGE -->
                                <div class="groupe">
                                <label>Message</label>
                                <!-- CE N'EST PAS UN INPUT MAIS UN TEXAREA -->
                                <textarea placeholder="Saisissez ici..."></textarea>
                            </div>				
                        </div>	
                    </div>
    
                                    <!-- CENTRAGE DU BOUTON -->
                                <div class="pied-formulaire" align="center">
                                <!-- BOUTON D'ENVOI -->
                                <button>Envoyer le message</button>
                                </div>
                            
        </form>
        </body>    
    </html>
    <br>
    <!--------------------------------->
@endsection
