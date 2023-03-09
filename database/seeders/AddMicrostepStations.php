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
                'latitude'=>'43.58',
                'longitude'=>'57.29',
                'region_id'=>1735,
                'l_vis'=>128,
                'status'=>'МС',
            ]
        );

        MicrostepStations::updateOrCreate(
            ['stationid'=>38146],
            ['station_name'=>'Муйнак',
                'latitude'=>'43.45',
                'longitude'=>'59.01',
                'region_id'=>1735,
                'l_vis'=>53.8,
                'status'=>'МС',
            ]
        );

        MicrostepStations::updateOrCreate(
            ['stationid'=>38149],
            ['station_name'=>'Кунград - КАМС',
                'latitude'=>'43.04',
                'longitude'=>'58.53',
                'region_id'=>1735,
                'l_vis'=>64,
                'status'=>'МС',
            ]
        );
        MicrostepStations::updateOrCreate(
            ['stationid'=>38262],
            ['station_name'=>'Чимбай',
                'latitude'=>'42.56',
                'longitude'=>'59.47',
                'region_id'=>1735,
                'l_vis'=>66,
                'status'=>'МС',
            ]
        );

        MicrostepStations::updateOrCreate(
            ['stationid'=>38263],
            ['station_name'=>'Тахтакупыр',
                'latitude'=>'42.33401067871654',
                'longitude'=>'59.57905443012308',
                'region_id'=>1735,
                'l_vis'=>60.6,
                'status'=>'МС',
            ]
        );
        MicrostepStations::updateOrCreate(
            ['stationid'=>38264],
            ['station_name'=>'Нукус',
                'latitude'=>'42.29',
                'longitude'=>'59.37',
                'region_id'=>1735,
                'l_vis'=>77,
                'status'=>'АМСГ',
            ]
        );
        MicrostepStations::updateOrCreate(
            ['stationid'=>38265],
            ['station_name'=>'Тахиаташ',
                'latitude'=>'43.01',
                'longitude'=>'60.17',
                'region_id'=>1735,
                'l_vis'=>77.9,
                'status'=>'МС',
            ]
        );

        MicrostepStations::updateOrCreate(
            ['stationid'=>38393],
            ['station_name'=>'Бустон',
                'latitude'=>'41.50',
                'longitude'=>'60.56',
                'region_id'=>1735,
                'l_vis'=>0,
                'status'=>'МС',
            ]
        );

        MicrostepStations::updateOrCreate(
            ['stationid'=>38023],
            ['station_name'=>'Каракалпакия',
                'latitude'=>'44.45',
                'longitude'=>'56.12',
                'region_id'=>1735,
                'l_vis'=>126,
                'status'=>'МС',
            ]
        );

    }
}
