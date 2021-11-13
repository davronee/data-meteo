<?php

namespace App\Http\Controllers;

use App\Models\AfganDb;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AwdController extends Controller
{
//    public $endpoint = 'http://217.30.161.60:8086/';
    public $endpoint = 'http://192.168.10.249:8086/';

    public function __construct()
    {
        $this->endpoint = env('AWS_ENDPOINT', 'http://192.168.10.249:8086/');  //config('endpoints.AWS_ENDPOINT','http://192.168.10.249:8086/');
    }

    public function getAllStations(Request $request)
    {
        $stations = Http::withBasicAuth('davronee', 'bvlgari1991')->get($this->endpoint . 'EnvidbMetadataInterface/GetAllStations');

        return $stations->json();
    }

    public function getStation(Request $request)
    {
        $stations = Http::withBasicAuth('davronee', 'bvlgari1991')->get($this->endpoint . '/EnvidbCurrentDataInterface/GetCurrentDataForStationById/' . $request->id . '/O');

        return $stations->json();
    }

    public function GetMeteoinfocomStationData(Request $request)
    {
        $station = Http::withoutVerifying()->get('https://api.weather.com/v2/pws/observations/current', [
            'stationId' => 'ITASHK11',
            'format' => 'json',
            'units' => 'm',
            'apiKey' => '0573da0cea344978b3da0cea343978e6'
        ]);

        return $station->json()['observations'][0];

    }

    public function GetAvganData()
    {
        $hydrometStations = AfganDb::latest('id')->first();

        $data = (explode('|', $hydrometStations->text_data));

//        dd($data);

        return response()->json([
            'stationId'=>$data[0],
            'datatime'=> Carbon::parse($data[1])->addHours(5)->format('d.m.Y H:i:s'),
            'winddirect1min_avrg'=>$data[2],
            'windspeed1min_avrg'=>$data[3],
            'winddirect1min_max'=>$data[4],
            'windspeed1min_max'=>$data[5],
            'time'=>$data[6],
            'preptotal1min'=>$data[7],
            'Temp1min'=>$data[8]/10,
            'Rhum1min'=>$data[9]/10,
            'Dptemp1min'=>$data[10],
            'Spress1min'=>$data[11],
            'Apress1min'=>$data[12],
            'qff1min'=>$data[13],
            'evap1min'=>$data[14],
            'glrad1min_avg'=>$data[15],
            'Insolationtime1min'=>$data[16],
            'Totprepw1min'=>$data[17],
            'Totprepwb1min'=>$data[18],
            'dirrad1min'=>$data[19],
            'Difrad1min'=>$data[20],
            'uva1min'=>$data[21],
            'uvb1min'=>$data[22],
            'pwd'=>$data[23],
            'visibility'=>$data[24],
        ]);
    }


}
