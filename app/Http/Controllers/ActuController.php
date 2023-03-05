<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActuController extends Controller
{
    //creation d'une fonction
public function index()
{
// equivaut a :
$jour_publication = DB::table('actu')
->where('jour_publication', '=', 'date')
// avec first plutot que ->get()
//->get()
->first()
;

$heure_publication = DB::table('actu')
->where('heure_publication', '=', 'time')
// avec first plutot que ->get()
//->get()
->first()
;

      $texte = DB::table('actu')
      ->where('texte', '=', 'text')
      // avec first plutot que ->get()
      //->get()
      ->first()
      ;
    
return view('actu', [
    'jour_publication' => $jour_publication,
    'heure_publication' => $heure_publication,
    'texte' => $texte,
  ]);
}
}
