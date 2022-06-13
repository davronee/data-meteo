<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Station;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

    public function GetBukharaStationData()
    {
        $endpoint = "http://www.0531yun.com/";
        $token = Http::get($endpoint . 'api/getToken', [
            'loginName' => 'h211124mode',
            'password' => 'h211124mode'
        ])->json();


        $data = Http::withHeaders([
            'authorization' => $token['data']['token']
        ])->get($endpoint . 'api/data/getRealTimeData')->json();


        if ($data['code'] == 1000)
            return $data;
    }
}
