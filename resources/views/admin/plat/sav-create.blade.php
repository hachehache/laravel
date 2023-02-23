@extends('base')

@section('page_title', 'Admin - Plat - Création')

@section('content')
    <h1>Admin - Plat - Création</h1>

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

    <form action="{{ route('admin.plat.store') }}" method="post">
            
    <!--csrf permet de securiser, empeche piratage -->
    @csrf
     {{-------------- CREATION D'UN PLAT ----------------}}
        
        <div>
            <label for="nom">Nom: </label>
            <input type="text" name="nom" id="" placeholder="nom du plat" value="">


        </div>
        <br>
        <div>
            <label for="prix">Prix: </label>
            <input type="text" name="prix" id="" placeholder="prix du plat" value="">
        </div>
        <br>
        <div>
            <label for="description">Description: </label>
            <textarea name="description" id="" cols="30" rows="10" placeholder="description du plat" value=""></textarea>
        </div>
        <br>
        <div>
            <input type="checkbox" name="epingle" id="" value="" >
            <label for="epingle">épinglé</label>
        </div>      
<br>

<!-----------LISTE DES CATEGORIES CHOIX UNIQUE PAR BOUTON RADIO - RECUP DANS LA BD ------------------------------>
<!-- VOIR plusieurs pavé fieldset dans un CSS -->
    <fieldset>
    <!--<select name="categorie_id" id=""-->

            <!-- AFFICHAGE DE LA LISTE DES CATEGORIES -->
    <legend class="menu-categorie"><p><strong>Liste des Catégories</strong></p></legend>
                @foreach ($categories as $categorie)
                <label for="">{{ $categorie->nom }}</label>
            <!-- name=unique car un plat ne peut-être que dans une seule catégorie -->
                    <input type="radio" name="unique" value="" id="" > <br>
                @endforeach 
    <br>
        <!-- BALISE DE SEPARATION -->
    <div class="separation-menu-categorie"></div>
        <br>
        <input type="reset" value="décocher"><br>
        <br>
      <!--  <input type="submit" value="Valider"><br> -->
    </fieldset>

<!------------------------------------------------------------------------------------------------------------------>

<!-----------LISTE ETIQUETTES CHOIX MULTIPLE PAR BOUTON RADIO - RECUP DANS LA BD ------------------------------------->
<fieldset>
    <!--<select name="etiquette_id" id=""-->
<!-- VOIR affichage du tableau en fonction du nombre d'etiquette -->
        <legend class="menu-etiquette"> <p><strong>Liste des Etiquettes</strong></p></legend>
            
                @foreach ($etiquettes as $etiquette)
        
                    <label for="">{{ $etiquette->nom }}</label>
                    <input type="radio" name="" value="" id="" /><br />
                @endforeach
           
    <br>
        <!-- BALISE DE SEPARATION -->
  <div class="separation-menu-etiquette"></div>
        <br>
        <input type="reset" value="décocher"><br>
        <br>
        <!-- <input type="submit" value="Valider"><br> -->
</fieldset>
<!------------------------------------------------------------------------------------------------------------------------------->

 {{------- Upload d'un fichier image pour un nouveau plat -----------}}
<fieldset>
    <legend class="menu-upload"> <p><strong>Upload Photo</strong></p></legend>
 
 <br>
   <input class="@error('chemin') form--input--error @enderror" type="file" name="chemin" size="" value="">
   @error('chemin')
   <div class="form--error-message">
       {{ $message }}

    @enderror
</div>
{{------- VALIDATION -----------}}
</fieldset>


<!-----------LISTE DES PHOTOPLATS CHOIX UNIQUE PAR BOUTON RADIO - RECUP DANS REPERTOIRE DEDIE ------------------------------>
<!-- VOIR plusieurs pavés fieldset dans un CSS pour chaque fieldset aura un nom différent -->
 <!--dans le CSS pour définir largeur et position des tableaux-->
<!--<fieldset>-->
    <!--<select name="categorie_id" id="">-->
<!--<body>-->
  <!--  <legend class="menu-photoplat"><p><strong>Liste des photos</strong></p></legend>  -->
            @foreach ($photoplats as $photoplat)
            <!-- name=unique car une photo n'apartient qu'à un seul plat -->
                 <p>   <input type="radio" name="" value="{{ $photoplat->chemin }}" id="" >{{ $photoplat->chemin }}</p><br>-->
                @endforeach-->
<!--</body> --> 
    <br>
        <!-- BALISE DE SEPARATION -->
    <!--<div class="separation-liste-photoplat"></div>-->
        <br>
     <!--   <input type="reset" value="décocher"><br>-->
        <br>
         <!-- <input type="submit" value="Valider"><br> -->
    <!--</fieldset> -->
<!----------->

<br>
<!------------------------------------------------------------------------------------------------------------------>
<!--<fieldset> -->
  
    <!--<legend class="Liste-photoplat"><p><strong>Liste des photos</strong></p></legend> -->

       <!-- <div class="form--radio-buttons--scrollable"> -->
         <!--   @@foreach ($photoplats as $photoplat) -->
            <!-- remetttre unique apres test -->
          <!--  <input type="radio" name="unique" id="{{-- $photoPlat->id --}}" value=""> -->
         <!--   <input type="radio" name="" id="{{--$photoplat->id --}}" value="">  -->
             
            <!--        <img class="form--radio-button-image" src="{{-- asset($photoplat->chemin) --}}"  alt=""><br />  -->
           <!-- @@endforeach -->
    <br>
            <!-- BALISE DE SEPARATION -->
        <!--<div class="separation-liste-photoplat"></div> -->
            <br>
           <!-- <input type="reset" value="décocher"><br>  -->
            <br>
          <!-- <input type="submit" value="Valider"><br> -->
<!--</fieldset>  -->

        <!-- <div class="form--checkboxes--scrollable"> --> 
             

<br>    
<!-- ------------------------->

<br>
<div>
<button type="submit">Valider</button>
</div>  
<br>

    </form>
@endsection