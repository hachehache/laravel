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
    dd($request->all());
    }
}