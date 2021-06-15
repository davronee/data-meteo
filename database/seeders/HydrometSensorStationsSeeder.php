<?php

namespace Database\Seeders;

use App\Models\HydrometStation;
use Illuminate\Database\Seeder;

class HydrometSensorStationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HydrometStation::firstOrCreate(
            ['name' =>  'Sensor 1 test'],
            [
                'name' => 'Sensor 1 test',
                'code' => '001',
                'latitude' => '41.32674795068345',
                'longitude' => '69.29329532356074',
                'region_id' => 1726,
                'is_active' => 1,
            ]
        );
    }
}
