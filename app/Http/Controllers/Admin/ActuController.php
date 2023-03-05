<?php

namespace App\Http\Controllers\Admin;

use stdClass;
use App\Models\Actu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ActuController extends Controller
{
    //
    //creation d'une fonction
    public function index()
    {
        // equivaut à select * from actu
        // renvoi la liste des actu
        // récuperer la liste des actu
        $actus = Actu::all();

        //récuperer la liste des actu
        //transmission des actu à la vue
        //on est dans la partie Back, on affiche donc toutes les actu
        return view('admin.actu.index', [
            'actus' => $actus,
        ]);
    }

    
    //cette methode affiche un formulaire de création actu
    public function create(Request $request)
    {
        //valeur par default afficher avant modif par le restaurateur
        // ne pas appeler de save
        $actu = new stdClass;

        $actu->jour_publication =  '';
        $actu->heure_publication =  '';
        $actu->texte=  '';


       // dd($request->all());

        // transmission des valeurs par défaut à la vue
        return view('admin.actu.create', [
            'actu' => $actu,
        ]);
        
    }

//cette methode enregistre les données d'une nouvelle actu dans la base de données 
public function store(Request $request)
{
 /*verif avant d'enregistrer les info utilisateurs */
 $validated = $request->validate([
    'jour_publication' => '',
    'heure_publication' => '',
    'texte' => 'required|min:2|max:2000',
]);
  /* Création d'une actu */
    /* liaison dans la definition des champs avec edit.blade.php*/
    $actu = new Actu();

    $actu->jour_publication = $request->get('jour_publication');
    $actu->heure_publication = $request->get('heure_publication');
    $actu->texte = $request->get('texte');

    $actu->save();
   
    /* pour ajouter message flash de confirmation à garder dans la function request*/
    $request->session()->flash('confirmation', 'La création a bien été enregistré');
    
    /* on redirige l'utilisateur vers  la page liste */
    return redirect()->route('admin.actu.index');
}

    // affiche un formulaire de modification
    // $id est le paramètre de l'actu
    public function edit(int $id)
    {   
        // recup de actu
        $actu = Actu::find($id);
    // affichage d'une erreur 404 si actu est introuvable
    // !$actu veut dire :si pas actu alors ... 
    //(voir booleen vrai ou faux)
    // on peut aussi message un message parlant au lieu de abort(404)
    if (!$actu) {
        abort(404);
    }

        // transmission de l'actu à la vue
        return view('admin.actu.edit', [
            'actu'=> $actu,
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
        voir migration creat*actu_table pour le max de caracteres*/
        'jour_publication' => '',
        'heure_publication' => '',
        'texte' => 'required|min:2|max:2000',
    ]);

    /* Recuperation de l'actu'*/
    /* liaison dans la definition des champs avec edit.blade.php*/
    $actu = Actu::find($id);
    
    // affichage d'une erreur 404 si la actu est introuvable
    if (!$actu) {
        abort(404);
    }

    /* sur l'actu' on recupère */
    $actu->jour_publication = $request->get('jour_publication');
    $actu->heure_publication = $request->get('heure_publication');
    $actu->texte = $request->get('texte');

    $actu->save();
    /* pour ajouter message flash de confirmation à garder dans la function request*/
    $request->session()->flash('confirmation', 'Vos modifications ont bien été enregistrées');

    /* on redirige l'utilisateur vers la page actu */
    return redirect()->route('admin.actu.edit', ['id' => $actu->id]);
    }

    public function delete(Request $request, int $id)
    {
    $actu = Actu::find($id);

    if (!$actu) {
    abort (404);
}
    $actu->delete();
    $request->session()->flash('confirmation' , 'La suppression a bien été enregistrée.');

    return redirect()->route('admin.actu.index');
    }
}