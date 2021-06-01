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

                Log::info('count: '.count($data).' statiodid: '.$stationid->stationid);


                $station = new MicrostepStationsValues();
                $station->station_id = $stationid->id;
                $station->datetime = Carbon::createFromFormat('y.m.d H:i', $data[0])->addHours(5);
                $station->Ta = $this->validateValue($data, 1);
                $station->R = $this->validateValue($data, 2);
                $station->Td = $this->validateValue($data, 3);
                $station->Ta_avr = $this->validateValue($data, 4);
                $station->Ta_min = $this->validateValue($data, 5);
                $station->Ta_max = $this->validateValue($data, 6);
                $station->P = $this->validateValue($data, 7);
                $station->P_sl = $this->validateValue($data, 8);
                $station->a = $this->validateValue($data, 9);
                $station->ff_avr = $this->validateValue($data, 10);
                $station->ff_gust = $this->validateValue($data, 11);
                $station->dd_avr = $this->validateValue($data, 12);
                $station->Ts5 = $this->validateValue($data, 13);
                $station->Ts10 = $this->validateValue($data, 14);
                $station->Ts20 = $this->validateValue($data, 15);
                $station->Ts30 = $this->validateValue($data, 16);
                $station->Ts50 = $this->validateValue($data, 17);
                $station->Ts100 = $this->validateValue($data, 18);
                $station->Hsnow = $this->validateValue($data, 19);
                $station->RR = $this->validateValue($data, 20);
                $station->RR_12 = $this->validateValue($data, 21);
                $station->RR_24 = $this->validateValue($data, 22);
                $station->soil_moisture = $this->validateValue($data, 23);;
                $station->battery = $this->validateValue($data, 24);
                $station->altitude = $this->validateValue($data, 25);
                $station->Ta_12h_avr = $this->validateValue($data, 26);
                $station->Ta_12h_min = $this->validateValue($data, 27);
                $station->Ta_12h_max = $this->validateValue($data, 28);
                $station->ff_gust_12h = $this->validateValue($data, 29);
                $station->ff_gust_3h = $this->validateValue($data, 30);
                $station->ff_gust_1h = $this->validateValue($data, 31);
                $station->SunRad = $this->validateValue($data, 32);
                $station->path = $postName;
                $station->save();


            }


        } catch (\Exception $exception) {
            Log::error($exception->getMessage());

        }


    }

    public function get(Request $request)
    {
        $stations = MicrostepStationsValues::query()->where('station_id',$request->id)->latest()->first();

        return $stations;

    }

    protected function validateValue($data, $index)
    {
        return isset($data[$index]) ? (double) str_replace(" ", null, trim($data[$index])) : null;
    }
}
