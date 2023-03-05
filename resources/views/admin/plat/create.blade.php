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
           <input class="@error('epingle') form--input--error @enderror" type="checkbox" name="epingle" id="" value="0" onclick="if (this.checked) this.value=1; else this.value=0;" name="epingle" />



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
            <label for="nom" style="padding-right: 70px"; >Nom : </label>
            <input class="@error('nom') form--input--error @enderror" type="text" name="nom" size="" id="" placeholder="nom du plat" value="">
            @error('nom')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
        </div>
    
       <div class="plat-creation">
            <label for="prix" style="padding-right: 75px";>Prix : </label>
            <input class="@error('nom') form--input--error @enderror" type="text" name="prix" size="" id="" placeholder="prix du plat" value=""  >
            @error('prix')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
        </div>


        <div class="plat-creation">
            <label for="description" style="padding-right: 30px";>Description : </label>
            <input class="@error('description') form--input--error @enderror" type="text" name="description" size="" id="" cols="30" rows="" placeholder="description du plat" value=""></textarea>
            @error('description')
            <div class="form--error-message">
                {{ $message }}
            </div>
            @enderror
        </div>
    </fieldset>
    <br>
    
<!-------------------create_blade--------------AJOUT ----------photo_plat_id----------->
 
<div class="form--radio-buttons--scrollable">
    <legend class=""><p><strong>Liste Photos</strong></p></legend>
    @foreach ($photoplats as $photoplat)
    <div>
    <input type="radio" name="photo_plat_id" id="photo_plat_id_{{ $photoplat->id }}" value="{{ $photoplat->id }}">
    <label for="photo_plat_id_{{ $photoplat->id }}">
        <img class="form--radio-button-image" src="{{ asset($photoplat->chemin) }}" alt="photo {{ $photoplat->id }}" width="100px">
       
        <span>photo {{ $photoplat->id }}</span>
     <!--   <span>photo {{-- $photoplat->id --}}</span>-->
    </label>
</div>
    @endforeach
</div>

<br>

<!------------------------------------AJOUT ----------Liste Etiquettes----------->
<div class="form--checkboxes--scrollable">
    <legend class="plat-menu-categorie"><p><strong>Liste Etiquettes</strong></p></legend>
    @foreach ($etiquettes as $etiquette)
    <div>
    <!-- type=checkbox pour plusieurs choix Ã  cocher  -->
        <input type="checkbox" name="etiquette_id" id="etiquette_id_{{ $etiquette->id }}" value="{{ $etiquette->id }}">
        <label for="etiquette_id">
            <span>{{ $etiquette->nom }}</span>
        </label>
    </div>
       
    @endforeach
</div>

<!----------------------------------------------------------------------------->
<br>

 
<!------------------------------------AJOUT ----------Liste Categories----------->
<div class="form--radio-buttons--scrollable">
    <legend class="plat-menu-categorie"><p><strong>Liste Catégories</strong></p></legend>
    @foreach ($categories as $categorie)
    <div>
         <!-- type=radio pour un choix unique Ã  cocher  -->
        <input type="radio" name="categorie_id" id="categorie_id_{{ $categorie->id }}" value="{{ $categorie->id }}">
        <label for="categorie_id_{{ $categorie->id }}">
            <span>{{ $categorie->nom }}</span>
        </label>
    </div>
       
    @endforeach
</div>
<!----------------------------------------------------------------------------->


        <br>
            <button class="button-plat-creation" type="submit">Valider</button>
        </div>
    </div>
        <br>
</form>
@endsection