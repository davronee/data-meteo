<?php

namespace App\Console\Commands;

use App\Models\Meteo;
use App\Models\WeatherRegions;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class getMeteo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meteo:get';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $regions = WeatherRegions::all();


        foreach ($regions as $item)
        {
            $get_meteo = Http::get('http://www.meteo.uz/api/v2/weather/current.json?city='.$item->code.'&language=ru');
            $weather = $get_meteo->json();


            $meteo = new Meteo();
            $meteo->_id = $weather['id'];
            $meteo->city_id = $weather['city_id'];
            $meteo->datetime = $weather['datetime'];
            $meteo->cloud_amount = $weather['cloud_amount'];
            $meteo->air_t = $weather['air_t'];
            $meteo->meteors = $weather['meteors'];
            $meteo->weather_code = $weather['weather_code'];
            $meteo->datetime_ms = $weather['datetime_ms'];
            $meteo->region_id = $weather['city']['region_id'];
            $meteo->city_name = $weather['city']['name'];
            $meteo->is_regional_center = $weather['city']['is_regional_center'];
            $meteo->latitude = $weather['city']['latitude'];
            $meteo->longitude = $weather['city']['longitude'];
            $meteo->has_climatic_data = $weather['city']['has_climatic_data'];
            $meteo->has_data = $weather['city']['has_data'];
            $meteo->is_visible = $weather['city']['is_visible'];
            $meteo->title = $weather['city']['title'];
            $meteo->time_of_day = $weather['time_of_day'];
            $meteo->save();
        }

    }
}
