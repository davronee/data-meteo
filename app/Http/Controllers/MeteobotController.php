<?php

namespace App\Http\Controllers;

use App\Models\MeteoBotStations;
use Illuminate\Http\Request;

class MeteobotController extends Controller
{
    public function GetStations()
    {
        $stations = MeteoBotStations::get();
        return $stations;
    }
}
