@extends('base')

@section('page_title', 'Menu')

@section('content')
    <h1>Menu Côté CLIENT -LISTAGE</h1>
    

    <!--
<section class="menu" id="menu">
    <div class="titre">
        <h2 class="titre-texte"><span>M</span> enu</h2> -->

<!--  ---- CAROUSSEL -->

 <!-- 
    <div id="caroussel">
        <div class="image">
          <h3></h3>
            <img src="img/plats/martin-widenka-tkfRSPt-jdk-unsplash.jpg" width="200px">

            <h3> PLAT</h3>
            <img src="img/plats/martin-widenka-tkfRSPt-jdk-unsplash.jpg" width="200px">
            
            <h3> DESSERT</h3>
            <img src="img/plats/martin-widenka-tkfRSPt-jdk-unsplash.jpg" width="200px">


        </div>
    </div> -->


<!--

        <p> gtdfa!j!jd klfmERKfmkerkgmlkemrlkgKmlzgk flùlfùlr
        </p>
    </div>  -->
  <!--  
    <div class="contenu">
        <div class="box">
                <div class="imbox">
                    <img class="alignPlat" src="img/plats/martin-widenka-tkfRSPt-jdk-unsplash.jpg" alt="" width="250px">
                </div>
                    <div class="text">
                        <h3> Special Salade</h3>
                     </div>
        </div>
    </div>

  
        <div class="box">
                <div class="imbox">
                    <img class="alignPlat"src="img/plats/martin-widenka-tkfRSPt-jdk-unsplash.jpg" alt="" width="250px">
                </div>
                    <div class="text">
                        <h3> Special Salade</h3>
                     </div>
        </div>
  

        <div class="box">
                <div class="imbox">
                    <img class="alignPLat" src="img/plats/martin-widenka-tkfRSPt-jdk-unsplash.jpg" alt="" width="200px">
                </div>
                    <div class="text">
                        <h3> Special Salade</h3>
                     </div>
        </div>
  


        <div class="box">
                <div class="imbox">
                    <img src="img/plats/martin-widenka-tkfRSPt-jdk-unsplash.jpg" alt="" width="250px">
                </div>
                    <div class="text">
                        <h3> Special Salade</h3>
                     </div>
        </div>
   

    
        <div class="box">
                <div class="imbox">
                    <img src="img/plats/martin-widenka-tkfRSPt-jdk-unsplash.jpg" alt="" width="250px">
                </div>
                    <div class="text">
                        <h3> Special Salade</h3>
                     </div>
        </div>
 

        <div class="box">
                <div class="imbox">
                    <img src="img/plats/martin-widenka-tkfRSPt-jdk-unsplash.jpg" alt="" width="250px">
                </div>
                    <div class="text">
                        <h3> Special Salade</h3>
                     </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br> -->

<!-- Creation bouton "voir plus" -->
  <!--<div class= "titre">
    <a href="" class="btn1"> Voir Plus</a>

</div>
</div>

</section> -->

<!-------------DEBUT MENU EXPERT -------------------------->
<!--
<section class="expert" id="expert">
    <div class="titre">
        <h2 class="titre-texte">Nos<span></span>xpert </h2> -->
<!--
        <p> gtdfa!j!jd klfmERKfmkerkgmlkemrlkgKmlzgk flùlfùlr
          
        </p>
    </div>
    
    <div class="contenu">
        <div class="box">
                <div class="imbox">
                    <img src="img/plats/martin-widenka-tkfRSPt-jdk-unsplash.jpg" alt="" width="200px">
                </div>
            <div class="text">
                        <h3> Franky le cuisto</h3>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="imbox">
            <img src="img/plats/martin-widenka-tkfRSPt-jdk-unsplash.jpg" alt="" width="200px">
        </div>
                <div class="text">
                    <h3> Janette </h3>
                </div>
    </div>
</div>

-->
    
<!-------------FIN MENU EXPERT -------------------------->




<!--
    <table>
        <table width="100%" CELLSPACING="1" CELLPADDING="5"  border="2">   <tr>
            <thead bgcolor="silver"> -->
<!------------- PAS DE TABLEAU NECESSAIRE- PLUTOT UNE LISTE--------------------->
                <!--  th*7  on aura 7 balises -->
                <!-- pour modifier une etiquette -->
         <!--       <tr>      
                    <th colspan='1'>Nom de la Catégorie</th>
                    <th colspan='1'>Description Catégorie</th>

                <th colspan='1'>Nom du plat</th> -->
                    
                  <!--  <th colspan='1'>Chemin Photo</th> -->
             <!--       <th colspan='1'>Prix</th>
                    <th colspan='1'>Description Plat</th>
                    <th colspan='1'>Nom de l'Etiquette</th>
                   
                </tr>
            </thead>   -->
<!---------------------------------------------------------------->

            @foreach ($categories as $categorie)
           <h1> {{ $categorie->nom }}</h1>
            {{--$categorie->description --}}
               
                <ul>
                    @foreach ($categorie->platsSortedByPrix as $plat)
                  
                                                     
<table class="tableau_plat" width="80%" border="1" cellspacing="6" cellpadding="6" align="center">
    <thead bgcolor="silver">
        <tr><th colspan='2'>NomCateg</th>	<th colspan='2'>DescriptCateg</th>	<th colspan='2'> NomPlat</th> <th colspan='2'> Prix</th> <th colspan='2'> DescripPlat</th><th colspan='2'> Epingle</th></tr>
    </thead>
            <tr><th colspan='2'>{{ $categorie->nom }}</th>	<th colspan='2'>{{ $categorie->description }}</th>	<th colspan='2'> {{ $plat->nom }}</th> <th colspan='2'> {{ $plat->prix }} eur</th>  <th colspan='2'>{{ $plat->description }}</th>  <th colspan='2'>{{ $plat->epingle }}</th></tr>
                   
                        <!-- le 25 Fev photo trop grande à l'affichage mettre width="200px"-->
                        <img class="alignplat" src="{{ asset($plat->photo->chemin) }}" alt="" width="200px" align="center"><br />
 
                        <!-------------------------------------->
                     <!--   <p class="clear"></p>
                        <p class="nom_plat"> <h4> Nom du plat : </h4>{{-- $plat->nom --}}</p> <p class="prix"> <h4> Prix : </h4></p>{{-- $plat->prix --}} eur<br>
                        <p class="clear"></p>
                        <p class="description_plat"> <h4> Description du plat :</h4> </p>{{-- $plat->description --}}<br> -->
                      <!--     <p class="clear"></p> -->
                        <!--  <p class="epingle"><h4> Epingle du plat ( 0=Non/1=Oui ) :</h4></p> {{-- $plat->epingle --}}<br> -->
                        
                <!-------- tableau etiquette- à part car plusieurs etiquettes possible ---------->
                        <table class="tableau_etiquette" width="15%" border="1" cellspacing="1" cellpadding="1" align="center">
                            <thead bgcolor="silver">
                                <tr><th colspan='1'> Etiquette</th></tr>
                            </thead>
                 <!----------------------------------------------------------------------------->    
                @foreach ($plat->etiquettes as $etiquette)
                              <!--  <p class="etiquette"> <h4> Nom Etiquette :</h4> </p>{{-- $etiquette->nom--}} -->
                        <!-------- tableau etiquette---------->    
                                
                           
                            <tr><th colspan='1'>{{ $etiquette->nom }}</th></tr>
                        <!--------------------------------------------->
                         <!-- {{-- $categorie->nom --}}  -->
                        <!--<p><img class="menu--photo-plat" src="{{-- asset($plat->photo->chemin) --}}"></p> -->
                       <!-- {{--$categorie->description --}}-->
                      <!--  <p class="chemin_photo"><h4> chemin photo : {{--$plat->photo->chemin --}}</h4></p> -->
                                                              <!--      {{--$plat->prix --}}
                                                                     {{--$plat->nom --}}
                                                                    {{--$plat->description --}}
                                                                    {{--$plat->epingle --}}
                                                                    {{--$etiquette->nom--}} -->
                        
                       <!-- <div id="caroussel">
                            <div class="image">
                                <h3> {{-- $categorie->nom --}}</h3>
                                <img class="menu--photo-plat" src="{{-- asset($plat->photo->chemin)--}}"></p>
                                
                            </div>
                        </div> -->

                @endforeach
                     <!-- Fin  tableau des étiquettes -->
                    <tr><td>              
                    </table>    
                        @endforeach
   
                    <p> =============================================================================================================================  </p> 
                </ul>     
           
            @endforeach
            <!-- Fin  tableau des plats -->
        </td><tr>   
    </table>


@endsection
