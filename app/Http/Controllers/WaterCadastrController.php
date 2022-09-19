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
}
