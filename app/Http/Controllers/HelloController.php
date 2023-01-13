<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    //creation d'une fonction
    public function index($name)
    {
        // traitement des donnees
        $name = '"'.$name.'"';

        return view('hello' , [
            //passage de variables à une vue
            'name' => $name,
        ]);
    }
}
