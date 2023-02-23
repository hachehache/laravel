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

        <div>
        <label for="prix">Prix:</label>
        <input  type="numeric" name="prix" id="" placeholder="prix du plat" value="">
        </div>

        <div>
        <label for="description">Description:</label>
        <textarea name="description" id="" cols="30" rows="10" placeholder="description du plat"></textarea>
        </div>
            

            {{-- CHOISIR PHOTO a partir d'un menu déroulant--}}
            <!-- div class="form--checkboxes--scrollable" -->
                <div>
                 <!--   <input type="checkbox" name="photo_plat_id[]" id="photo_plat_id_" value=""> -->
                    <!--label for="etiquette_id_">('admin.etiquette.edit' , ['id' => $etiquette->id])</label> -->
                </div>
        
                 <div>
                    <!--button type="submit">Valider</button>
                </div> 
            -->
    <br>
           Choisir l'image du plat:
           <div>
            <label for="photoplat">chemin:</label>
           <!-- on bloque la taille maxi de l'image à 4mégas = 4194304bits -->
           <!--input type="hidden" name="MAX_FILE_SIZE" value="4194304" id="" accept="/png, /jpeg" src=/public/img/plats -->
            
            <input type="file" name="chemin" value="4194304" id="" accept="/png, /jpeg" src=/public/img/plats>
            <!--input type="file" / -->
           </div>
    <br>
        {{--la liste des catégories via menu déroulant --}}
        {{--select * "multiple" permet davoir plusieurs choixdans le menu--}}
        <select name="categorie_id" id="">
            {{--si on met value="" permet d'afficher "Catégorie du plat"
            dans le menu au repos--}}
            <option value="">Catégorie du plat</option>
           {{-- <option value="1">Entrée</option> --}}
            {{-- <option value="2">Plat</option>--}}
           {{--  <option value="3">Dessert</option> --}}
        
            @foreach ($categories as $categorie)
                <option value="{{ $categorie->id }}">{{ $categorie->nom }}</option>
                 
            @endforeach
        </select>
            <!-------------- AVERIFIER ----------------->
            {{--la liste des IMAGES via menu déroulant --}}
        {{--select * "multiple" permet davoir plusieurs choixdans le menu--}}
        <select name="photo_plat" id="">
            {{--si on met value="" permet d'afficher"
            dans le menu au repos--}}
            <option value="">Liste des images dans la BD:</option>
           {{-- <option value="1">Entrée</option> --}}
            {{-- <option value="2">Plat</option>--}}
           {{--  <option value="3">Dessert</option> --}}
        
            @foreach ($photoPlats as $photoplat)
                <option value="{{ $photoplat->id }}">{{ $photoplat->chemin }}</option>
                 
            @endforeach
        </select>
            <!------------------------------------------->


    

       {{--<div class="form--radio-buttons--scrollable">''}}
            {{--Utilisation bouton radio --}}
            {{-- "photo_plat_id_1" est ABSOLUMENT necessaire 
            pour éviter d'avoir 2 photos pour un plat--}}

          
    <br>
    
        <!-- div class="form--checkboxes--scrollable" -->

            <!-------- ETIQUETTE DISPO ---------->

            <!--  VOIR a récupérer les etiquette automatiqument vi la BD  ---->
            <div>
                <input type="checkbox" name="etiquette_id[]" id="etiquette_id_" value="1">
                <label for="etiquette_id_1">végétarien</label>
            </div>

            <div>
                <input type="checkbox" name="etiquette_id[]" id="etiquette_id_2" value="2">
                <label for="etiquette_id_2">poisson</label>
            </div>

            <div>
                <input type="checkbox" name="etiquette_id[]" id="etiquette_id_2" value="3">
                <label for="etiquette_id_2">boeuf</label>
            </div>

            <div>
                <input type="checkbox" name="etiquette_id[]" id="etiquette_id_2" value="4">
                <label for="etiquette_id_2">poulet</label>
            </div>

            <div>
                <input type="checkbox" name="etiquette_id[]" id="etiquette_id_2" value="5">
                <label for="etiquette_id_2">agneau</label>
            </div>
        <br>    
            <!---------------------------->
         <div>
            <button type="submit">Valider</button>
            <br> 
        </div>
    <br>   
        </form>
    @endsection