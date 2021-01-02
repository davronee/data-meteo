<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;

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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Station $station)
    {
        //
    }

    public function edit(Station $station)
    {
        //
    }

    public function update(Request $request, Station $station)
    {
        //
    }

    public function destroy(Station $station)
    {
        //
    }
}
