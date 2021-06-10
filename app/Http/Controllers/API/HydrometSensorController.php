<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\HydrometSensorData;
use App\Models\HydrometStation;

class HydrometSensorController extends Controller
{
    public function store(Request $request)
    {
        try {
            HydrometSensorData::create([
                'temperature' => $request->t,
                'humidity' => $request->h,
                'wspeed' => $request->ws,
                'wdir' => $request->wd,
                'pressure' => $request->p,
                'station_id' => HydrometStation::where('code', $request->station_id)->pluck('id')->first()
            ]);
        } catch (\Throwable $th) {
            return response()->json(['result_text' => $th->getMessage(), 'result_code' => 1], 200);
        }

        return response()->json(['result_text' => 'OK', 'result_code' => 0], 200);
    }
}
