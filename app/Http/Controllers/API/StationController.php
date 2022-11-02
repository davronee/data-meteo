<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Station;
use App\Models\User;
use Carbon\Carbon;
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


    public function GetMeteoBotInfo($id)
    {
        $data = Http::withBasicAuth(
            '3231343030303336',
            'k8hwRivdex7hr_5tc'
        )->withOptions([
            'verify' => false
        ])->get('https://export.meteobot.com/v2/Generic/IndexFull',
            [
                'id' => $id,//'3231343030303336',
                'startTime' => Carbon::now()->format('Y-m-d') . ' ' . Carbon::now()->format('H') . ':00',
                'endTime' => Carbon::now()->format('Y-m-d') . ' ' . Carbon::now()->addDays(1)->addHour()->format('H') . ':00',
            ])->body();

//        return $data;

        $acctArr = explode("\r", $data);
        $arr = [];
        foreach ($acctArr as $item) {
            if ($item != "\n")
                array_push($arr, str_getcsv($item, ';'));
        }
        return response()->json($arr[count($arr)-1]);


    }
}
