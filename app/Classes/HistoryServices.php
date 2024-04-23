<?php

namespace App\Classes;

use Illuminate\Support\Facades\Http;

class HistoryServices
{
    private $endpoint = 'https://aws.meteo.uz/';
    private $getbyintervalendpoint = 'EnvidbHistoricalDataInterface/GetHistoricalDataBySourceStationIdVarsInterval/';
    private $getallvariablesendpoint = 'EnvidbMetadataInterface/GetAllVariables/';
    private $getallstationsendpoint = 'EnvidbMetadataInterface/GetAllStations/';


    public  function GetAllAwstations()
    {
        $stations = Http::withOptions([
            'verify' => false
        ])->withBasicAuth(
            'davronee',
            'bvlgari1991'
        )->get($this->endpoint . $this->getallstationsendpoint)->json();

        return $stations['Stations'];

    }

    public function GetAllVariables()
    {
        $variables = Http::withOptions([
            'verify' => false
        ])->withBasicAuth(
            'davronee',
            'bvlgari1991'
        )->get($this->endpoint . $this->getallvariablesendpoint)->json();

        return response()->json($variables['Variables']);

    }

    public function GetHistoricalDataBySourceStationIdVarsInterval($stationId,$variablesId,$from,$To)
    {
        $history = Http::withOptions([
            'verify' => false
        ])->withBasicAuth(
            'davronee',
            'bvlgari1991'
        )->get($this->endpoint . $this->getbyintervalendpoint.$stationId.'/'.$variablesId.'/O/'.$from.'/'.$To)->json();

        return $history;

    }




}
