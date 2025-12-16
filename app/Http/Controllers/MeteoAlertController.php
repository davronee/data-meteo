<?php

namespace App\Http\Controllers;

use App\Models\HydrometStation;
use App\Models\MeteoBotStations;
use App\Models\MicrostepStations;
use App\Models\Radar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MeteoAlertController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */


    public function prognoz()
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

        return view('pages.meteoalert')->with([
            'radars' => $radars,
            'stations' => $stations ?? [],
            'microstations' => $microstations,
            'hydrometstation' => $hydrometStations,
            'chinesstations' => $Chinesstations,
            'meteobots' => $meteobots,
        ]);

    }

    public function zagrazneniya()
    {
        $param = request()->query('param');
        return view('pages.meteoalert_zagrazneniya', compact('param'));

    }
}
