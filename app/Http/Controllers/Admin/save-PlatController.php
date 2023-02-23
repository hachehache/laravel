<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\PhotoPlat;
use App\Models\Plat;  // <== necessaire ????
use App\Models\Etiquette;
use App\Http\Controllers\Admin;
use Illuminate\Http\Request;

Class PlatController extends Controller

{
                            //----------------------------//
                            // -- FONCTION INDEX ---------//
                            //----------------------------//
    //creation d'une fonction
    public function index()
    {
        // equivaut à select * from plat
        // renvoi la liste des plats
        // récuperer la liste des plats
        $plats = Plat::all();

        //récuperer la liste des plats
        //transmission des plats à la vue
        //on est dans la partie Back, on affiche donc toutes les plats
        return view('admin.plat.index', [
            'plats' => $plats,
        ]);
    }


                            //----------------------------//
                            // -- FONCTION CREATE ---------//
                            //----------------------------//
   // cette methode affiche un formulaire de création Plat //
    public function create()
    {   
$categories = Categorie::all();
$etiquettes = Etiquette::all();
$photoplats = PhotoPlat::all();

$plats = Plat::all();  //  ??
//valeur par default afficher avant modif par le restaurateur
        // ne pas appeler de save
$plat = new stdClass;
// PLatController function create //
        $plat->nom = '';
        $plat->prix = '';
        $plat->description = '';
        $plat->epingle = '';
        $plat->photoplat = '';
        $plat->categorie='';
        $plat->etiquette='';
    
        $plat->photoplat = '';  

        // transmission des valeurs par défaut à la vue
    return view('admin.plat.create',[
       'categories' => $categories,  //  ??
       'etiquettes' => $etiquettes,
       'photoplats' => $photoplats,
]);
//dd($request->all());//

    }

                            //----------------------------//
                            // -- FONCTION STORE ---------//
                            //----------------------------//
//cette methode enregistre les données d'un nouveau plat dans la base de données
    //public function store(Request $request)//
    public function store(Request $request)
    {   
       //dd($request->all());  //  //<==== A DEVALIDER
    
//--------------------- Ajout IMAGE PLAT ---------------------------------------//
         //path des images sources
      //   $destinationPath = storage_path('app/public/img');//
         
    /*montre-moi le champ nom*/
    //dd($request->has());
   // dd($request->get());*/
   // dd($request->all());
        // $extension = $request->file('img')->getClientOriginalExtension();//

    /*montre-moi le champ nom*/
   /*dd($extension->all());
   dd($request->all());*/
         //nom de l'image à l'enregistrement
         //$fileName = $request->name.".".$extension;//

         

        //upload de l'image dans le chemin destination
        //$request->file('img')->move($destinationPath, $fileName);//
        
//------------------------FIN IMAGE PLAT --------------------------------------//
        //* renvoi la liste  *//
       // dd($request->all()); //
         /*verif avant d'enregistrer les info utilisateurs */
        $validated = $request->validate([
            //request()->validate([//
                'nom' => 'required|min:2|max:100',
                'prix' => 'required|numeric',
                'description' => 'required|min:2|max:200',
                'epingle' => '',
                'photoplat'=>'',
            ]);
            /* Création d'une plat */
    /* liaison dans la definition des champs avec edit.blade.php*/
    $plat = new Plat();

    $plat->nom = $request->get('nom');
    $plat->prix = $request->get('prix');
    $plat->description = $request->get('description');
    $plat->epingle = $request->get('epingle');
    $plat->categorie = $request->get('categorie');
    $plat->etiquette = $request->get('etiquette');
    //$Plat->photoPlat = $filename;//
    $plat->photoplat->chemin = $request->get('photoplat');

    $plat->save();


    
    /* pour ajouter message flash de confirmation à garder dans la function request*/
    $request->session()->flash('confirmation', 'La création a bien été enregistré');

    /* on redirige l'utilisateur vers  la page liste */
    return redirect()->route('admin.plat.index');
        }

                            //----------------------------//
                            // -- FONCTION EDIT ---------//
                            //----------------------------//
     // affiche un formulaire de modification
    // $id est le paramètre du plat
    public function edit(int $id)
    {   
        // recup du plat
        $plat = Plat::find($id);
    // affichage d'une erreur 404 si le plat est introuvable
    // !$plat veut dire :si pas de plat alors ... 
    //(voir booleen vrai ou faux)
    // on peut aussi message un message parlant au lieu de abort(404)
    if (!$plat) {
        abort(404);
    }

        // transmission du plat à la vue
        return view('admin.plat.edit', [
            'plat'=> $plat,
        ]);
    }

                            //----------------------------//
                            // -- FONCTION UPDATE ---------//
                            //----------------------------//

     // met à jour les données déja existante dans la base de donnée
    // les données du formulaire sont dans $request sui est le nom de la classe
    // objet de type $request qu'on pourrait appeler $toto
    public function update(Request $request, int $id)
    {

        /*verif avant d'enregistrer les info utilisateurs */
    $validated = $request->validate([
        /* nombre mini et max de caracteres, 
        voir migration creat*etiquette_table pour le max de caracteres*/
        'nom' => 'required|min:2|max:100',
        'prix' => 'required|numeric',
        'description' => 'required|min:2|max:200',
        'epingle' => '',
        'photoplat'=>'',
        /* A COMPLETER */
    ]);

     /* Recuperation du plat*/
    /* liaison dans la definition des champs avec edit.blade.php*/
    $plat = Plat::find($id);

    $categorie = Categorie::find($id);
    $etiquette = Etiquette::find($id);
    $photoplat = PhotoPlat::find($id);


    // affichage d'une erreur 404 si le plat est introuvable
    if (!$plat) {
        abort(404);
    }

    /* sur le plat on recupère */
    $plat->nom = $request->get('nom');
    $plat->description = $request->get('description');
    $plat->prix = $request->get('prix');
    $plat->description = $request->get('description');
    $plat->epingle = $request->get('epingle');
    $photoplat->photoplat = $request->get('photo_plat_id_');

    $plat->save();

    /* pour ajouter message flash de confirmation à garder dans la function request*/
    $request->session()->flash('confirmation', 'Vos modifications ont bien été enregistrées');

    /* on redirige l'utilisateur vers la page plat */
    return redirect()->route('admin.plat.edit', ['id' => $plat->id]);
    }

                            //----------------------------//
                            // -- FONCTION DELETE ---------//
                            //----------------------------//
        public function delete(Request $request, int $id)
        {
        $plat = Plat::find($id);
    
        if (!$plat) {
        abort (404);
    }
    // suppression du menu dans la BD
        $plat->delete();
        $request->session()->flash('confirmation' , 'La suppression a bien été enregistrée.');
    
        return redirect()->route('admin.plat.index');
    }
    }
