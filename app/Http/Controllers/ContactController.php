<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
    //creation d'une fonction

// equivaut à select * from categorie order by asc
      $categories = DB::table('categorie')
       ->orderby('id','asc')
       ->get()
      ;
      return view('contact');
    }
}
