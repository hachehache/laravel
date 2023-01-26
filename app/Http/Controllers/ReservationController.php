<?php

namespace App\Http\Controllers;
use App\Models\Reservation;
use App\Http\Controllers;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    //creation d'une fonction
    public function index()
    {
        // on est dans la partie front
        // le client ne verra pas les autres réservations
        return view('reservation', [
        ]);

    }
}
