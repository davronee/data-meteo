<?php

namespace App\Http\Controllers\API;

use App\Classes\Services;
use App\Http\Controllers\Controller;
use App\Models\WeatherRegions;
use DiDom\Document;
use Illuminate\Support\Facades\Http;


class DirectoryController extends Controller
{
    public function regions()
    {
        $regions = WeatherRegions::all();
        return response()->json($regions);
    }

    public function regionsWithWeather()
    {
        $regions = WeatherRegions::all();
        $arr = [];
        foreach ($regions as $item) {
            $weather = Services::GetAwsByRegion($item->regionid);
            array_push($arr, $weather->original);
        }
        return response()->json($arr);
    }

    public function uzhydromet($regionid, $days)
    {
        $array = array();
        $uzhydromet = Http::withOptions([
            'verify' => false
        ])->get('https://meteoapi.meteo.uz/api/weather/forecast/' . $regionid);


        foreach ($uzhydromet->json() as $item) {

            if (!isset($array[$item['date']])) $array[$item['date']] = [];
            array_push($array[$item['date']], $item);
//                    }
        }
        return response()->json(array_reverse($array));
    }

    public function gismeteo($regionid, $days)
    {
        switch ($regionid) {
            case 1726:
                $document = new Document('https://www.gismeteo.ru/weather-tashkent-5331/2-weeks/', true);
                break;
            case 1727:
                $document = new Document('https://www.gismeteo.ru/weather-nurafshon-322140/2-weeks/', true);
                break;
            case 1703:
                $document = new Document('https://www.gismeteo.ru/weather-andizan-5333/2-weeks/', true);
                break;
            case 1706:
                $document = new Document('https://www.gismeteo.ru/weather-buhara-5348/2-weeks/', true);
                break;
            case 1730:
                $document = new Document('https://www.gismeteo.ru/weather-farghona-5345/2-weeks/', true);
                break;
            case 1708:
                $document = new Document('https://www.gismeteo.ru/weather-zhizaq-5336/2-weeks/', true);
                break;
            case 1733:
                $document = new Document('https://www.gismeteo.ru/weather-urgench-5329/2-weeks/', true);
                break;
            case 1714:
                $document = new Document('https://www.gismeteo.ru/weather-namangan-5342/2-weeks/', true);
                break;
            case 1712:
                $document = new Document('https://www.gismeteo.ru/weather-navoi-5335/2-weeks/', true);
                break;
            case 1710:
                $document = new Document('https://www.gismeteo.ru/weather-karshi-5356/2-weeks/', true);
                break;
            case 1735:
                $document = new Document('https://www.gismeteo.ru/weather-nukus-5323/2-weeks/', true);
                break;
            case 1718:
                $document = new Document('https://www.gismeteo.ru/weather-samarkand-5350/2-weeks/', true);
                break;
            case 1724:
                $document = new Document('https://www.gismeteo.ru/weather-guliston-322139/2-weeks/', true);
                break;
            case 1722:
                $document = new Document('https://www.gismeteo.ru/weather-termez-5368/2-weeks/', true);
                break;
            default:
                $document = new Document('https://www.gismeteo.ru/weather-tashkent-5331/2-weeks/', true);
                break;
        }
        $temps_max = $document->find('.maxt .unit_temperature_c');
        $temps_min = $document->find('.mint .unit_temperature_c');
        $dates = $document->find('.widget-weather .date');
        $weather_desc = $document->find('.widget-weather .widget-row-icon .weather-icon');
        $weather_wind_min = $document->find('.widget-days .widget-items .widget-row-wind-speed  .unit_wind_m_s');
        $weather_wind_max = $document->find('.widget-wind .widget-items .widget-row-wind-gust .row-item .unit_wind_m_s');
        $weather_wind_direction = $document->find('.widget-days .widget-items .widget-row-wind-direction .direction');
        $weather_osadka = $document->find('.widget-row-precipitation-bars .row-item .item-unit');

        $array = [];

        foreach ($weather_wind_min as $key => $weather) {
            $weather = [
                'dates' => isset($dates[$key]) ? $dates[$key]->text() : null,
                'temp_min' => isset($temps_min[$key]) ? $temps_min[$key]->text() : null,
                'temp_max' => isset($temps_max[$key]) ? $temps_max[$key]->text() : null,
                'wind_speed_min' => isset($weather_wind_min[$key]) ? $weather_wind_min[$key]->text() : null,
                'wind_speed_max' => isset($weather_wind_max[$key]) ? $weather_wind_max[$key]->text() : null,
                'wind_direction' => isset($weather_wind_direction[$key]) ? $weather_wind_direction[$key]->text() : null,
                'precipitation' => isset($weather_osadka[$key]) ? $weather_osadka[$key]->text() : null,
                'description' => isset($weather_desc[$key]) ? $weather_desc[$key]->getAttribute('data-text') : null,
            ];
            array_push($array, $weather);
        }


        return response()->json(array_splice($array,0,5));
    }

    public function yandexweather($regionid, $days)
    {

//        $document = new Document('https://yandex.uz/pogoda/tashkent?lat=41.311151&lon=69.279737', true);
//        $dates = $document->find('.swiper-wrapper .forecast-briefly__day .forecast-briefly__name');
//        $temp_day = $document->find('.swiper-wrapper .forecast-briefly__day .forecast-briefly__temp_day .temp__value_with-unit');
//        $temp_night = $document->find('.swiper-wrapper .forecast-briefly__day .forecast-briefly__temp_night .temp__value_with-unit');
//
//        $table = $document->find('.card');
//
//        foreach ($table as $item) {
//            echo $item->html() . '<br>';
//        }

//        foreach ($dates as $key => $date) {
//            if($key != 0)
//            echo $date->text().'<br>';
//        }

//        foreach ($temp_day as $key => $day) {
//            if($key != 0)
//                echo $day->text().'<br>';
//        }

//        foreach ($temp_night as $key => $night) {
//            if($key != 0)
//                echo $night->text().'<br>';
//        }

        $lat = '';
        $lot = '';

        switch ($regionid) {
            case 1726:
                $lat = 41.26465;
                $lot = 69.21627;
                break;
            case 1727:
                $lat = '';
                $lot = '';
                break;
            case 1703:
                $lat = 41.166666;
                $lot = 69.749997;
                break;
            case 1706:
                $lat = 39.77472;
                $lot = 64.42861;
                break;
            case 1730:
                $lat = 40.38421;
                $lot = 71.78432;
                break;
            case 1708:
                $lat = 40.11583;
                $lot = 67.84222;
                break;
            case 1733:
                $lat = 41.55;
                $lot = 60.63333;
                break;
            case 1714:
                $lat = 40.9983;
                $lot = 71.67257;
                break;
            case 1712:
                $lat = 40.08444;
                $lot = 65.37917;
                break;
            case 1710:
                $lat = 38.86056;
                $lot = 65.78905;
                break;
            case 1735:
                $lat = 42.45306;
                $lot = 59.6102;
                break;
            case 1718:
                $lat = 39.65417;
                $lot = 66.95972;
                break;
            case 1724:
                $lat = 40.491509;
                $lot = 68.781077;
                break;
            case 1722:
                $lat = 37.22417;
                $lot = 67.27833;
                break;
            default:
                $lat = 41.26465;
                $lot = 69.21627;
                break;
        }

        $yandexweather = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'X-Yandex-API-Key' => 'd041e185-8bc1-490f-8af1-78f0c7267786'
        ])->get('https://api.weather.yandex.ru/v1/forecast', [
            'lat' => $lat,
            'lon' => $lot,
            'limit' => '7',
            'hours' => 'false',
            'extra' => 'true',
            'lang' => 'uz_UZ',
        ])->json();

        return response()->json(array_splice($yandexweather['forecasts'],0,5));
    }


    public function Accuweather($regionid, $days)
    {
        $loc = 0;
        switch ($regionid) {
            case 1726:
                $loc = 719862;
                break;
            case 1703:
                $loc = 351828;
                break;
            case 1706:
                $loc = 352479;
                break;
            case 1708:
                $loc = 348390;
                break;
            case 1710:
                $loc = 350541;
                break;
            case 1712:
                $loc = 355115;
                break;
            case 1714:
                $loc = 355095;
                break;
            case 1718:
                $loc = 355776;
                break;
            case 1722:
                $loc = 356042;
                break;
            case 1724:
                $loc = 355934;
                break;
            case 1727:
                $loc = 356228;
                break;
            case 1730:
                $loc = 353238;
                break;
            case 1733:
                $loc = 356378;
                break;
            case 1735:
                $loc = 355666;
                break;


        }

        $services = Http::get('http://dataservice.accuweather.com/forecasts/v1/daily/5day/' . $loc, [
            'apikey' => '9r5K2d9cY9TVWeTrSQyAXupIAHD8VE8V',
            'language' => 'Ru-ru',
            'metric' => "true",
            'details' => "true"
        ]);

        return response()->json($services->json()['DailyForecasts']);

    }
}
