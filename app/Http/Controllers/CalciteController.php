<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalciteController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.calcite_maps.index');
    }
}
