@extends('base')

@section('page_title', 'Menu')

@section('content')
    <h1>Menu Côté CLIENT -LISTAGE</h1>
    
<!---------------------------------------------------------------->

            @foreach ($categories as $categorie)
           <h1 class="categorie_nom"> {{ $categorie->nom }} </h1>
          
               
             
                    @foreach ($categorie->platsSortedByPrix as $plat)
                  
                                                     
<table class="tableau_plat" width="80%" border="1" cellspacing="5" cellpadding="6" align="center">
    <thead bgcolor="#FCD116">
        <tr><th colspan='2'>NomCateg</th>	<th colspan='4'>DescriptCateg</th>	<th colspan='4'> NomPlat</th> <th colspan='3'> Prix</th> <th colspan='2'> DescripPlat</th><th colspan='2'> Epingle</th></tr>
    </thead>
            <tr><th colspan='2'>{{ $categorie->nom }}</th>	<th colspan='4'>{{ $categorie->description }}</th>	<th colspan='4'> {{ $plat->nom }}</th> <th colspan='3'> {{ $plat->prix }} eur</th>  <th colspan='2'>{{ $plat->description }}</th>  <th colspan='2'>{{ $plat->epingle }}</th></tr>
                   
                        <!-- le 25 Fev photo trop grande à l'affichage mettre width="200px"-->
                        <img class="alignplat" src="{{ asset($plat->photo->chemin) }}" alt="" width="200px" align="center"><br />
                        
                <!-------- tableau etiquette- à part car plusieurs etiquettes possible ---------->
                        <table class="tableau_etiquette" width="15%" border="1" cellspacing="1" cellpadding="1" align="center">
                            <thead bgcolor="#FCD116">
                                <tr><th colspan='1'> Etiquette</th></tr>
                            </thead>
                 <!----------------------------------------------------------------------------->    
                @foreach ($plat->etiquettes as $etiquette)

                        <!-------- tableau etiquette---------->    
                            <tr><th colspan='1'>{{ $etiquette->nom }}</th></tr>
                        <!--------------------------------------------->
                @endforeach
                     <!-- Fin  tableau des étiquettes -->
                    <tr><td>              
                    </table>    
                        @endforeach
   
                    <p> ==================================================================================================================================  </p> 
            @endforeach
            <!-- Fin  tableau des plats -->
        </td><tr>   
    </table>


@endsection
