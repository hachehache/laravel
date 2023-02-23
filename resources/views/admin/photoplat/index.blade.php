@extends('base')

@section('page_title', 'Admin - photoplat - Liste')

@section('content')

<h1>Admin - Photoplat - Liste</h1>
<!-- BALISE DE SEPARATION -->
<div class="separation"></div>

<!-- si on trouve confirmation, on passe dans cette partie
lors d'une modification d'une photoplat, on aura un message au dessus,
qui signalera que les modifs ont bien été enregitrées-->
@if (Session::has('confirmation'))
<div>
{{Session::get('confirmation')}}
</div>
@endif
<br>

<div>
    <!-- pour ajouter nouvelle photoplat -->
    <a href="{{ route('admin.photoplat.create')}}"  style="color: green;">Ajouter</a>
</div>


<!---------- A FINALISER- Bouton de TRI ----->
<br>
<div id="tri1" style="display:none;">
    <input type="radio" name="tri" value="Asc" id="tri1" onclick="verif_button();"/><label>Ordre Croissant</label>
</div>
<br>
<div id="tri2" style="display:none;">
    <input type="radio" name="tri" value="Desc" id="tri2" onclick="verif_button();"/><label>Ordre Décroissant</label>
</div>
<!-----Boucle sur Categorie pour obtenir le le nom de la categorie-------------------------->
<!------et ainsi remplir la liste  photoplat avec le nom de la categorie, plutot que 0, 1, 2,3, ....------------------------->

<!--<label for="">{{-- $categorie->nom --}}</label> -->

<!------------------------------->
    <table>
        <table width="100%" CELLSPACING="1" CELLPADDING="5"  border="2">   <tr>
            <thead bgcolor="silver">

            <!--  th*7  on aura 7 balises -->
            <!-- pour modifier une photoplat -->
            <tr>      
            <th colspan='1'>ID</th>
            <th colspan='1'>Description</th>
            <th colspan='1'>Chemin</th>
            <th colspan='1'>Categorie ID</th>
            <!-- <th colspan='1'>Nom CatÃ©gorie</th> -->
            
            
             <!-- pour modifier une plat -->
            <th colspan='1'>Actions</th>
            </tr>
        </thead>
    <!--  on est dans le back coté Admin -->
    {{--dump ($etiquette)--}}
    @foreach ($photoplats as $photoplat) 

      <!--  @@foreach ($categories as $categorie) --><!----BLOCAGE --->
        
    {{-- dump ($etiquettes) --}}
    <tr>
        <!---- AUCUN NOM OU DESCRIPTION DEFINI SUR PhotoPlat -->
        <!-- ON AFFICHE LE ID -->
       <!-- <td>{{-- $photoplat->nom --}}</td> -->
        <td>{{ $photoplat->id }}</td>
        <td>{{ $photoplat->description }}</td>
        <td>{{ $photoplat->chemin }}</td> 
        <!-- affiche bien la valeur categorie_id presente dans la table photo-plat -->
      <!--  <td>{{--$photoplat->categorie_id --}}</td> -->
       <!-- <td>{{-- $categorie->nom --}}</td> -->
  <td> ?voir foreach categorie à partir index.blade de Photoplat index</td> 
        <!-- {{-- $categorie->nom --}} / id: {{-- $categorie->id--}} -->
        <!--@@endforeach -->  <!----BLOCAGE --->
        

         <!-- DEBUT- garder cd td sinon "modifier" et "supprimer passe au dessus" -->
       <!-- <td>{{-- $photoplat->$categorie()-> $request->get('nom') --}}</td> -->
  <td> <!-- garder ce td  sinon "modifier" et "supprimer passe au dessus" -->
      
        <!-- Ajout -->
      <!-- <td>{{-- $photoplat->$categorie_id --}}</td> -->
        
            <a href="{{ route('admin.photoplat.edit' , ['id' => $photoplat->id]) }}" style="color: green;">modifier</a>
        
                    {{--------------------------------------}}
                    {{-- a choisir bouton sup ou lien sup --}}
                    {{--------------------------------------}}

            <!-- formulaire de suppression avec un button -->
            <!--
            <form action="{{-- route('admin.etiquette.delete' , ['id' => $etiquette->id]) --}}" method="post" 
            onsubmit="return window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?');">
            @@csrf
            @@method('DELETE') 
            <button type="submit">supprimer</button>
            </form> 
            -->
        
          
            {{-- formulaire de suppression avec un lien --}}
            <br> {{--Conserver le <br>  pour que modif/suppr ne soit pas sur la même 1er ligne--}}

            <form action="{{ route('admin.photoplat.delete' , ['id' => $photoplat->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <a href="{{ route('admin.photoplat.delete' , ['id' => $photoplat->id]) }}"
                    onclick="event.preventDefault(); if (window.confirm('Etes-vous sûr de vouloir supprimer cet élément ?')) 
                    { this.closest('form').submit();}" style="color: red;">supprimer</a>"
            </div>
            </form>
        </td> <!-- FIN-->
    </tr> 
    @endforeach
   
    </table>
@endsection
