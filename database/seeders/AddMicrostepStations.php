<?php

namespace Database\Seeders;

use App\Models\MicrostepStations;
use App\Models\Station;
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
        MicrostepStations::updateOrCreate(
            ['stationid'=>38141],
            ['station_name'=>'Жаслык',
                'latitude'=>'44.10000000',
                'longitude'=>'57.50000000',
                'region_id'=>1735,
                'l_vis'=>127,
                'status'=>'МС',
            ]
        );

        MicrostepStations::updateOrCreate(
            ['stationid'=>38146],
            ['station_name'=>'Муйнак',
                'latitude'=>'43.77222222',
                'longitude'=>'59.02388889',
                'region_id'=>1735,
                'l_vis'=>55,
                'status'=>'МС',
            ]
        );

        MicrostepStations::updateOrCreate(
            ['stationid'=>38149],
            ['station_name'=>'Кунград - КАМС',
                'latitude'=>'43.07611111',
                'longitude'=>'58.88972222',
                'region_id'=>1735,
                'l_vis'=>62,
                'status'=>'МС',
            ]
        );
        MicrostepStations::updateOrCreate(
            ['stationid'=>38262],
            ['station_name'=>'Чимбай',
                'latitude'=>'42.93805556',
                'longitude'=>'59.79777778',
                'region_id'=>1735,
                'l_vis'=>66,
                'status'=>'МС',
            ]
        );

        MicrostepStations::updateOrCreate(
            ['stationid'=>38263],
            ['station_name'=>'Тахтакупыр',
                'latitude'=>'43.03222222',
                'longitude'=>'60.29694444',
                'region_id'=>1735,
                'l_vis'=>59,
                'status'=>'МС',
            ]
        );
        MicrostepStations::updateOrCreate(
            ['stationid'=>38264],
            ['station_name'=>'Нукус',
                'latitude'=>'42.44555556',
                'longitude'=>'59.60361111',
                'region_id'=>1735,
                'l_vis'=>75,
                'status'=>'АМСГ',
            ]
        );
        MicrostepStations::updateOrCreate(
            ['stationid'=>38265],
            ['station_name'=>'Тахиаташ',
                'latitude'=>'42.33361111',
                'longitude'=>'59.56694444',
                'region_id'=>1735,
                'l_vis'=>77,
                'status'=>'МС',
            ]
        );

        MicrostepStations::updateOrCreate(
            ['stationid'=>38393],
            ['station_name'=>'Бустон',
                'latitude'=>'41.84722222',
                'longitude'=>'60.93416667',
                'region_id'=>1735,
                'l_vis'=>95,
                'status'=>'МС',
            ]
        );

        MicrostepStations::updateOrCreate(
            ['stationid'=>38023],
            ['station_name'=>'Каракалпакия',
                'latitude'=>'44.95027778',
                'longitude'=>'56.83361111',
                'region_id'=>1735,
                'l_vis'=>126,
                'status'=>'МС',
            ]
        );

    }
}
