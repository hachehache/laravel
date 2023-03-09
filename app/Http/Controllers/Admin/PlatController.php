<?php

namespace App\Http\Controllers\Admin;
use stdClass;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Etiquette;
use App\Models\EtiquettePlat;
use App\Models\PhotoPlat;
use App\Models\Plat;
use Illuminate\Http\Request;

//  Le 25 FEv 2023 ajout pour obtenir liste plats photos //
use App\Http\Controllers\Admin;


class PlatController extends Controller


{
    //
    //creation d'une fonction
    //public function index() 
    public function index(Request $request)
    {
         //dump("toto");die;
       //dd($request->all());
        // equivaut à select * from etiquette
        // renvoi la liste des etiquettes
        // récuperer la liste des etiquettes
        $plats = plat::all();
        $photoplats = PhotoPlat::all(); // ajout pour le 27 fev
        $etiquettes = Etiquette::all(); 
        $categories = Categorie::all();
      //$etiquetteplats = EtiquettePlat::all(); 
       
        //récuperer la liste des etiquettes
        //transmission des etiquettes à la vue
        //on est dans la partie Back, on affiche donc toutes les etiquettes

        //dd($request->all());
        return view('admin.plat.index', [
            'plats' => $plats,
            'etiquettes' => $etiquettes,//
            'categories' => $categories,
            'photoplats' => $photoplats,
           //'etiquetteplats' => $etiquetteplats,
          
        ]);
    }

   

    public function create()
    {

        //dd($request->all());
               // le 25 Fev Ajout pour affichage photo plat ???? //
        $categories = Categorie::all();
        $etiquettes = Etiquette::all();
        $photoplats = PhotoPlat::all();
//$etiquetteplats = Etiquette_Plat::all();
//--------------------------------

        $plats = Plat::all();

        $plat = new stdClass;
        $etiquette = new Etiquette(); // ajout a tester pour validation etiquette

        $plat->nom =  '';
        $plat->prix=  '';
        $plat->description=  '';
        $plat->epingle=  '';
        $plat->photo_plat_id=  '';
        $plat->categorie_id=  '';
     //   $plat->etiquette_id='';//
     $etiquette->etiquette_id=  '';

           // transmission des valeurs par défaut à la vue
        return view('admin.plat.create',[
      //  'categories' => $categories,
      //  'etiquettes' => $etiquettes,
        'plats' => $plats,
        'categories' => $categories,
        'etiquettes' => $etiquettes,
        'photoplats' => $photoplats,
//'etiquette_plat' => $etiquette_plats,
        ]);
    }

    public function store(Request $request)
    {

         //dump("toto");die;
        //dd($request->all());

        /*verif avant d'enregistrer les info utilisateurs */
        $validated = $request->validate([
           'nom' => 'required|min:2|max:100',
           'prix'=>'',
           'description' => 'required|min:2|max:100',
           'epingle' => 'boolean', // 0=pas épingle, 1=épingle
           'photo_plat_id'=>'',
            'etiquette_id'=>'',
            'categorie_id'=>'',

       ]);
         /* Création d'un plat */
           /* liaison dans la definition des champs avec edit.blade.php*/
           /*$plat = new Plat(); */
            $plat = new Plat();           // a garder
            $etiquette = new Etiquette();// a garder
            $etiquette_plat = new EtiquettePlat();

           $plat->nom = $request->get('nom');
           $plat->prix = $request->get('prix');
           $plat->description = $request->get('description');
          $plat->epingle = ($request->get('epingle') == 'ON' ? true : false); //0 ou 1  //
           $plat->photo_plat_id = $request->get('photo_plat_id');
           $plat->categorie_id = $request->get('categorie_id');
          
          
//$etiquette_plat->etiquette_id= $request->get('etiquette_id');//
//$etiquette_plat->plat_id= $request->get('plat_id');//
            
           $plat->save();
          
           $etiquette_plat->etiquette_id=$request->get('etiquette_id');
           $etiquette_plat->plat_id=$plat->id;
          
           $etiquette_plat->save();


           /* pour ajouter message flash de confirmation à garder dans la function request*/
           $request->session()->flash('confirmation', 'La création a bien été enregistré');
           
          
          
           /* on redirige l'utilisateur vers  la page liste */
           return redirect()->route('admin.plat.index');
       }
       // affiche un formulaire de modification
    // $id est le paramètre de plat 
    public function edit(int $id)
    {   
         //dump("toto");die;
        //dd($request->all());
        // recup de l'etiquette
       // recup de l'etiquette
       $plat = Plat::find($id);
       $etiquette = Etiquette::find($id);
       $photoplat = PhotoPlat::find($id);
    // affichage d'une erreur 404 si plat est introuvable
    // !$etiquette veut dire :si pas plat  alors ... 
    //(voir booleen vrai ou faux)
    // on peut aussi message un message parlant au lieu de abort(404)
    if (!$plat) {
        abort(404);
    }

        // transmission  du plat à la vue
        return view('admin.plat.edit', [
            'plat'=> $plat,
            'etiquette'=> $etiquette,
            'photoplat'=>$photoplat,
        ]);
    }

    // met à jour les données déja existante dans la base de donnée
    // les données du formulaire sont dans $request sui est le nom de la classe
    // objet de type $request qu'on pourrait appeler $toto
    public function update(Request $request, int $id)
    {
		
        //dd($request->all());
        $plats = Plat::all();
            //$etiquette_plats = Etiquette_Plat::all();
        $photoplats = PhotoPlat::all(); 
        $etiquettes = Etiquette::all();


        /*verif avant d'enregistrer les info utilisateurs */
    $validated = $request->validate([
        /* nombre mini et max de caracteres, 
        voir migration creat*etiquette_table pour le max de caracteres*/
        'nom' => 'required|min:2|max:100',
        'prix'=>'',
        'description' => 'required|min:2|max:100',
        'epingle' => 'required|boolean', // 0 pas épingle, 1=épingle
        'photo_plat_id'=>'',
        'categorie_id'=>'',
       'etiquette_id'=>'',
       
		
    ]);

    /* Recuperation de plat'*/
    /* liaison dans la definition des champs avec edit.blade.php*/
   //$etiquette_plat = Etiquette_Plat::find($id);
   $plat = Plat::find($id);
   $photoplat = PhotoPlat::find($id);
   $etiquette = Etiquette::find($id);

    // affichage d'une erreur 404 si la réservation est introuvable
    if (!$plat) {
        abort(404);
    }
    // Ajout si l'Ã©tiquette n'existe pas
    if (!$etiquette) {
        abort(404);
    }

    /* sur le plat on recupère */
    $plat->nom = $request->get('nom');
    $plat->prix = $request->get('prix');
    $plat->description = $request->get('description');
   $plat->epingle = $request->get('booleen'); //0 ou 1
  
    $plat->photo_Plat_id = $request->get('photo_plat_id');
    $plat->categorie_id = $request->get('categorie_id');
    $etiquette->etiquette_id= $request->get('etiquette_id');//
    

    $plat->save();
    /* pour ajouter message flash de confirmation à garder dans la function request*/
    $request->session()->flash('confirmation', 'Vos modifications ont bien été enregistrées');

    /* on redirige l'utilisateur vers la page plat */
    return redirect()->route('admin.plat.edit', ['id' => $plat->id]);
    }

    public function delete(Request $request, int $id)
    {
      //  dd($request->all());

    $plat = Plat::find($id);
    $etiquette_plat =EtiquettePlat::find($id);

    if (!$plat) {
    abort (404);
}

        //$etiquette_plat->$id->delete(); // a tester suppression de plat_id
    
        //$plat->delete();  // a garder
    $request->session()->flash('confirmation' , 'La suppression a bien été enregistrée.');
 

    return redirect()->route('admin.plat.index');
    }
       

    
      // dd($request->all());
    }
