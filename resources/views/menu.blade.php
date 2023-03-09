@extends('base')

@section('page_title', 'Menu')

@section('content')

    <h1>Menu Côté CLIENT -Listage par catégorie et ordre de prix</h1>
{{--                           
                     <!----- Retour Accueil ---->
                        <div class="retour_Accueil">
                            <a href="{{ route('home') }}">Retour Accueil</a>
                        </div> 
                    <!-----------------------------> --}}
        @csrf
<!---------------------------------------------------------------->

            @foreach ($categories as $categorie)
           <h1 class="categorie_nom_user"> {{ $categorie->nom }} </h1>

                    @foreach ($categorie->platsSortedByPrix as $plat)         
                                                     
<table class="tableau_plat" width="80%" border="1" cellspacing="5" cellpadding="6" align="center">
    <thead bgcolor="#FCD116">
        <tr><th colspan='2'>Nom Catégorie</th>	<th colspan='4'>Description Catégorie</th>	<th colspan='4'> Nom du Plat</th> <th colspan='3'> Prix</th> <th colspan='2'> Description du Plat</th><th colspan='2'> Epingle</th></tr>
    </thead>
            <tr><th colspan='2'>{{ $categorie->nom }}</th>	<th colspan='4'>{{ $categorie->description }}</th>	<th colspan='4'> {{ $plat->nom }}</th> <th colspan='3'> {{ $plat->prix }} eur</th>  <th colspan='2'>{{ $plat->description }}</th>  <th colspan='2'>{{ $plat->epingle }}</th></tr>
                
                        <img class="alignplat" src="{{ asset($plat->photo->chemin) }}" alt="" width="200px" align="center">

                <!-------- tableau etiquette- à part car plusieurs etiquettes possible ---------->
                        <table class="tableau_etiquette" width="15%" border="1" cellspacing="1" cellpadding="1" align="center">
                            <thead bgcolor="#FCD116">
                                <tr><th colspan='1'> Etiquette</th></tr>
                            </thead>
                 <!-------------Début TABLEAU ET IQUETTE---------------------------------------------------------------->    
                        @foreach ($plat->etiquettes as $etiquette)
        
                                    <tr><th colspan='1'>{{ $etiquette->nom }}</th></tr>
                                <!--------------------------------------------->
                        @endforeach
                     <!-- Fin  tableau des étiquettes -->
                    </table>  

                    <!-- BALISE DE SEPARATION entre plat-->
                    <!-- <hr> est un element de rupture thématique -->
                    <hr> 
                        @endforeach
            @endforeach
            <!-- Fin  tableau des plats -->
    </table>
@endsection
