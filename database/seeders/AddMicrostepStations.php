<?php

namespace Database\Seeders;

use App\Models\MicrostepStations;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class AddMicrostepStations extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if(!MicrostepStations::where('stationid',38141)->first())
        {
            $station = new MicrostepStations();
            $station->stationid = 38141;
            $station->station_name = 'Жаслык';
            $station->latitude = '43.58';
            $station->longitude = '57.29';
            $station->region_id = 1735;
            $station->l_vis = 128;
            $station->status = 'МС';
            $station->save();
        }

        if(!MicrostepStations::where('stationid',38146)->first())
        {
            $station = new MicrostepStations();
            $station->stationid = 38146;
            $station->station_name = 'Муйнак';
            $station->latitude = '43.45';
            $station->longitude = '59.01';
            $station->region_id = 1735;
            $station->l_vis = 53.8;
            $station->status = 'МС';
            $station->save();
        }

        if(!MicrostepStations::where('stationid',38149)->first())
        {
            $station = new MicrostepStations();
            $station->stationid = 38149;
            $station->station_name = 'Кунград - КАМС';
            $station->latitude = '43.04';
            $station->longitude = '58.53';
            $station->region_id = 1735;
            $station->l_vis = 64;
            $station->status = 'МС';
            $station->save();
        }

        if(!MicrostepStations::where('stationid',38262)->first())
        {
            $station = new MicrostepStations();
            $station->stationid = 38262;
            $station->station_name = 'Чимбай';
            $station->latitude = '42.56';
            $station->longitude = '59.47';
            $station->region_id = 1735;
            $station->l_vis = 66;
            $station->status = 'МС';
            $station->save();
        }

        if(!MicrostepStations::where('stationid',38263)->first())
        {
            $station = new MicrostepStations();
            $station->stationid = 38263;
            $station->station_name = 'Тахтакупыр';
            $station->latitude = '43.01';
            $station->longitude = '60.17';
            $station->region_id = 1735;
            $station->l_vis = 60.6;
            $station->status = 'МС';
            $station->save();
        }
        if(!MicrostepStations::where('stationid',38264)->first())
        {
            $station = new MicrostepStations();
            $station->stationid = 38264;
            $station->station_name = 'Нукус';
            $station->latitude = '42 29';
            $station->longitude = '59 37';
            $station->region_id = 1735;
            $station->l_vis = 77;
            $station->status = 'АМСГ';
            $station->save();
        }
        if(!MicrostepStations::where('stationid',38265)->first())
        {
            $station = new MicrostepStations();
            $station->stationid = 38265;
            $station->station_name = 'Тахиаташ';
            $station->latitude = '42.29';
            $station->longitude = '59.37';
            $station->region_id = 1735;
            $station->l_vis = 77.9;
            $station->status = 'МС';
            $station->save();
        }
        if(!MicrostepStations::where('stationid',38393)->first())
        {
            $station = new MicrostepStations();
            $station->stationid = 38393;
            $station->station_name = 'Бустон';
            $station->latitude = '41.50';
            $station->longitude = '60.56';
            $station->region_id = 1735;
            $station->l_vis = 0;
            $station->status = 'МС';
            $station->save();
        }
        if(!MicrostepStations::where('stationid',38023)->first())
        {
            $station = new MicrostepStations();
            $station->stationid = 38023;
            $station->station_name = 'Каракалпакия ';
            $station->latitude = '44.45';
            $station->longitude = '56.12';
            $station->region_id = 1735;
            $station->l_vis = 126;
            $station->status = 'МС';
            $station->save();
        }

    }
}
