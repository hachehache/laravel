<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Actu;

class HomeController extends Controller
{
    //creation d'une fonction
public function index()
    {
        //dd($request->all());
        $actus = Actu::all();

    return view('home', [
        'actus' => $actus,
    ]);
    
    }
}