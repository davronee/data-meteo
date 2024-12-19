<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Hydropost;
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

    public function hydroposts()
    {
        $hydroposts = Hydropost::with(['region', 'district'])->get();


        $result = $hydroposts->map(function ($hydropost) {
            return [
                'id' => $hydropost->id,
                'name' => $hydropost->name,
                'longitude' => $hydropost->longitude,
                'latitude' => $hydropost->latitude,
                'region_name' => $hydropost->region ? $hydropost->region->nameRu : null,
                'district_name' => $hydropost->district ? $hydropost->district->nameRu : null,
            ];
        });

        return response()->json($result, 200);
    }
}
