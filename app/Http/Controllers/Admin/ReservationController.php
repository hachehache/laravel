<?php

namespace App\Http\Controllers\Admin;
use App\Models\Reservation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //creation d'une fonction
    public function index()
    {
        // equivaut à select * from reservation
        // renvoi la liste des reservations
        // récuperer la liste des reservations
        $reservations = Reservation::all();

        //récuperer la liste des reservations
        //transmission des reservations à la vue
        //on est dans la partie Back, on affiche donc toutes les réservations
        return view('admin.reservation.index', [
            'reservations' => $reservations,
        ]);
    }

    //cette methode affiche un formulaire de création de réservation
    public function create()
    {
        // valeur par défaut
        // transmission des valeurs par défaut à la vue
        return view('admin.reservation.create', [
            //....
        ]);
    }

    //cette methode enregistre les données d'une nouvelle reservation dans la base de données 
    public function store()
    {

    }
    // affiche un formulaire de modification
    // $id est le paramètre de la réservation
    public function edit(int $id)
    {   
        // recup de la reservation
        $reservation = Reservation::find($id);

        // transmission de la reservation à la vue

        return view('admin.reservation.edit', [
            'reservation'=> $reservation,
            //....
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
        'prenom' => 'required|min:2|max:100',
        'jour' => 'required|date|date_format: Y-m-d',
        'heure' => 'required|date_format:H:i',
        /*gte: + grand ou =1 , lte: +petit ou = à 20 */
        'nombre_personnes'=> 'required|numeric|gte:1|lte:20',
        'tel' => 'required|regex:/^[0-9]{2} *[0-9]{2} *[0-9]{2} *[0-9]{2} *[0-9]{2}$/',
        'email' => 'required|email:rfc,dns',
    ]);

    /* Recuperation de la reservation*/
    /* liaison dans la definition des champs avec edit.blade.php*/
    $reservation = Reservation::find($id);
    /* sur la reservation on recupère */
    $reservation->nom = $request->get('nom');
    $reservation->prenom = $request->get('prenom');
    $reservation->jour = $request->get('jour');
    $reservation->heure = $request->get('heure');
    $reservation->nombre_personnes = $request->get('nombre_personnes');
    $reservation->tel = $request->get('tel');
    $reservation->email = $request->get('email');
    $reservation->save();
    /* pour ajouter message flash de confirmation à garder dans la function request*/
    $request->session()->flash('confirmation', 'Vos modifications ont bien été enregistrées');

    /* on redirige l'utilisateur vers  la page resa*/
    return redirect()->route('admin.reservation.edit', ['id' => $reservation->id]);

    /* pour ajouter message flash*/


    /* recuperer une valeur
    /*si le champ baz n'existe pas, montre-moi le champ foo*/
    /*dd($request->has('baz','foo')); */
    /*montre-moi le champ nom*/
   /*dd($request->has('nom'));
    dd($request->has());
    dd($request->get());*/
    dd($request->all());
    }
}