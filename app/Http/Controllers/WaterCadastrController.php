<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WaterCadastrController extends Controller
{
    public function getStation()
    {
        $stations = Http::withBasicAuth('info@ygk.uz', 'X25G-y8nvQ8Tq_2D')->get('http://10.190.24.134:11082/api/hydromet/water_objects')->body();

        return $stations;
    }

    public function GetWaterConsumption(Request $request)
    {
        try {
            $water_consumption = Http::withBasicAuth('info@ygk.uz', 'X25G-y8nvQ8Tq_2D')->get('http://10.190.24.134:11082/api/hydromet/water_consumptions')->json();
            return $water_consumption;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }

    }

    public function GetWaterLevel()
    {
        try {
            $water_consumption = Http::withBasicAuth('info@ygk.uz', 'X25G-y8nvQ8Tq_2D')->get('http://10.190.24.134:11082/api/hydromet/water_level')->json();
            return $water_consumption;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }

    }
    public function GetAutostationHydro()
    {
        try {
            $water_consumption = Http::withBasicAuth('info@ygk.uz', 'X25G-y8nvQ8Tq_2D')->get('http://10.190.24.134:11082/api/hydromet/GetAutoStaions')->json();
            return $water_consumption;
        }
        catch (\Exception $e) {
            return $e->getMessage();
        }

    }
}
