<?php

namespace App\Http\Controllers;

use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\DailyStationInfo;

class DailyStationInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:central-agent-station', ['only' => ['create', 'edit']]);
    }

    public function index()
    {
        //
    }

    public function create()
    {
        $user = auth()->user();

        $regions = Region::orderBy('regionid', 'asc')
            ->whereUserRegion($user->region_id)
            ->pluck('nameUz', 'regionid')
            ->toArray();

        return view('daily-station-info.create', compact('user'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show(DailyStationInfo $dailyStationInfo)
    {
        //
    }

    public function edit(DailyStationInfo $dailyStationInfo)
    {
        //
    }

    public function update(Request $request, DailyStationInfo $dailyStationInfo)
    {
        //
    }

    public function destroy(DailyStationInfo $dailyStationInfo)
    {
        //
    }
}
