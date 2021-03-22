<?php

namespace Database\Seeders;

use App\Models\Radar;
use Illuminate\Database\Seeder;

class AddRadars extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!Radar::where(
            'region_id', 1726
        )->first()) {
            $radar = new Radar();
            $radar->region_id = 1726;
            $radar->latitude = 41.192206;
            $radar->longitude = 69.237766;
            $radar->save();
        }

        if (!Radar::where(
            'region_id', 1718
        )->first()) {
            $radar = new Radar();
            $radar->region_id = 1718;
            $radar->latitude = 39.693275678876596;
            $radar->longitude = 66.98036173542914;
            $radar->save();
        }

        if (!Radar::where(
            'region_id', 1735
        )->first()) {
            $radar = new Radar();
            $radar->region_id = 1735;
            $radar->latitude = 42.515747;
            $radar->longitude = 59.605660;
            $radar->save();
        }
    }
}
