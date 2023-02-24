@extends('base')

@section('page_title', 'Admin - Plat - Création')

@section('content')
    <h1>Admin - Plat - Création</h1>
    <!-- BALISE DE SEPARATION -->
<!--<div class="separation"></div> -->
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
<div class="plat-menu-creation-total">
    <!-- ne pas utiliser la methode GET car faille secu, le password s'affichera en dur -->
    <form action="{{ route('admin.plat.store') }}" method="post">
 <!--csrf permet de securiser, empeche piratage -->
        @csrf
        {{-------------- CREATION D'UN PLAT ----------------}}
        
    
        <fieldset class="plat-creation-nom">
        <div class="plat-creation">
           <!-- <input class="@error('epingle') form--input--error @enderror" type="checkbox" name="epingle" id="" value="" > -->
 <input class="@error('epingle') form--input--error @enderror" type="checkbox" name="epingle" id="" value="0" onclick="if (this.checked) this.value=1; else this.value=0;alert(this.value);" name="epingle" />



            <label for="epingle">épinglé</label>
            @error('epingle')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
        </div>
         <!--old permet de recuperer les valeurs presente dans la base -->
            <!-- Label pour avoir le libellé Nom, devant le champs etiquette -->
            <!-- size est la largeur du champ -->

        <div class="plat-creation">
            <label for="nom">Nom: </label>
            <input class="@error('nom') form--input--error @enderror" type="text" name="nom" size="30" id="" placeholder="nom du plat" value="">
            @error('nom')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
        </div>
    
       <div class="plat-creation">
            <label for="prix">Prix: </label>
            <input class="@error('nom') form--input--error @enderror" type="text" name="prix" size="30" id="" placeholder="prix du plat" value="">
            @error('prix')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="plat-creation">
            <label for="description">Description: </label>
            <input class="@error('description') form--input--error @enderror" type="text" name="description" size="30" id="" cols="30" rows="10" placeholder="description du plat" value=""></textarea>
            @error('description')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
        </div>
    </fieldset>

    
<!------------------------------------AJOUT ----------photo_plat_id----------->

<fieldset class="plat-menu-photo">
    <div class="liste-photoplat-plat">
        <legend class="plat-menu-photo"><p><strong>Liste des ID Photos</strong></p></legend>
        @foreach ($plats as $plat)
        <div>
            <label for="photo_plat_id"> </label>
        <input class="@error('photo_plat_id') form--input--error @enderror" type="checkbox" name="photo_plat_id" id="" value="photo_plat_id">
  <!-- <img class="vertical-menu" src="{{ asset($lat->id) }}" alt="photo {{ $plat->id }}">-->
      <!--  <span>photo {{ $plat->id }}</span>   -->
        </div>
        @endforeach
    </div>
</fieldset>

    <!-- Label pour avoir le libellé Nom, devant le champs catégorie -->
    <fieldset class="plat-menu-categorie">
        <div class="liste-categorie">
                <!-- AFFICHAGE DE LA LISTE DES CATEGORIES -->
                <legend class="plat-menu-categorie"><p><strong>Liste des Catégories</strong></p></legend>
               @foreach ($plats as $plat) 
               <div>
                <label for="categorie_id"></label>
                   <!--  name=unique car une photo ne peut-être que dans une seule catégorie -->
                <input class="@error('categorie_id') form--input--error @enderror" type="checkbox" name="unique" size="30" id="" value="categorie_id">
                @error('categorie_id')
                <div class="form--error-message">
                    {{ $message }}
                </div>
                @enderror
             </div>
             @endforeach
        </div>
    </fieldset>




<!---------------------------------------------------------------->
<!--<body> -->
   <!-- <h1> Menu Rdeau</h1>-->
    <!--<div class="vertical-menu">-->
       
  <!--      <input type="checkbox name="photo_plat_id" id="photo_plat_id_{{-- $photoPlat->id --}}" value="{{-- $photoPlat->id --}}">-->
  <!--     <label for="photo_plat_id_{{-- $photoPlat->id --}}"> </label>-->
   <!--     <img class="form--radio-button-image" src="{{-- asset($photoPlat->chemin) --}}" alt="photo {{-- $photoPlat->id --}}">-->
  <!--          <span>photo {{-- $photoPlat->id --}}</span>-->
 <!--   </div> -->


<!---------------------------------------------------------------->
<!--<body> -->
 <!--   <h1> Menu Rdeau</h1>-->
  <!--  <div class="vertical-menu">-->
  <!--      <a href="" class="active"> HOM </a>-->
  <!--      <a href=""> link 1 </a>-->
  <!--      <a href=""> link 2 </a>-->
  <!--      <a href=""> link 3 </a>-->
 <!--      <a href=""> link 4 </a>-->
 <!--       <a href=""> link 5 </a>-->
  <!--      <a href=""> link 6 </a>-->
 <!--       <a href=""> link 7 </a>-->
 <!--   </div>-->

<!--</body> -->
     <!---------------------------------------------------------------->
        <!--  <div class="form--radio-buttons--scrollable">-->
   <!--         @@foreach ($photoPlats as $photoPlat)-->
   <!--         <div>-->
   <!--             <input type="radio" name="photo_plat_id" id="photo_plat_id_{{-- $photoPlat->id --}}" value="{{-- $photoPlat->id --}}">-->
    <!--            <label for="photo_plat_id_{{-- $photoPlat->id --}}">-->
     <!--               <img class="form--radio-button-image" src="{{-- asset($photoPlat->chemin) --}}" alt="photo {{-- $photoPlat->id --}}">-->
      <!--              <span>photo {{-- $photoPlat->id --}}</span>-->
     <!--           </label>-->
      <!--      </div>-->
      <!--      @@endforeach-->
      <!--  </div> -->
        <br>
            <button class="button-plat-creation" type="submit">Valider</button>
        </div>
    </div>
        <br>
</form>
@endsection