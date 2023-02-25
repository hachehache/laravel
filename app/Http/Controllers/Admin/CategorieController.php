<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Categorie;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Admin;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
     //
    //creation d'une fonction
    public function index()
    {
        // récupération de la liste des catégories
       $categories = Categorie::all();
       // récuperer la liste des photo


        // transmission des catégories à la vue *//
        return view('admin.categorie.index', [
            'categories' => $categories,
          ]);
        }
/******************************************************************************/
    /**
     * Affiche un formulaire de création de catégorie
     *
     * @return Response
     */
    public function create(Request $request)
    {
        $categorie = new stdClass;

        $categorie->nom =  '';
        $categorie->description = '';

        // a mettre ici et pas avant le return et a commenter apres le debug
        //dd($request->all());

        // transmission des valeurs par défaut à la vue
        return view('admin.categorie.create', [
            'categorie' => $categorie, 
        ]);
    }
//cette methode enregistre les données d'une nouvelle categorie dans la base de données 
public function store(Request $request)
{
    //dd($request->has());//
    $validated = $request->validate([
    //request()->validate([//
        'nom' => 'required|min:2|max:100',
        'description' => 'required|min:2|max:200',
        
    ]);
    /* Création d'une catégorie*/
    /* liaison dans la definition des champs avec edit.blade.php*/
    $categorie = new Categorie();

    $categorie->nom = $request->get('nom');
    $categorie->description = $request->get('description');
    
    $categorie->save();
    /* pour ajouter message flash de confirmation à garder dans la function request*/
    $request->session()->flash('confirmation', 'La création a bien été enregistré');

    /*montre-moi le champ nom*/
    //dd($request->has());
   // dd($request->get());*/
   // dd($request->all());
    return redirect()->route('admin.categorie.index');
}

// affiche un formulaire de modification
// $id est le paramètre de la catégorie
public function edit(int $id)
{   
    // recup de la catégorie
    $categorie = Categorie::find($id);
    // affichage d'une erreur 404 si la categorie est introuvable
    // !$categorie veut dire :si pas categorie alors ... 
    //(voir booleen vrai ou faux)
    // on peut aussi message un message parlant au lieu de abort(404)
    if (!$categorie) {
        abort(404);
    }


    // transmission de la catégorie à la vue
    return view('admin.categorie.edit', [
        'categorie'=> $categorie,
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
        voir migration creat*categorie_table pour le max de caracteres*/
        'nom' => 'required|min:2|max:100',
        'description' => 'required|min:2|max:200',
    ]);
    /* Recuperation de la catégorie*/
    /* liaison dans la definition des champs avec edit.blade.php*/
    $categorie = Categorie::find($id);
    
    // affichage d'une erreur 404 si la catégorie est introuvable
    if (!$categorie) {
        abort(404);
    }

    /* sur la catégorie on recupère */
    $categorie->nom = $request->get('nom');
    $categorie->description = $request->get('description');
    $categorie->save();
    
    /* pour ajouter message flash de confirmation à garder dans la function request*/
    /*******devalider *** */
   $request->session()->flash('confirmation', 'Vos modifications ont bien été enregistrées');
   
/*****??????????????????????????????????????????????????????????? */
 /* on redirige l'utilisateur vers  la page categorie*/ 
   /* Le 25 Fev 2023- sav- avant modif pour obtenir liste plat */
 /*return redirect()->route('admin.categorie.edit', ['id' => $categorie->id]);*/
 return redirect()->route('admin.categorie.index', ['id' => $categorie->id]);
    }

    public function delete(Request $request, int $id)
    {
    $categorie = Categorie::find($id);

    if (!$categorie) {
    abort (404);
}
    $categorie->delete();
    $request->session()->flash('confirmation' , 'La suppression a bien été enregistrée.');

    return redirect()->route('admin.categorie.index');
    }
}