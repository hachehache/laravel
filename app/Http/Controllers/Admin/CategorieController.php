<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categorie;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    public function index()
    {
        // récupération de la liste des catégories
       $categories = Categorie::all();

        // transmission des catégories à la vue
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
    public function create()
    {
        // valeurs par défaut

        // transmission des valeurs par défaut à la vue
        return view('admin.categorie.create', [
            // ...
        ]);
    }
//cette methode enregistre les données d'une nouvelle categorie dans la base de données 
public function store()
{
    dd($request->has());
    $validated = $request->validate([
    //request()->validate([//
        'nom' => 'required|min:2|max:100',
        'description' => 'required|min:2|max:200',
    ]);
    $categorie = new Categorie();
    $categorie->nom = request('nom');
    $categorie->description = request('description');
    $categorie->save();
    /* pour ajouter message flash de confirmation à garder dans la function request*/
    $request->session()->flash('confirmation', 'Vos modifications ont bien été enregistrées');

    /*montre-moi le champ nom*/
    //dd($request->has());
   // dd($request->get());*/
   // dd($request->all());
    return redirect('admin.categorie.create');
}

// affiche un formulaire de modification
// $id est le paramètre de la catégorie
public function edit(int $id)
{   
    // recup de la catégorie
    $categorie = Categorie::find($id);
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
        voir migration creat*reservation_table pour le max de caracteres*/
        'nom' => 'required|min:2|max:100',
        'description' => 'required|min:2|max:200',
    ]);
    /* Recuperation de la catégorie*/
    /* liaison dans la definition des champs avec edit.blade.php*/
    $categorie = Categorie::find($id);
    /* sur la reservation on recupère */
    $categorie->nom = $request->get('nom');
    $categorie->description = $request->get('description');
    $categorie->save();
    /* pour ajouter message flash de confirmation à garder dans la function request*/
    $request->session()->flash('confirmation', 'Vos modifications ont bien été enregistrées');

 /* on redirige l'utilisateur vers  la page categorie*/
 return redirect()->route('admin.categorie.edit', ['id' => $categorie->id]);
 /* pour ajouter message flash*/
    }
}
