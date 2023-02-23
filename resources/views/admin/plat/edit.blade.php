@extends('base')

@section('page_title', 'Admin - PLat - Modification')

@section('content')


            <h1>Admin - PLat - Modification</h1>
<!-- BALISE DE SEPARATION -->
<div class="separation"></div>

<!-- si on trouve confirmation, on passe dans cette partie
lors d'une modification d'une etiquette, on aura un message au dessus,
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
    <form action="{{route('admin.plat.update',['id' => $plat ->id]) }}" method="post">
            <!--csrf permet de securiser, empeche piratage -->
        @csrf
        <!--permet a laravel de reconnaitre si la method n'est pas GET ou POST -->
        <!-- PUT maj complète et PATCH maj partielle -->
        <!-- @@method('PUT') -->
        <br>
            <div>

                <fieldset class="plat-modif-nom">
                    <br>
                        <div class="plat-modif">
                <label for="description">Nom:</label>
            <!-- si erreur on ajoute cette class --> <!--old permet de recuperer les valeurs presente dans la base -->
                <input class="@error('nom') form--input--error @enderror" type="text" name="nom" id="" value="{{ old('nom', $plat->nom) }}" readonly>
                @error('nom')
                    <div class="form--error-message">
                        {{ $message }}
                    </div>
                @enderror
            </div>
                <br>

                <div class="plat-modif">
                    <!--  pour avoir le epingle en possible modif -->
                 
                        <input type="checkbox" name="epingle" id="plat_epingle" value="" >
                        <label for="plat_epingle">épinglé</label>
                </div>

                <div class="plat-modif"><div>
                <!--  pour avoir le libellé Description, devant le champs description -->
                <label for="description">Description:</label>
                <input class="@error('description') form--input--error @enderror" type="text" name="description" id="" value="{{ old('description', $plat->description) }}">
                @error('description')
                    <div class="form--error-message">
                        {{ $message }}
                    </div>
                 @enderror 
            </div>
            <div class="plat-modif">
                <!-- Modification du prix -->
                <label for="prix">Prix:</label>
                <input class="@error('prix') form--input--error @enderror" type="" name="prix" id="" value="{{ old('prix', $plat->prix) }}">
                @error('prix')
                    <div class="form--error-message">
                        {{ $message }}
                    </div>
                 @enderror 


            <!--  on affiche N° categorie du PLAT -->
                 <div class="plat-modif">
                 <label for="categorie_id">Categorie: </label>
                 <input class="@error('categorie_id') form--input--error @enderror" type="" name="unique" size="30" id="" value="{{ old('categorie_id', $plat->categorie_id) }}">
                 @error('categorie_id')
                     <div class="form--error-message">
                         {{ $message }}
                     </div>
                  @enderror 
             </div>


            <!--  on affiche N° Etiquette du PLAT -->
            <div class="plat-modif">  
                <label for="etiquette_id">Etiquette: </label>
                <input class="@error('etiquette_id') form--input--error @enderror" type="" name="" size="30" id="" value="{{ old('etiquette_id->$plat_id') }}">
                @error('etiquette_id')
                    <div class="form--error-message">
                        {{ $message }}
                    </div>
                 @enderror 
            </div>

<!--  affichage de la liste des categories -->

<!-- ------------------------------------- -->
            </div>
        </fieldset>
        <br>

        <div class="plat-modif">
       
                <button type="submit">Valider</button>
            </div>
        <br>
        </form>

@endsection