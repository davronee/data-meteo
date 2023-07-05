<?php

namespace App\Http\Controllers;

use App\Models\MeteoBotStations;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MeteobotController extends Controller
{
    public function GetStations()
    {
        $stations = MeteoBotStations::get();
        return $stations;
    }

    public function GetOnlyAirQualityStationsList()
    {
        $stations = MeteoBotStations::select(['id', 'name', 'latitude', 'longitude'])->where('is_has_aq', 1)->get();
        return response()->json($stations);
    }

    public function GetOnlyAirQualityStation($id)
    {
        try {
            $id = MeteoBotStations::where('sn', $id)->first();

            if (!isset($id->id))
                return response()->json('Not found', 404);

            $data = Http::withBasicAuth(
                $id->username,
                $id->password
            )->withOptions([
                'verify' => false
            ])->get('https://export.meteobot.com/v2/Generic/IndexFull',
                [
                    'id' => $id->sn,
                    'startTime' => Carbon::now()->format('Y-m-d') . ' 00:00',
                    'endTime' => Carbon::now()->format('Y-m-d') . ' ' . Carbon::now()->addDays(1)->addHour()->format('H') . ':00',
                ])->body();
            $acctArr = explode("\r", $data);
            $arr = [];
            if (count($acctArr) > 2) {
                foreach ($acctArr as $item) {
                    if ($item != "\n")
                        array_push($arr, str_getcsv($item, ';'));
                }
                return response()->json(
                    [
                        'id' => $id->id,
                        'PM2.5' => $arr[count($arr) - 1][13],
                        'PM10' => $arr[count($arr) - 1][15],
                        'CO' => $arr[count($arr) - 1][17],
                        'timestamp' => Carbon::parse($arr[count($arr) - 1][1] . ' ' . $arr[count($arr) - 1][2])->setTimezone('UTC')->timestamp,
                        'datetime' => Carbon::parse($arr[count($arr) - 1][1] . ' ' . $arr[count($arr) - 1][2])->setTimezone('UTC')->format('Y-m-d H:i:s'),
                    ]);

            } else {
                return response()->json('No Data', 503);
            }
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage());
        }


    }
}
