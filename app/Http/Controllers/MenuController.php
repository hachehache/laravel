<?php

namespace App\Http\Controllers;

use App\Models\Categorie;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
      //creation d'une fonction
    public function index()
    {

      $categories = Category::all()->get();
      $plats = Plat::all()->get();
    return view('Admin.categories.index',['categories'=> $categories]);
    return view('Admin.plat.index',['plats'=> $plats]);

          // equivaut à select * from categorie
                    // renvoi la liste des categories
                  // $categories = Categorie::all();
                  // $etiquettes = Etiquette::all();
                    //dd($categorie);
                    // dump

                    // equivaut à select * from categorie order by asc
                    //   $categories = DB::table('categorie')
                      // ->orderby('id','asc')
                    //  ->get()
                    //   ;
                    //return view('menu', [
                    //'categories' => $categories,
                    //'etiquettes' => $etiquettes,
                    // ]);
  
  }
}
