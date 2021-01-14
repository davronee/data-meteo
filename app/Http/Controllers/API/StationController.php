<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Station;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::find(base64_decode($request->input('user_id')));

        return Station::where('region_id', $request->input('region_id'))
            ->where('district_id', $request->input('district_id'))
            ->byRegion($user)
            ->byStation($user)
            ->pluck('name', 'id')
            ->toArray();
    }
}
