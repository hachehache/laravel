@extends('base')

@section('page_title', 'Actus')

@section('content')
    <h1>Page des actualités</h1>
    
    <table  width="20%" border="5" cellspacing="1" cellpadding="1" align="center">
      <tr><td>
          <p class="alignRight">
                  <h3>Jour de publication :</h3>
                      {{ $jour_publication }}
                  
                  <h3>Heure de publication:</h3>
                      {{$heure_publication }}

                      <h3>Texte:</h3>
                      {{$texte }}
          </p>   
      </td><tr>
  </table>  
  <br>
<div class="actus">
   

    <img class="alignLeft_actus" src="img/actus/pexels-pixabay-39896.jpg" alt="" width="300px">
                       
    <h2> Titre 1</h2>
                             
           <table width="60%" border="1" cellspacing="1" cellpadding="1" align="center">
                 <tr><td>
                         <p class="alignRight_actus">
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                           sed do eiusmodtempor adipiscingadipiscing
                       </p>       
                 </td><tr>
           </table>     


 <!-- Clear: nettoie le float Left et Right -->
              <!-- Clear: pour avoir les images alignées sur la hauteur et texte à coté -->
              <p class="clear_left"></p>

           <img class="alignLeft_actus" src="img/actus/pexels-andrea-piacquadio-787961.jpg" alt="" width="300px">
                       
           <h2> Titre  2</h2>
                                    
                  <table width="60%" border="1" cellspacing="1" cellpadding="1" align="center">
                        <tr><td>
                                <p class="alignRight_actus">
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                              </p>       
                        </td><tr>
                  </table>     
                  <p class="clear_right"></p>
                
                  <p class="clear_left"></p>
           <img class="alignLeft_actus" src="img/actus/pexels-pavel-danilyuk-8438918.jpg" alt="" width="300px">
                       
           <h2> Titre  3</h2>
                                    
                  <table width="60%" border="1" cellspacing="1" cellpadding="1" align="center">
                        <tr><td>
                                <p class="alignRight_actus">
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                  sed do eiusmodtempor adipiscingadipiscing
                                 
                                 
                              </p>       
                        </td><tr>
                  </table>     
                  <p class="clear_left"></p>
        </div>  

@endsection