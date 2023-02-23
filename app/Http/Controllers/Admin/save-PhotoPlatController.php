<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\PhotoPlat;
use App\Models\Categorie;

use App\Models\Plat;  // <== necessaire ????
use App\Models\Etiquette;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PhotoPlatController extends Controller
{
    //
    //creation d'une fonction
    public function index()
    {
        // equivaut à select * from photo
        // renvoi la liste des etiquettes
        // récuperer la liste des etiquettes
        $photoplats = PhotoPlat::all();
        $categories = Categorie::all();

        //récuperer la liste des photoplats
        //transmission des photoplats à la vue
        //on est dans la partie Back, on affiche donc toutes les photos
        return view('admin.photoplat.index', [
            // OK renvoi tableau des listes Photos
            'photoplats' => $photoplats,
            'categories' => $categories,
        ]);
    }

/******************************************************************************/
    /**
     * Affiche un formulaire de création de catégorie
     *
     * @return Response
     */

    
    //cette methode affiche un formulaire de création image
    public function create(Request $request)
    
    {
        $categories = Categorie::all();
        //valeur par default afficher avant modif par le restaurateur
        // ne pas appeler de save
        $photo_plat = new stdClass;

      //  $photo_plat->nom =  '';// pas de nom
        $photo_plat->description=  '';
        $photo_plat->chemin= '';
        $photo_plat->categorie='';
    
        // ici on est dans PhotoPlatController transmission des valeurs par défaut à la vue
        return view('admin.photoplat.create', [
            'photoplat' => $photo_plat,
        ]);
     dd($request->all());
    }

//cette methode enregistre les données d'une nouvelle image dans la base de données 
public function store(Request $request)
{
 /*verif avant d'enregistrer les info utilisateurs */
 $validated = $request->validate([
   // 'nom' => 'required|min:2|max:100',// pas de nom a la photo
   'chemin' => ['required', 'string'],
    'description' => 'required|min:2|max:100',
    //'categorie_id' => ['required', 'integer'],//

]);
  /* Création d'une photo */
    /* liaison dans la definition des champs avec edit.blade.php*/
    $photoplat = new PhotoPlat();

    //$photoplat->nom = $request->get('nom');//
   
    $photoplat->chemin = $request->get('chemin');
    $photoplat->description = $request->get('description');
    $photoplat->categorie_id = $request->get('categorie_id');

    $categorie= Categorie::find(request('categorie_id'));
    $photoplat->Categorie()->associate($categorie);

    $photoplat->save();
   
    /* pour ajouter message flash de confirmation à garder dans la function request*/
    $request->session()->flash('confirmation', 'La création a bien été enregistré');
    
    /* on redirige l'utilisateur vers  la page liste */
    return redirect()->route('admin.photoplat.index');
}

    // affiche un formulaire de modification
    // $id est le paramètre de l'etiquette
    public function edit(int $id)
    {   
        // recup de l'etiquette
        $photoplat = Photoplat::find($id);
        $categories = Categorie::all();
    // affichage d'une erreur 404 si l'etiquetten est introuvable
    // !$etiquette veut dire :si pas d'etiquetten alors ... 
    //(voir booleen vrai ou faux)
    // on peut aussi message un message parlant au lieu de abort(404)
    if (!$photoplat) {
        abort(404);
    }

        // transmission de l'etiquette à la vue
        return view('admin.photoplat.edit', [
            'photoplat'=> $photoplat,
           'categories' => $categories,
        ]);
    }

    // met à jour les données déja existante dans la base de donnée
    // les données du formulaire sont dans $request sui est le nom de la classe
    // objet de type $request qu'on pourrait appeler $toto
    public function update(Request $request, int $id)
    {

        /*verif avant d'enregistrer les info utilisateurs */
    $validated = $request->validate([
        /* nombre mini et max de caracteres, 
        voir migration creat*etiquette_table pour le max de caracteres*/
        //'nom' => 'required|min:2|max:100',// pas nom
        'description' => 'required|min:2|max:100',
        'chemin' => ['required', 'string'],
      //  'categorie_id' => ['required', 'integer'],//
    ]);

    /* Recuperation de l'etiquette'*/
    /* liaison dans la definition des champs avec edit.blade.php*/
    $photoplat= Photoplat::find($id);
    
    // affichage d'une erreur 404 si la réservation est introuvable
    if (!$photoplat) {
        abort(404);
    }

    /* sur l'etiquette' on recupère */
   // $photoplat->nom = $request->get('nom');//
    $photoplat->description = $request->get('description');
    $photoplat->chemin = $request->get('chemin');
    $photoplat->categorie_id = $request->get('categorie_id');

    $photoplat->save();
    /* pour ajouter message flash de confirmation à garder dans la function request*/
    $request->session()->flash('confirmation', 'Vos modifications ont bien été enregistrées');

    /* on redirige l'utilisateur vers la page etiquette */
    return redirect()->route('admin.photoplat.edit', ['id' => $photoplat->id]);
    }

    public function delete(Request $request, int $id)
    {
    $photoplat = Photoplat::find($id);

    if (!$photoplat) {
    abort (404);
}
    $photoplat->delete();
    $request->session()->flash('confirmation' , 'La suppression a bien été enregistrée.');

    return redirect()->route('admin.photoplat.index');
}
}