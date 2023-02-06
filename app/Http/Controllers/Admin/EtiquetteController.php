<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Etiquette;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EtiquetteController extends Controller
{
    //
    //creation d'une fonction
    public function index()
    {
        // equivaut à select * from etiquette
        // renvoi la liste des etiquettes
        // récuperer la liste des etiquettes
        $etiquettes = Etiquette::all();

        //récuperer la liste des etiquettes
        //transmission des etiquettes à la vue
        //on est dans la partie Back, on affiche donc toutes les etiquettes
        return view('admin.etiquette.index', [
            'etiquettes' => $etiquettes,
        ]);
    }

    
    //cette methode affiche un formulaire de création Etiquette
    public function create()
    {
        //valeur par default afficher avant modif par le restaurateur
        // ne pas appeler de save
        $etiquette = new stdClass;

        $etiquette->nom =  '';
        $etiquette->description=  '';
    
        // transmission des valeurs par défaut à la vue
        return view('admin.etiquette.create', [
            'etiquette' => $etiquette,
        ]);
    }

//cette methode enregistre les données d'une nouvelle etiquette dans la base de données 
public function store(Request $request)
{
 /*verif avant d'enregistrer les info utilisateurs */
 $validated = $request->validate([
    'nom' => 'required|min:2|max:100',
    'description' => 'required|min:2|max:100',
]);
  /* Création d'une étiquette */
    /* liaison dans la definition des champs avec edit.blade.php*/
    $etiquette = new Etiquette();

    $etiquette->nom = $request->get('nom');
    $etiquette->description = $request->get('description');

    $etiquette->save();
    /* pour ajouter message flash de confirmation à garder dans la function request*/
    $request->session()->flash('confirmation', 'La création a bien été enregistré');

    /* on redirige l'utilisateur vers  la page liste */
    return redirect()->route('admin.etiquette.index');
}

    // affiche un formulaire de modification
    // $id est le paramètre de l'etiquette
    public function edit(int $id)
    {   
        // recup de l'etiquette
        $etiquette = Etiquette::find($id);
    // affichage d'une erreur 404 si l'etiquetten est introuvable
    // !$etiquette veut dire :si pas d'etiquetten alors ... 
    //(voir booleen vrai ou faux)
    // on peut aussi message un message parlant au lieu de abort(404)
    if (!$etiquette) {
        abort(404);
    }

        // transmission de l'etiquette à la vue
        return view('admin.etiquette.edit', [
            'etiquette'=> $etiquette,
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
        'nom' => 'required|min:2|max:100',
        'description' => 'required|min:2|max:100',
    ]);

    /* Recuperation de l'etiquette'*/
    /* liaison dans la definition des champs avec edit.blade.php*/
    $etiquette = Etiquette::find($id);
    
    // affichage d'une erreur 404 si la réservation est introuvable
    if (!$etiquette) {
        abort(404);
    }

    /* sur l'etiquette' on recupère */
    $etiquette->nom = $request->get('nom');
    $etiquette->description = $request->get('description');
    $etiquette->save();
    /* pour ajouter message flash de confirmation à garder dans la function request*/
    $request->session()->flash('confirmation', 'Vos modifications ont bien été enregistrées');

    /* on redirige l'utilisateur vers la page etiquette */
    return redirect()->route('admin.etiquette.edit', ['id' => $etiquette->id]);
    }

    public function delete(Request $request, int $id)
    {
    $etiquette = Etiquette::find($id);

    if (!$etiquette) {
    abort (404);
}
    $etiquette->delete();
    $request->session()->flash('confirmation' , 'La suppression a bien été enregistrée.');

    return redirect()->route('admin.etiquette.index');
}
}