<?php

namespace App\Http\Controllers;

use App\Jobs\SendDailyInfoToIjroIntizomJob;
use App\Jobs\SendDailyInfoToTelegramJob;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\DailyStationInfo;

class DailyStationInfoSendController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:central-agent-station');
    }

    public function store(Request $request, DailyStationInfo $daily_station_info)
    {
        // send info
        $daily_station_info->published_at = Carbon::now();
        $daily_station_info->save();


        // send e-xat
        SendDailyInfoToIjroIntizomJob::dispatchNow($daily_station_info);

        // create send telegram
        SendDailyInfoToTelegramJob::dispatchNow($daily_station_info);

        // TODO: log write info

        return redirect()->route('daily-station-info.index')->with('status', trans('messages.sent_successfully'));
    }
}
