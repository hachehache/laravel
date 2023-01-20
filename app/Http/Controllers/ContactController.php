<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
    //creation d'une fonction

      // equivaut à :
      // select * from categorie order by asc
      $adresse = DB::table('restaurant')
      // equivaut a 
      //select * from restaurant where cle='adresse'  
      // mettre '=' car si on ne met pas cela veut dire que l'on affecte une valeur
      // à la clé, alors que l'on veut lire la valeur
      ->where('cle', '=', 'adresse')
      // avec first plutot que ->get() car on ne recupère que le 1er 
      //element plutot qu'une liste
      //->get()
      ->first()
      ;
      // equivaut a :
      //select * from restaurant where cle='tel'
      $tel = DB::table('restaurant')
      ->where('cle', '=', 'tel')
      // avec first plutot que ->get()
      //->get()
      ->first()
      ;

      $map = DB::table('restaurant')
      // equivaut a :
      //select * from restaurant where cle='map'
      ->where('cle', '=', 'map')
      // avec first plutot que ->get()
      //->get()
      ->first()
      ;

      $horaire = DB::table('restaurant')
      // equivaut a :
      //select * from restaurant where cle='horaire'
      ->where('cle', '=', 'horaire')
      // avec first plutot que ->get()
      //->get()
      ->first()
      ;

      //dd($adresse);
      //dd($tel->valeur);
      return view('contact', [
        'adresse' => $adresse->valeur,
        'tel' => $tel->valeur,
        'map' => $map->valeur,
        'horaire' => $horaire->valeur,
      ]);
    }
}
