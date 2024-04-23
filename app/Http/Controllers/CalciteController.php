<?php

namespace App\Http\Controllers;

use App\Models\HydrometStation;
use App\Models\MeteoBotStations;
use App\Models\MicrostepStations;
use App\Models\Radar;
use App\Models\Region;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CalciteController extends Controller
{
//    public $endpoint = 'http://192.168.10.249:8086/';
//    public $endpoint = 'http://217.30.161.60:8086/';
    public $endpoint = '';

    public function __construct()
    {
        $this->endpoint = env('AWS_ENDPOINT', 'http://aws.meteo.uz/');  //config('endpoints.AWS_ENDPOINT','http://192.168.10.249:8086/');
    }

//
    public function index(Request $request)
    {
        $radars = Radar::all();

        try {

            $stations = Http::withBasicAuth('davronee', 'bvlgari1991')->timeout(3)->get($this->endpoint . 'EnvidbMetadataInterface/GetAllStations')->json();
        } catch (\Exception $exception) {
            $stations = [];
        }

        $hydrometStations = HydrometStation::where('is_active', true)->with('hydromet_sensor_data')->get();

        $microstations = MicrostepStations::get();

        $meteobots = MeteoBotStations::all();


        try {
            $Chinesstations = Http::timeout(3)->get('http://chinese-api.meteo.uz/allStations.php')->json();
        } catch (\Exception $exception) {
            $Chinesstations = null;
        }

        return view('pages.calcite_maps.index')->with([
            'radars' => $radars,
            'stations' => $stations ?? [],
            'microstations' => $microstations,
            'hydrometstation' => $hydrometStations,
            'chinesstations' => $Chinesstations,
            'meteobots' => $meteobots,
        ]);

    }

    public function GetStations()
    {
        $stations = MeteoBotStations::all();

        return response()->json($stations);
    }

    public function HydrometMap(Request $request)
    {
        $hydrometStations = HydrometStation::where('is_active', true)->with('hydromet_sensor_data')->get();


        return view('pages.hydromet_map')->with([
            'hydrometstation' => $hydrometStations
        ]);
    }

    public function AutoStations(Request $request)
    {
        $stations = Http::withBasicAuth('davronee', 'bvlgari1991')->get($this->endpoint . 'EnvidbMetadataInterface/GetAllStations');

//        dd($stations->json());
        return view('pages.automat_map')->with([
            'stations' => $stations->json(),
        ]);

    }

    public function GetAmbientweather()
    {
        $weather = Http::withOptions([
            'verify' => false
        ])->get('https://rt.ambientweather.net/v1/devices', [
            'applicationKey' => '7524b7fc606c45eab2c14f5e1a24bba7769bedd3f13f4d538c93c81082510091',
            'apiKey' => 'd30e8c1f9ef04e30b5e358b25ee189c6dfdf9d4024754aa286b36c584397c09e'
        ])->json();

        return response()->json($weather[0]);
    }

    public function Crams()
    {
        return view('pages.crams');
    }


    public function GetRegions()
    {
        $regions = Region::select('nameRu', 'regionid')->get();
        return response()->json($regions);

    }

    public function GetMeteobotStations(Request $request)
    {
        if ($request->regionid == 1700) {
            $meteobots = MeteoBotStations::all();
            return response()->json($meteobots);
        } else {
            $meteobots = MeteoBotStations::where('region_id', $request->regionid)->get();
            return response()->json($meteobots);
        }

    }

}
