<?php

namespace App\Http\Controllers;

use App\Models\HourlyStationInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HourlyStationInfoSendController extends Controller
{
    public function __construct()
    {
        $this->middleware('HourlyStationWorkHour');
    }

    public function store(Request $request, HourlyStationInfo $hourly_station_info)
    {
        // send info
        $hourly_station_info->published_at = Carbon::now();
        $hourly_station_info->save();

        // TODO: log write info

        return redirect()->route('hourly-station-info.index')->with('status', trans('messages.sent_successfully'));
    }
}
