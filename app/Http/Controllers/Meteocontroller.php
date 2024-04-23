<?php

namespace App\Http\Controllers;

use App\Classes\Services;

class Meteocontroller extends Controller
{
    public function index()
    {
        return view('pages.meteo.index');
    }

    public function getAws($regionid, $days)
    {
        $endpoint = env('AWS_ENDPOINT');
        $endpoint_tradional = env('METEOAPI_ENDPOINT');

        return Services::GetAwsByRegion($regionid);

    }
}
