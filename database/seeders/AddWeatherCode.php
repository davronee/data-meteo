<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AddWeatherCode extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (!\App\Models\WeatherCode::where('code', 'clear')->first()) {
            $weather_code = new \App\Models\WeatherCode();
            $weather_code->code = 'clear';
            $weather_code->name_ru = 'ясно, безоблачно';
            $weather_code->save();
        }


        if (!\App\Models\WeatherCode::where('code', 'mostly_clear')->first()) {
            $weather_code = new \App\Models\WeatherCode();
            $weather_code->code = 'mostly_clear';
            $weather_code->name_ru = 'небольшая, незначительная облачность';
            $weather_code->save();
        }


        if (!\App\Models\WeatherCode::where('code', 'partly_cloudy')->first()) {
            $weather_code = new \App\Models\WeatherCode();
            $weather_code->code = 'partly_cloudy';
            $weather_code->name_ru = 'переменная облачность';
            $weather_code->save();
        }


        if (!\App\Models\WeatherCode::where('code', 'mostly_cloudy')->first()) {
            $weather_code = new \App\Models\WeatherCode();
            $weather_code->code = 'mostly_cloudy';
            $weather_code->name_ru = 'значительная облачность';
            $weather_code->save();
        }


        if (!\App\Models\WeatherCode::where('code', 'overcast')->first()) {
            $weather_code = new \App\Models\WeatherCode();
            $weather_code->code = 'overcast';
            $weather_code->name_ru = 'облачно, пасмурно';
            $weather_code->save();
        }


        if (!\App\Models\WeatherCode::where('code', 'fog')->first()) {
            $weather_code = new \App\Models\WeatherCode();
            $weather_code->code = 'fog';
            $weather_code->name_ru = 'туман, дымка, мгла';
            $weather_code->save();
        }


        if (!\App\Models\WeatherCode::where('code', 'light_rain')->first()) {
            $weather_code = new \App\Models\WeatherCode();
            $weather_code->code = 'light_rain';
            $weather_code->name_ru = 'небольшой, слабый дождь';
            $weather_code->save();
        }


        if (!\App\Models\WeatherCode::where('code', 'rain')->first()) {
            $weather_code = new \App\Models\WeatherCode();
            $weather_code->code = 'rain';
            $weather_code->name_ru = 'дождь';
            $weather_code->save();
        }


        if (!\App\Models\WeatherCode::where('code', 'heavy_rain')->first()) {
            $weather_code = new \App\Models\WeatherCode();
            $weather_code->code = 'heavy_rain';
            $weather_code->name_ru = 'сильный, ливневый дождь';
            $weather_code->save();
        }


        if (!\App\Models\WeatherCode::where('code', 'thunderstorm')->first()) {
            $weather_code = new \App\Models\WeatherCode();
            $weather_code->code = 'thunderstorm';
            $weather_code->name_ru = 'гроза';
            $weather_code->save();
        }


        if (!\App\Models\WeatherCode::where('code', 'light_sleet')->first()) {
            $weather_code = new \App\Models\WeatherCode();
            $weather_code->code = 'light_sleet';
            $weather_code->name_ru = 'небольшие, слабые осадки (дождь, снег)';
            $weather_code->save();
        }


        if (!\App\Models\WeatherCode::where('code', 'sleet')->first()) {
            $weather_code = new \App\Models\WeatherCode();
            $weather_code->code = 'sleet';
            $weather_code->name_ru = 'осадки (дождь, снег)';
            $weather_code->save();
        }


        if (!\App\Models\WeatherCode::where('code', 'heavy_sleet')->first()) {
            $weather_code = new \App\Models\WeatherCode();
            $weather_code->code = 'heavy_sleet';
            $weather_code->name_ru = 'сильные осадки (дождь, снег)';
            $weather_code->save();
        }


        if (!\App\Models\WeatherCode::where('code', 'light_snow')->first()) {
            $weather_code = new \App\Models\WeatherCode();
            $weather_code->code = 'light_snow';
            $weather_code->name_ru = 'небольшой, слабый снег';
            $weather_code->save();
        }


        if (!\App\Models\WeatherCode::where('code', 'snow')->first()) {
            $weather_code = new \App\Models\WeatherCode();
            $weather_code->code = 'snow';
            $weather_code->name_ru = 'снег';
            $weather_code->save();
        }


        if (!\App\Models\WeatherCode::where('code', 'heavy-snow')->first()) {
            $weather_code = new \App\Models\WeatherCode();
            $weather_code->code = 'heavy-snow';
            $weather_code->name_ru = 'сильный снег';
            $weather_code->save();
        }
    }
}
