<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Meteocontroller extends Controller
{
    public function index()
    {
        return view('pages.meteo.index');
    }
}
