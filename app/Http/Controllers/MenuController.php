<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
         //dd($request->all());
        //ump("toto");die;
        // SELECT * FROM categorie
        $categories = Categorie::all();

        //dump("$categories");die;
        return view('menu', [
            'categories' => $categories,
        ]);
    }
}

