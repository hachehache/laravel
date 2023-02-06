@extends('base')

@section('page_title', 'Admin - Création')

@section('content')
<h1>Admin - Plat - Creation</h1>

<form action="{{ route('admin.plat.store') }}" method="post">
    @csrf
        <div>
        <input  type="checkbox" name="epingle" id="plat_epingle">
        <label for="plat_epingle">épinglé</label>
        </div>

        <div>
        <label for="nom">Nom:</label>
         <input type="text" name="nom" id="" placeholder="nom du plat" value="">
        </div>
        <label for="prix">Prix:</label>
        <input  type="numeric" name="prix" id="" placeholder="prix du plat" value="">
         </div>

        <div>
        <label for="description">Description:</label>
        <textarea name="description" id="30" rows="10" placeholder="description du plat"></textarea>
        </div>
            
        

            {{-- CHOISIR PHOTO a partir d'un menu déroulant--}}
            <div class="form--checkboxes--scrollable">
                <div>
                 <!--   <input type="checkbox" name="photo_plat_id[]" id="photo_plat_id_" value=""> -->
                    <!--label for="etiquette_id_">('admin.etiquette.edit' , ['id' => $etiquette->id])</label> -->
                </div>
        
                 <div>
                    <button type="submit">Valider</button>
                </div> 

           Choisir l'image du plat:
            <input type="file" name="nom_img" id="" accept="img/plats/png, img/plats/jpeg" src=img/plats>
            <input type="submit" value="" name="submit"> 
        

        {{--la liste des catégories via menu déroulant --}}
        {{--select * "multiple" permet davoir plusieurs choixdans le menu--}}
        <select name="categorie_id" id="">
            {{--si on met value="" permet d'afficher "Catégorie du plat"
            dans le menu au repos--}}
            <option value="">Catégorie du plat</option>
           {{-- <option value="1">Entrée</option> --}}
            {{-- <option value="2">Plat</option>--}}
           {{--  <option value="3">Dessert</option> --}}

            @foreach ($categories as $categorie )
                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>  
            @endforeach
        </select>
        </div>

       {{--<div class="form--radio-buttons--scrollable">''}}
            {{--Utilisation bouton radio --}}
            {{-- "photo_plat_id_1" est ABSOLUMENT necessaire 
            pour éviter d'avoir 2 photos pour un plat--}}

            {{-- on veut afficher toutes les photos plats--}}
            @foreach ($photoPlats as $photoPlat)
            {{-- photoPlat->id --}}
        <div>
            {{---------------------------------------------------------}}
            {{-- Ceci est remplacé par des variables et un foreach   --}}
            {{-- le 1 ou 2 est remplacé par la variable             -- }}
            {{---------------------------------------------------------}}
            {{-- <input type="radio" name="photo_plat_id_1" id="" value="1">
            {{-- <label for="photo_plat_id_1">
            {{-- <span>photo 1</span>
            {{-- </label> --}}
                        {{-----------------------}}
            {{-- <div>
            {{--<input type="radio" name="photo_plat_id_2" id="" value="2">
            {{--<label for="photo_plat_id_2">
            {{--<span>photo 2</span>
            {{--</label>
            </div> --}}
            {{---------------------------------------------------------}}
            <input type="radio" name="photo_plat_id" id="photo_plat_id_{{ $photoPlat->id }}"
             value="{{ $photoPlat->id }}" >
            <label for="photo_plat_id_{{ $photoPlat->id }}">
                <img src="{{ asset($photoPlat->chemin) }}" alt="photo {{ $photoPlat->id}}">
            <span>photo {{ $photoPlat->id }}</span>
            </label>
        </div>
            @endforeach

    </div>
        <div class="form--checkboxes--scrollable">
            <div>
                <input type="checkbox" name="etiquette_id[]" id="etiquette_id_" value="1">
                <label for="etiquette_id_1">végétarien</label>
            </div>

            <div>
                <input type="checkbox" name="etiquette_id[]" id="etiquette_id_2" value="2">
                <label for="etiquette_id_2">poisson</label>
            </div>

         <div>
            <button type="submit">Valider</button>
        </div>  
        </form>
    @endsection