<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Region;
use Illuminate\Http\Request;
use App\Models\HourlyStationInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\HourlyStationInfo\CreateService;
use App\Services\HourlyStationInfo\UpdateService;
use App\Http\Requests\HourlyStationInfo\StoreRequest;
use App\Http\Filters\HourlyStationInfo\HourlyStationInfoFilter;

class HourlyStationInfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('HourlyStationWorkHour', ['only' => ['create', 'edit']]);
    }

    public function index(Request $request)
    {
        $user = auth()->user();

        $regions = Region::orderBy('regionid', 'asc')
            ->whereUserRegion($user->region_id)
            ->pluck('nameUz', 'regionid')
            ->toArray();

        $info_list = HourlyStationInfo::orderBy('id')
            ->filter(new HourlyStationInfoFilter($request))
            ->whereUser($user)
            ->centralShiftAgent($user)
            ->with('region', 'district', 'station', 'user')
            ->paginate(25);

        return view('hourly-station-info.index', compact('info_list', 'regions'));
    }

    public function show(HourlyStationInfo $hourlyStationInfo)
    {
        $pdf = PDF::loadView('hourly-station-info.pdf', compact('hourlyStationInfo'));
        return $pdf->stream('hourly-station-info.pdf');
    }

    public function create()
    {
        $user = auth()->user();
        return view('hourly-station-info.create', compact('user'));
    }

    public function store(StoreRequest $request)
    {
        $owner = auth()->user();
        $validate_data = $request->validated();

        try {
            DB::transaction(function () use ($owner, $validate_data, &$hourlyStationInfo) {
                // create hourly station info
                $hourlyStationInfoService = new CreateService();
                $hourlyStationInfo = $hourlyStationInfoService->store([
                    'description' => $validate_data['description'],
                    'user_id' => $owner->id,
                    'region_id' => $owner->region_id,
                    'district_id' => $owner->district_id,
                    'station_id' => $owner->station_id
                ]);

                // TODO: mailbox for users
            });
        } catch (\Throwable $e) {
            // log the error
            Log::error([$e->getFile(), $e->getLine(), $e->getCode(), $e->getMessage()]);
            return back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()->route('hourly-station-info.edit', $hourlyStationInfo->id)->with('status', trans('messages.saved_successfully'));
    }

    public function edit(HourlyStationInfo $hourlyStationInfo)
    {
        $user = auth()->user();
        return view('hourly-station-info.edit', compact('user', 'hourlyStationInfo'));
    }

    public function update(StoreRequest $request, HourlyStationInfo $hourlyStationInfo)
    {
        $owner = auth()->user();
        $validate_data = $request->validated();

        try {
            DB::transaction(function () use ($owner, $validate_data, $hourlyStationInfo) {
                // create hourly station info
                $hourlyStationInfoService = new UpdateService();
                $hourlyStationInfoService->update(
                    $hourlyStationInfo,
                    [
                        'description' => $validate_data['description'],
                        'user_id' => $owner->id
                    ]
                );

                // TODO: mailbox for users
            });
        } catch (\Throwable $e) {
            // log the error
            Log::error([$e->getFile(), $e->getLine(), $e->getCode(), $e->getMessage()]);
            return back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()->route('hourly-station-info.edit', $hourlyStationInfo->id)->with('status', trans('messages.saved_successfully'));
    }

    public function destroy(HourlyStationInfo $hourlyStationInfo)
    {
        $owner = auth()->user();

        try {
            DB::transaction(function () use ($hourlyStationInfo) {
                $hourlyStationInfo->delete();
                // TODO: write log
            });
        } catch (\Throwable $e) {
            // log the error
            Log::error([$e->getFile(), $e->getLine(), $e->getCode(), $e->getMessage()]);
            return redirect()->route('hourly-station-info.index')->with('error', $e->getMessage());
        }

        return redirect()->route('hourly-station-info.index')->with('status', trans('messages.deleted_successfully'));
    }
}
