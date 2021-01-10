<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\DailyStationInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\DailyStationInfo\CreateService;
use App\Services\DailyStationInfo\UpdateService;
use App\Http\Requests\DailyStationInfo\StoreRequest;
use App\Http\Filters\DailyStationInfo\DailyStationInfoFilter;

class DailyStationInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:central-agent-station', ['only' => ['create', 'edit']]);
    }

    public function index(Request $request)
    {
        $user = auth()->user();

        $regions = Region::orderBy('regionid', 'asc')
            ->whereUserRegion($user->region_id)
            ->pluck('nameUz', 'regionid')
            ->toArray();

        $info_list = DailyStationInfo::orderBy('id')
            ->filter(new DailyStationInfoFilter($request))
            ->whereUser($user)
            ->with('region', 'district', 'station', 'user')
            ->paginate(25);

        return view('daily-station-info.index', compact('info_list', 'regions'));
    }

    public function create()
    {
        // TODO: create right sidebar hourly station info by selected region
        $user = auth()->user();

        $regions = Region::orderBy('regionid', 'asc')
            ->whereUserRegion($user->region_id)
            ->pluck('nameUz', 'regionid')
            ->toArray();

        return view('daily-station-info.create', compact('user', 'regions'));
    }

    public function store(StoreRequest $request)
    {
        $owner = auth()->user();
        $validate_data = $request->validated();

        try {
            DB::transaction(function () use ($owner, $validate_data, &$dailyStationInfo) {
                // create hourly station info
                $dailyStationInfoService = new CreateService();
                $dailyStationInfo = $dailyStationInfoService->store([
                    'description' => $validate_data['description'],
                    'user_id' => $owner->id,
                    'region_id' => $validate_data['region_id']
                ]);

                // TODO: mailbox for users
            });
        } catch (\Throwable $e) {
            // log the error
            Log::error([$e->getFile(), $e->getLine(), $e->getCode(), $e->getMessage()]);
            return back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()->route('daily-station-info.edit', $dailyStationInfo->id)->with('status', trans('messages.saved_successfully'));
    }

    public function show(DailyStationInfo $dailyStationInfo)
    {
        $pdf = PDF::loadView('daily-station-info.pdf', compact('dailyStationInfo'));
        return $pdf->stream('daily-station-info.pdf');
    }

    public function edit(DailyStationInfo $dailyStationInfo)
    {
        $user = auth()->user();
        $regions = Region::orderBy('regionid', 'asc')
            ->whereUserRegion($user->region_id)
            ->pluck('nameUz', 'regionid')
            ->toArray();

        return view('daily-station-info.edit', compact('user', 'dailyStationInfo', 'regions'));
    }

    public function update(StoreRequest $request, DailyStationInfo $dailyStationInfo)
    {
        $owner = auth()->user();
        $validate_data = $request->validated();

        try {
            DB::transaction(function () use ($owner, $validate_data, $dailyStationInfo) {
                // create daily station info
                $dailyStationInfoService = new UpdateService();
                $dailyStationInfoService->update(
                    $dailyStationInfo,
                    [
                        'description' => $validate_data['description'],
                        'user_id' => $owner->id,
                        'region_id' => $validate_data['region_id']
                    ]
                );

                // TODO: mailbox for users
            });
        } catch (\Throwable $e) {
            // log the error
            Log::error([$e->getFile(), $e->getLine(), $e->getCode(), $e->getMessage()]);
            return back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()->route('daily-station-info.edit', $dailyStationInfo->id)->with('status', trans('messages.saved_successfully'));
    }

    public function destroy(DailyStationInfo $dailyStationInfo)
    {
        $owner = auth()->user();

        try {
            DB::transaction(function () use ($dailyStationInfo) {
                $dailyStationInfo->delete();
                // TODO: write log
            });
        } catch (\Throwable $e) {
            // log the error
            Log::error([$e->getFile(), $e->getLine(), $e->getCode(), $e->getMessage()]);
            return redirect()->route('daily-station-info.index')->with('error', $e->getMessage());
        }

        return redirect()->route('daily-station-info.index')->with('status', trans('messages.deleted_successfully'));
    }
}
