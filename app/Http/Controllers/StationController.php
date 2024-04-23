<?php

namespace App\Http\Controllers;

use App\Models\Region;
use App\Models\Station;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\Station\StoreRequest;

class StationController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $stations = Station::orderBy('id', 'asc')
            ->byRegion($user)
            ->byStation($user)
            ->paginate(15);

        return view('station.index', compact('stations'));
    }

    public function create()
    {
        $regions = Region::orderBy('regionid', 'asc')
            ->pluck('nameUz', 'regionid')
            ->toArray();

        return view('station.create', compact('regions'));
    }

    public function store(StoreRequest $request)
    {
        // TODO: station by region unique
        $validated_data = $request->validated();
        try {
            if(Station::whereUniqueCheck($validated_data)->count() >0)
                throw new \Exception(trans('messages.unique_error'));

            Station::create($validated_data);
        } catch (\Throwable $e) {
            // log the error
            Log::error([$e->getFile(), $e->getLine(), $e->getCode(), $e->getMessage()]);
            return back()->withInput()->with('error', $e->getMessage());
        }

        return redirect()->route('station.index')->with('status', trans('messages.saved_successfully'));

    }



}
