<?php

namespace App\Classes;

use App\Models\Accuweather;
use App\Models\Aerisweather;
use App\Models\DarkSky;
use App\Models\OpenWeather;
use App\Models\UzHydromet;
use App\Models\WeatherBit;
use Carbon\Carbon;
use http\Env\Request;
use Illuminate\Support\Facades\Http;
use phpDocumentor\Reflection\Types\This;

class Services
{


    public static $regions = [
        'tashkent',
        'andijan',
        'bukhara',
        'jizzakh',
        'qarshi',
        'navoiy',
        'namangan',
        'samarkand',
        'termez',
        'gulistan',
        'nurafshon',
        'fergana',
        'urgench',
        'nukus'
    ];

    public static $locations = [
        719862,
        351828,
        352479,
        348390,
        350541,
        355115,
        355095,
        355776,
        356042,
        355934,
        356228,
        353238,
        356378,
        355666
    ];

    public static $geolocation = [
        ['lat' => 41.26465, 'lon' => 69.21627],
        ['lat' => 40.78206, 'lon' => 72.34424],
        ['lat' => 39.77472, 'lon' => 64.42861],
        ['lat' => 40.11583, 'lon' => 67.84222],
        ['lat' => 38.86056, 'lon' => 65.78905],
        ['lat' => 40.08444, 'lon' => 65.37917],
        ['lat' => 40.9983, 'lon' => 71.67257],
        ['lat' => 39.65417, 'lon' => 66.95972],
        ['lat' => 37.22417, 'lon' => 67.27833],
        ['lat' => 40.491509, 'lon' => 68.781077],
        ['lat' => 41.166666, 'lon' => 69.749997],
        ['lat' => 40.38421, 'lon' => 71.78432],
        ['lat' => 41.55, 'lon' => 60.63333],
        ['lat' => 42.4530, 'lon' => 59.6102],
    ];

    public static $geolocation_str = [
        '41.26465, 69.21627',
        '40.78206, 72.34424',
        '39.77472, 64.42861',
        '40.11583, 67.84222',
        '38.86056, 65.78905',
        '40.08444, 65.37917',
        '40.9983, 71.67257',
        '39.65417, 66.95972',
        '37.22417, 67.27833',
        '40.491509, 68.781077',
        '41.166666, 69.749997',
        '40.38421, 71.78432',
        '41.55, 60.63333',
        '42.4530, 59.6102',
    ];


    public static function OpenWeather()
    {
        foreach (self::$regions as $region) {
            $services = Http::get('http://api.openweathermap.org/data/2.5/forecast', [
                'q' => $region,
                'appid' => '3b7367c71902cdb4229175c9aa4113ee',
                'units' => 'metric'
            ])->json()['list'];

            foreach ($services as $key => $service) {
                if (!OpenWeather::where('datetime', $service['dt_txt'])->where('region', $region)->first()) {
                    $openweather = new OpenWeather();
                    $openweather->region = $region;
                    $openweather->datetime = $service['dt_txt'];
                    $openweather->date = $service['dt_txt'];
                    $openweather->temp = round($service['main']['temp']);
                    $openweather->temp_min = round($service['main']['temp_min']);
                    $openweather->temp_max = round($service['main']['temp_max']);
                    $openweather->wind_speed = round($service['wind']['speed']);
                    $openweather->wind_deg = round($service['wind']['deg']);
                    $openweather->wind_gust = round($service['wind']['gust']);
                    if (isset($service['rain']))
                        $openweather->is_rain = true;
                    $openweather->save();
                }
            }
        }
    }

    public static function Accuweather()
    {
        foreach (self::$locations as $key => $location) {
            $services = Http::get('http://dataservice.accuweather.com/forecasts/v1/daily/5day/' . $location, [
                'apikey' => '9r5K2d9cY9TVWeTrSQyAXupIAHD8VE8V',
                'language' => 'Ru-ru',
                'metric' => "true",
                'details' => "true"
            ]);

            foreach ($services['DailyForecasts'] as $service) {
                if (!Accuweather::where('day_wind_speed', null)->where('datetime', Carbon::parse($service['Date']))->where('region', self::$regions[$key])->first()) {
                    $accuweather = new Accuweather();
                    $accuweather->datetime = Carbon::parse($service['Date']);
                    $accuweather->date = Carbon::parse($service['Date']);
                    $accuweather->region = self::$regions[$key];
                    $accuweather->temp_min = round($service['Temperature']['Minimum']['Value']);
                    $accuweather->temp_max = round($service['Temperature']['Maximum']['Value']);
                    $accuweather->day_wind_speed = round($service['Day']['Wind']['Speed']['Value']);
                    $accuweather->day_wind_deg = $service['Day']['Wind']['Direction']['Degrees'];
                    $accuweather->day_wind_localized = $service['Day']['Wind']['Direction']['Localized'];
                    $accuweather->day_wind_gust = $service['Day']['WindGust']['Speed']['Value'];
                    if ($service['Day']['Rain']['Value'] > 0)
                        $accuweather->day_rain = true;
                    $accuweather->save();
                }
            }
//            foreach ($services['DailyForecasts'] as $service) {
//                if (!Accuweather::where('night_wind_speed', null)->where('datetime', Carbon::parse($service['Date']))->where('region', self::$regions[$key])->first()) {
//                    $accuweather = new Accuweather();
//                    $accuweather->datetime = Carbon::parse($service['Date']);
//                    $accuweather->date = Carbon::parse($service['Date']);
//                    $accuweather->region = self::$regions[$key];
//                    $accuweather->temp_min = round($service['Temperature']['Minimum']['Value']);
//                    $accuweather->temp_max = round($service['Temperature']['Maximum']['Value']);
//                    $accuweather->night_wind_speed = round($service['Night']['Wind']['Speed']['Value']);
//                    $accuweather->night_wind_deg = $service['Night']['Wind']['Direction']['Degrees'];
//                    $accuweather->night_wind_localized = $service['Night']['Wind']['Direction']['Localized'];
//                    $accuweather->night_wind_gust = $service['Night']['WindGust']['Speed']['Value'];
//                    if ($service['Night']['Rain']['Value'] > 0)
//                        $accuweather->night_rain = true;
//                    $accuweather->save();
//                }
//            }

        }


    }

    public static function GetUzhydromet()
    {
        foreach (self::$regions as $region) {
            $services = Http::withOptions([
                'verify' => false
            ])->get('https://www.meteo.uz/index.php/forecast/city', [
                'city' => $region
            ])->json();

            foreach ($services as $service) {
                if (!UzHydromet::where('service_id', $service['id'])->first()) {
                    $uzhdyromet = new UzHydromet();
                    $uzhdyromet->region = $region;
                    $uzhdyromet->service_id = $service['id'];
                    $uzhdyromet->datetime = $service['date'];
                    $uzhdyromet->date = $service['date'];
                    $uzhdyromet->air_t_min = round($service['air_t_min']);
                    $uzhdyromet->air_t_max = round($service['air_t_max']);
                    $uzhdyromet->wind_direction = $service['wind_direction'];
                    $uzhdyromet->wind_speed_min = round($service['wind_speed_min']);
                    $uzhdyromet->wind_speed_max = round($service['wind_speed_max']);
                    $uzhdyromet->day_part = $service['day_part'];
                    if ($service['precipitation'] != 'none')
                        $uzhdyromet->precipitation = true;
                    $uzhdyromet->save();
                }

            }

        }

    }

    public static function WeatherBit()
    {


        foreach (self::$geolocation as $key => $geo) {
            $services = Http::withOptions([
                'verify' => false
            ])->withHeaders([
                'x-rapidapi-host' => 'weatherbit-v1-mashape.p.rapidapi.com',
                'x-rapidapi-key' => '6cf743554dmsh3b4a43f2fe721bcp182316jsn234c801f7093'
            ])->get('https://weatherbit-v1-mashape.p.rapidapi.com/forecast/daily', $geo)->json();


            foreach ($services['data'] as $service) {
                if (!WeatherBit::where('region', self::$regions[$key])->where('datetime', Carbon::parse($service['ts']))->first()) {
                    $weatherbit = new WeatherBit();
                    $weatherbit->region = self::$regions[$key];
                    $weatherbit->datetime = Carbon::parse($service['ts']);
                    $weatherbit->date = Carbon::parse($service['ts']);
                    $weatherbit->min_temp = round($service['min_temp']);
                    $weatherbit->max_temp = round($service['max_temp']);
                    $weatherbit->wind_dir = round($service['wind_dir']);
                    $weatherbit->wind_spd = round($service['wind_spd']);
                    $weatherbit->wind_cdir = $service['wind_cdir'];
                    if ($service['precip'] != 0)
                        $weatherbit->precip = true;
                    $weatherbit->save();
                }

            }
        }
    }

    public static function GetDarkSky()
    {
        foreach (self::$geolocation_str as $key => $geo) {

            $services = Http::withOptions([
                'verify' => false
            ])->withHeaders([
                'x-rapidapi-host' => 'dark-sky.p.rapidapi.com',
                'x-rapidapi-key' => '6cf743554dmsh3b4a43f2fe721bcp182316jsn234c801f7093'
            ])->get('https://dark-sky.p.rapidapi.com/' . $geo, [
                'lang' => 'RU',
                'units' => 'auto',
            ])->json()['daily']['data'];

            foreach ($services as $service) {
                if (!DarkSky::where('region', self::$regions[$key])->where('datetime', Carbon::parse($service['time']))->first()) {
                    $darksky = new DarkSky();
                    $darksky->region = self::$regions[$key];
                    $darksky->datetime = Carbon::parse($service['time']);
                    $darksky->date = Carbon::parse($service['time']);
                    $darksky->temperatureMin = round($service['temperatureMin']);
                    $darksky->temperatureMax = round($service['temperatureMax']);
                    $darksky->windSpeed = round($service['windSpeed']);
                    if ($service['precipIntensityMax'] > 0)
                        $darksky->precipIntensityMax = true;
                    $darksky->save();
                }

            }
        }
    }

    public static function GetAerisweather()
    {
        foreach (self::$geolocation_str as $key => $geo) {
            $services = Http::withOptions([
                'verify' => false
            ])->withHeaders([
                'x-rapidapi-host' => 'aerisweather1.p.rapidapi.com',
                'x-rapidapi-key' => '6cf743554dmsh3b4a43f2fe721bcp182316jsn234c801f7093'
            ])->get('https://aerisweather1.p.rapidapi.com/forecasts/' . $geo)->json();
            foreach ($services['response'][0]['periods'] as $service) {
                if (!Aerisweather::where('region', self::$regions[$key])->where('datetime', Carbon::parse($service['timestamp']))->first()) {
                    $aeriswether = new Aerisweather();
                    $aeriswether->region = self::$regions[$key];
                    $aeriswether->datetime = Carbon::parse($service['timestamp']);
                    $aeriswether->date = Carbon::parse($service['timestamp']);
                    $aeriswether->minTempC = round($service['minTempC']);
                    $aeriswether->maxTempC = round($service['maxTempC']);
                    $aeriswether->windSpeedKTS = round($service['windSpeedKTS']);
                    $aeriswether->windDirDEG = round($service['windDirDEG']);
                    $aeriswether->windDir = $service['windDir'];
                    if ($service['precipMM'] > 0)
                        $aeriswether->precipMM = true;
                    $aeriswether->save();
                }
            }
        }

    }

    public static function getSumm($temp1, $temp2)
    {
        return $temp1 + $temp2 / 2;

    }

    public static function Delta($tem_min, $temp_max, $current)
    {

        $psumm = self::getSumm($tem_min, $temp_max);
        $temprature = abs($psumm - $current) / $current * 100;
        $result_temp = 100 - $temprature;

        return round($result_temp);
    }

    public static function CheckIsTrue()
    {
        foreach (self::$regions as $region) {
            $subopenweather = \App\Models\OpenWeather::toBase()
                ->where('region', $region)
                ->selectRaw('MAX(id) as id')
                ->wheretime('datetime', '<=', Carbon::now())
                ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
                ->groupBy('date')
                ->pluck('id')
                ->toArray();
            $openweather = \App\Models\OpenWeather::whereIn('id', $subopenweather)->first();
            $weather = Http::get('http://www.meteo.uz/api/v2/weather/current.json?city=' . $region . '&language=ru')->json();
            $openweather->temp_precent = self::Delta($openweather->temp_min, $openweather->temp_max, $weather['air_t']);
            $openweather->save();


            $subopenweather = Accuweather::toBase()
                ->selectRaw('MAX(id) as id')
                ->where('region', $region)
                ->wheretime('datetime', '<=', Carbon::now())
                ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
                ->groupBy('date')
                ->pluck('id')
                ->toArray();

            $accuweather = \App\Models\Accuweather::whereIn('id', $subopenweather)->first();
            if ($accuweather) {
                $weather = Http::get('http://www.meteo.uz/api/v2/weather/current.json?city=' . $region . '&language=ru')->json();
                $accuweather->temp_precent = self::Delta($accuweather->temp_min, $accuweather->temp_max, $weather['air_t']);
                $accuweather->save();
            }


            $subopenweather = UzHydromet::toBase()
                ->selectRaw('MAX(id) as id')
                ->where('region', $region)
                ->where('day_part', 'day')
                ->wheretime('datetime', '<=', Carbon::now())
                ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
                ->groupBy('date')
                ->pluck('id')
                ->toArray();
            $gidromet = \App\Models\UzHydromet::whereIn('id', $subopenweather)->first();

            if ($gidromet) {
                $weather = Http::get('http://www.meteo.uz/api/v2/weather/current.json?city=' . $region . '&language=ru')->json();
                $gidromet->temp_precent = self::Delta($gidromet->air_t_min, $gidromet->air_t_max, $weather['air_t']);
                $gidromet->save();
            }


            $subopenweather = WeatherBit::toBase()
                ->selectRaw('MAX(id) as id')
                ->where('region', $region)
                ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
                ->groupBy('date')
                ->pluck('id')
                ->toArray();
            $weatherbit = \App\Models\WeatherBit::whereIn('id', $subopenweather)->first();
            if($weatherbit)
            {
                $weather = Http::get('http://www.meteo.uz/api/v2/weather/current.json?city=' . $region . '&language=ru')->json();
                $weatherbit->temp_precent = self::Delta($weatherbit->min_temp, $weatherbit->max_temp, $weather['air_t']);
                $weatherbit->save();
            }



            $subopenweather = \App\Models\DarkSky::toBase()
                ->selectRaw('MAX(id) as id')
                ->where('region', $region)
                ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
                ->groupBy('date')
                ->pluck('id')
                ->toArray();;
            $darksky = \App\Models\DarkSky::whereIn('id', $subopenweather)->first();
            if($darksky)
            {
                $weather = Http::get('http://www.meteo.uz/api/v2/weather/current.json?city=' . $region . '&language=ru')->json();
                $darksky->temp_precent = self::Delta($darksky->temperatureMin, $darksky->temperatureMax, $weather['air_t']);
                $darksky->save();

            }


            $subopenweather = \App\Models\Aerisweather::toBase()
                ->selectRaw('MAX(id) as id')
                ->where('region', $region)
                ->wheretime('datetime', '<=', Carbon::now())
                ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
                ->groupBy('date')
                ->pluck('id')
                ->toArray();
            $aerisweather = \App\Models\Aerisweather::whereIn('id', $subopenweather)->first();
            if($aerisweather)
            {
                $weather = Http::get('http://www.meteo.uz/api/v2/weather/current.json?city=' . $region . '&language=ru')->json();
                $aerisweather->temp_precent = self::Delta($aerisweather->minTempC, $aerisweather->maxTempC, $weather['air_t']);
                $aerisweather->save();
            }

        }

//        return $openweather;

    }
}
