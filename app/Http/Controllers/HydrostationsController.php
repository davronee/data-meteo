<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HydrostationsController extends Controller
{
    public function list()
    {
        try {
            $stations = Http::get('https://meteoapi.meteo.uz/api/hydroposts')->json();
            return $stations;
        } catch (Exception $exception) {
            return "No data found";
        }
    }

    public function get(Request $request)
    {
        try {
            $station = Http::get('https://meteoapi.meteo.uz/api/hydroposts/' . $request->id)->json();
            return $station;
        } catch (Exception $exception) {
            return "No data found";
        }
    }
}
