<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MentionsLegalesController extends Controller
{
    //creation d'une fonction
public function index()
{
return view('mentions-legales');
}
}