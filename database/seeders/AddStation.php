<?php

namespace Database\Seeders;

use App\Models\Services;
use App\Models\Station;
use Illuminate\Database\Seeder;

class AddStation extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Station::updateOrCreate(
            ['name'=>'Тахиаташ'],
            ['region_id'=>1735,'district_id'=>1735228,'latitude'=>42.33333333,'longitude'=>59.56666667]
        );

        Station::updateOrCreate(
            ['name'=>'Каракалпакия'],
            ['region_id'=>1735,'district_id'=>1735401,'latitude'=> 44.95000000,'longitude'=>56.83333333]
        );
        Station::updateOrCreate(
            ['name'=>'Тамды'],
            ['region_id'=>1712,'district_id'=>1712244,'latitude'=>  41.75856944,'longitude'=>64.62150000]
        );
        Station::updateOrCreate(
            ['name'=>'Термез'],
            ['region_id'=>1722,'district_id'=>1722401,'latitude'=>  37.28055556,'longitude'=>67.32250000]
        );
        Station::updateOrCreate(
            ['name'=>'Ташкент'],
            ['region_id'=>1726,'latitude'=>  41.32765000,'longitude'=>69.29426389]
        );
        Station::updateOrCreate(
            ['name'=>'Фергана'],
            ['region_id'=>1730,'latitude'=>  40.38333333,'longitude'=>71.75000000]
        );
    }
}
