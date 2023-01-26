<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\DB;

class MenuController extends Controller
{
      //creation d'une fonction
    public function index()
    {
    // equivaut à select * from categorie
    // renvoi la liste des categories
    $categories = Categorie::all();
    
    //dd($categorie);
    // dump

    // equivaut à select * from categorie order by asc
    //    $categories = DB::table('categorie')
    //   ->orderby('id','asc')
    //    ->get()
    //    ;

    //dump
    // dd($categories);
    return view('menu', [
    'categories' => $categories,
    ]);
    }
}
