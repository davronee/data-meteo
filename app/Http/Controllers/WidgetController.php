<?php

namespace App\Http\Controllers;

use App\Models\Meteo;
use Illuminate\Http\Request;

class WidgetController extends Controller
{
    public function index(Request $request)
    {

        return view('widget.index');
    }

    public function test(Request $request)
    {

        $meteo = Meteo::all();

        return response()->json($meteo);

    }

}
