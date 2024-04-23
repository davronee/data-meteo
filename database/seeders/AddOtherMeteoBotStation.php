<?php

namespace Database\Seeders;

use App\Models\MeteoBotStations;
use Illuminate\Database\Seeder;

class AddOtherMeteoBotStation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $meteobot = MeteoBotStations::updateOrCreate(
            [
                'sn' => $station,
            ],
            [
                'name' => $arr[6],
                'sn' => $station,
                'username' => 3231343030303336,
                'password' => 'k8hwRivdex7hr_5tc',
                'latitude' => $arr[3],
                'longitude' => $arr[4],
                'is_has_aq' => (strlen($station) == 8) ? true : false,
            ]
        );
    }
}
