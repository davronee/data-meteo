<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AddWeatherRegions extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!\App\Models\WeatherRegions::where('code', 'tashkent')->first()) {
            $weather_regions = new \App\Models\WeatherRegions();
            $weather_regions->weather_regionid = 1;
            $weather_regions->regionid = 1726;
            $weather_regions->code = 'tashkent';
            $weather_regions->save();
        }

        if (!\App\Models\WeatherRegions::where('code', 'andijan')->first()) {
            $weather_regions = new \App\Models\WeatherRegions();
            $weather_regions->weather_regionid = 14;
            $weather_regions->regionid = 1703;
            $weather_regions->code = 'andijan';
            $weather_regions->save();
        }


        if (!\App\Models\WeatherRegions::where('code', 'bukhara')->first()) {
            $weather_regions = new \App\Models\WeatherRegions();
            $weather_regions->weather_regionid = 4;
            $weather_regions->regionid = 1706;
            $weather_regions->code = 'bukhara';
            $weather_regions->save();
        }


        if (!\App\Models\WeatherRegions::where('code', 'fergana')->first()) {
            $weather_regions = new \App\Models\WeatherRegions();
            $weather_regions->weather_regionid = 12;
            $weather_regions->regionid = 1730;
            $weather_regions->code = 'fergana';
            $weather_regions->save();
        }


        if (!\App\Models\WeatherRegions::where('code', 'jizzakh')->first()) {
            $weather_regions = new \App\Models\WeatherRegions();
            $weather_regions->weather_regionid = 8;
            $weather_regions->regionid = 1708;
            $weather_regions->code = 'jizzakh';
            $weather_regions->save();
        }


        if (!\App\Models\WeatherRegions::where('code', 'urgench')->first()) {
            $weather_regions = new \App\Models\WeatherRegions();
            $weather_regions->weather_regionid = 3;
            $weather_regions->regionid = 1733;
            $weather_regions->code = 'urgench';
            $weather_regions->save();
        }


        if (!\App\Models\WeatherRegions::where('code', 'namangan')->first()) {
            $weather_regions = new \App\Models\WeatherRegions();
            $weather_regions->weather_regionid = 13;
            $weather_regions->regionid = 1714;
            $weather_regions->code = 'namangan';
            $weather_regions->save();
        }


        if (!\App\Models\WeatherRegions::where('code', 'navoiy')->first()) {
            $weather_regions = new \App\Models\WeatherRegions();
            $weather_regions->weather_regionid = 5;
            $weather_regions->regionid = 1712;
            $weather_regions->code = 'navoiy';
            $weather_regions->save();
        }


        if (!\App\Models\WeatherRegions::where('code', 'qarshi')->first()) {
            $weather_regions = new \App\Models\WeatherRegions();
            $weather_regions->weather_regionid = 10;
            $weather_regions->regionid = 1710;
            $weather_regions->code = 'qarshi';
            $weather_regions->save();
        }


        if (!\App\Models\WeatherRegions::where('code', 'nukus')->first()) {
            $weather_regions = new \App\Models\WeatherRegions();
            $weather_regions->weather_regionid = 2;
            $weather_regions->regionid = 1735;
            $weather_regions->code = 'nukus';
            $weather_regions->save();
        }


        if (!\App\Models\WeatherRegions::where('code', 'samarkand')->first()) {
            $weather_regions = new \App\Models\WeatherRegions();
            $weather_regions->weather_regionid = 7;
            $weather_regions->regionid = 1718;
            $weather_regions->code = 'samarkand';
            $weather_regions->save();
        }


        if (!\App\Models\WeatherRegions::where('code', 'gulistan')->first()) {
            $weather_regions = new \App\Models\WeatherRegions();
            $weather_regions->weather_regionid = 9;
            $weather_regions->regionid = 1724;
            $weather_regions->code = 'gulistan';
            $weather_regions->save();
        }


        if (!\App\Models\WeatherRegions::where('code', 'termez')->first()) {
            $weather_regions = new \App\Models\WeatherRegions();
            $weather_regions->weather_regionid = 11;
            $weather_regions->regionid = 1722;
            $weather_regions->code = 'termez';
            $weather_regions->save();
        }


        if (!\App\Models\WeatherRegions::where('code', 'nurafshon')->first()) {
            $weather_regions = new \App\Models\WeatherRegions();
            $weather_regions->weather_regionid = 20;
            $weather_regions->regionid = 1727;
            $weather_regions->code = 'nurafshon';
            $weather_regions->save();
        }
    }
}
