<?php

namespace App\Http\Controllers;

use App\Models\MicrostepStations;
use App\Models\MicrostepStationsValues;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class MicrostepStationsController extends Controller
{
    public function getinfo(Request $request)
    {
        //Log::info($request->all());
        try {
            if (!is_dir(storage_path('data'))) {
                mkdir(storage_path('data'));
            }


            $post = $request->file;  // your base64 encoded
            $postName = $request->name;


            if (!MicrostepStationsValues::where('path', $postName)->first()) {
                File::put(storage_path() . '/data/' . $postName, base64_decode($post));
                $file = File::get(storage_path() . '/data/' . $postName);
                $stationid = explode('_', $postName);
                $stationid = explode('.', $stationid[1]);
                $data = explode(";", $file);

                $stationid = MicrostepStations::where('stationid', $stationid[0])->first();

//                Log::info('count: '.count($data).' statiodid: '.$stationid->stationid);


                $station = new MicrostepStationsValues();
                $station->station_id = $stationid->id;
                $station->datetime = Carbon::createFromFormat('y.m.d H:i', $data[0]);
                $station->Ta = isset($data[1]) ? $data[1] : null;
                $station->R = isset($data[2]) ? $data[2] : null;
                $station->Td = isset($data[3]) ? $data[3] : null;
                $station->Ta_avr = isset($data[4]) ? $data[4] : null;
                $station->Ta_min = isset($data[5]) ? $data[5] : null;
                $station->Ta_max = $data[6];
                $station->P = $data[7];
                $station->P_sl = $data[8];
                $station->a = $data[9];
                $station->ff_avr = $data[10];
                $station->ff_gust = $data[11];
                $station->dd_avr = $data[12];
                $station->Ts5 = $data[13];
                $station->Ts10 = $data[14] == true ? $data[14] : null;//$data[13];
                $station->Ts20 = $data[15] == true ? $data[15] : null;//$data[14];
                $station->Ts30 = $data[16] == true ? $data[16] : null;//$data[15];
                $station->Ts50 = $data[17] == true ? $data[17] : null;//$data[16];
                $station->Ts100 = $data[18] == true ? $data[18] : null;//$data[17];
                $station->Hsnow = $data[19] == true ? $data[19] : null;//$data[18];
                $station->RR = $data[20];
                $station->RR_12 = $data[21];
                $station->RR_24 = $data[22];
                $station->soil_moisture = $data[23];
                $station->battery = $data[24] == true ? $data[24] : null;//$data[23];
                $station->altitude = $data[25];
                $station->Ta_12h_avr = $data[26];
                $station->Ta_12h_min = $data[27];
                $station->Ta_12h_max = $data[28];
                $station->ff_gust_12h = $data[29];
                $station->ff_gust_3h = $data[30];
                $station->ff_gust_1h = $data[31];
                if (count($data) == 32)
                    $station->SunRad = $data[32] == true ? $data[32] : null;
                else
                    $station->SunRad = null;
                $station->path = $postName;
                $station->save();


            }


        } catch (\Exception $exception) {
            Log::error($exception->getMessage());

        }


    }

    public function get(Request $request)
    {
        $stations = MicrostepStationsValues::where('station_id',$request->id)->latest()->first();

        return $stations;

    }
}
