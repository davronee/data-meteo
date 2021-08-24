<?php

namespace App\Http\Controllers;

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


}
