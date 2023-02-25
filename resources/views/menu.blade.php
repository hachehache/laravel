@extends('base')

@section('page_title', 'Menu')

@section('content')
    <h1>Menu Côté CLIENT -LISTAGE</h1>


    <table>
        <table width="100%" CELLSPACING="1" CELLPADDING="5"  border="2">   <tr>
            <thead bgcolor="silver">
<!------------- PAS DE TABLEAU NECESSAIRE- PLUTOT UNE LISTE--------------------->
                <!--  th*7  on aura 7 balises -->
                <!-- pour modifier une etiquette -->
                <tr>      
                    <th colspan='1'>Nom de la Catégorie</th>
                    <th colspan='1'>Description Catégorie</th>

                <th colspan='1'>Nom du plat</th>
                    
                  <!--  <th colspan='1'>Chemin Photo</th> -->
                    <th colspan='1'>Prix</th>
                    <th colspan='1'>Description Plat</th>
                    <th colspan='1'>Nom de l'Etiquette</th>
                   
                </tr>
            </thead>
<!---------------------------------------------------------------->

            @foreach ($categories as $categorie)
                <h2>{{ $categorie->nom }}</h2>
                <p>{{ $categorie->description }}</p>
               
                <ul>
                    @foreach ($categorie->platsSortedByPrix as $plat)
                  
                    <li>
                        <!-- le 25 Fev photo trop grande à l'affichage-->
                       <img class="menu--photo-plat" src="{{ asset($plat->photo->chemin) }}" alt="">
                        {{ $plat->nom }} {{ $plat->prix }} eur<br>
                        {{ $plat->description }}<br>
                        {{ $plat->epingle }}<br>
                        @foreach ($plat->etiquettes as $etiquette)
                        #{{ $etiquette->nom }}
                       
                        <p> ========NOM DE LA CATEGORIE : {{ $categorie->nom }} ================================= </p>
                        <p>  <img class="menu--photo-plat" src="{{ asset($plat->photo->chemin) }}"></p>
                        
                         <p> DESCRIPTION CATEGORIE : {{$categorie->description  }}</p>
                        <p> CHEMIN PHOTO : {{$plat->photo->chemin }}</p>
                        <p> PRIX DU PLAT : : {{$plat->prix  }}</p>
                        <p> NOM DU PLAT: : {{$plat->nom  }}
                        <p> DESCRIPTION DU PLAT : {{$plat->description  }}</p>
                        <p> EPINGLE DU PLAT ( 0=Non/1=Oui ) : {{$plat->epingle  }}</p>
                        <p> NOM ETIQUETTE : {{$etiquette->nom}}</p>
                        
                    @endforeach
                    <p> =========================================  </p> 
                    </li>
                    @endforeach
                    
                    
                </ul>     
                <br>
            @endforeach
            
    </table>
@endsection
