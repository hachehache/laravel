<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActusController extends Controller
{
    //creation d'une fonction
public function index()
{
return view('actus');
}
}