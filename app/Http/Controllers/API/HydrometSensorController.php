<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

class HydrometSensorController extends Controller
{
    public function store(Request $request)
    {
        Log::debug($request->all());

        return response()->json(['result_text' => 'OK', 'result_code' => 0], 200);
    }
}
