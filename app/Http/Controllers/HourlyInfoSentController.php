<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\HourlyStationInfo;
use App\Http\Filters\HourlyStationInfo\HourlyStationInfoFilter;

class HourlyInfoSentController extends Controller
{
    public function index(Request $request)
    {
        $regions = Region::orderBy('regionid', 'asc')
            ->whereUserRegion(auth()->user()->region_id)
            ->pluck('nameUz', 'regionid')
            ->toArray();

        $info_list = HourlyStationInfo::orderBy('id')
            ->filter(new HourlyStationInfoFilter($request))
            ->with('region', 'district', 'station', 'user')
            ->centralShiftAgent($user)
            ->paginate(25)
            ->withQueryString();

        return view('hourly-station-info.index', compact('info_list', 'regions'));
    }
}
