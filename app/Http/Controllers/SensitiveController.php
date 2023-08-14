<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Region;
use App\Models\SensitiveData;
use Illuminate\Http\Request;

class SensitiveController extends Controller
{
    public function index()
    {
        $temp_avarage = SensitiveData::get()->groupBy('month')->map(function ($row) {
            return $row->avg('temperature');
        })->toArray();

        $pressure_avarage = SensitiveData::get()->groupBy('month')->map(function ($row) {
            return $row->avg('pressure');
        })->toArray();

        $humidity_avarage = SensitiveData::get()->groupBy('month')->map(function ($row) {
            return $row->avg('humidity');
        })->toArray();

        $wind_speed_avarage = SensitiveData::get()->groupBy('month')->map(function ($row) {
            return $row->avg('wind_speed');
        })->toArray();

        $solar_radiation_avarage = SensitiveData::get()->groupBy('month')->map(function ($row) {
            return $row->avg('solar_radiation');
        })->toArray();

        $precipitation_avarage = SensitiveData::get()->groupBy('month')->map(function ($row) {
            return $row->avg('precipitation');
        })->toArray();

        $air_quality_avarage = SensitiveData::get()->groupBy('month')->map(function ($row) {
            return $row->avg('air_quality');
        })->toArray();

        $regions = Region::all();
        return view('pages.sensitive.index', compact('temp_avarage','precipitation_avarage','solar_radiation_avarage','wind_speed_avarage','humidity_avarage','pressure_avarage','air_quality_avarage','regions'));
    }
}
