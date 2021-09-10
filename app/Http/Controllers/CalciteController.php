<?php

namespace App\Http\Controllers;

use App\Models\HydrometStation;
use App\Models\MicrostepStations;
use App\Models\Radar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;

class CalciteController extends Controller
{
//    public $endpoint = 'http://192.168.10.249:8086/';
//    public $endpoint = 'http://217.30.161.60:8086/';
    public $endpoint = '';

    public function __construct()
    {
        $this->endpoint = env('AWS_ENDPOINT', 'http://192.168.10.249:8086/');  //config('endpoints.AWS_ENDPOINT','http://192.168.10.249:8086/');
    }

//
    public function index(Request $request)
    {
        $radars = Radar::all();

        $stations = Http::withBasicAuth('davronee', 'bvlgari1991')->get($this->endpoint . 'EnvidbMetadataInterface/GetAllStations');

        $hydrometStations = HydrometStation::where('is_active', true)->with('hydromet_sensor_data')->get();

        $microstations = MicrostepStations::get();

        return view('pages.calcite_maps.index')->with([
            'radars' => $radars,
            'stations' => $stations->json(),
            'microstations' => $microstations,
            'hydrometstation' => $hydrometStations,
        ]);

    }

    public function HydrometMap(Request $request)
    {
        $hydrometStations = HydrometStation::where('is_active', true)->with('hydromet_sensor_data')->get();


        return view('pages.hydromet_map')->with([
            'hydrometstation' => $hydrometStations
        ]);
    }




}
