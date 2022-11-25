<?php

namespace App\Classes;

use App\Models\Accuweather;
use App\Models\Aerisweather;
use App\Models\DarkSky;
use App\Models\OpenWeather;
use App\Models\UzHydromet;
use App\Models\WeatherApi;
use App\Models\WeatherBit;
use App\Models\WeatherRegions;
use Carbon\Carbon;
use Illuminate\Support\Env;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class Services
{

    public $endpointhoriba = 'https://ecoweb.meteo.uz/api/database/averages/GetAverages/';
    public $horibaData = null;
    public $meteobotData = null;
    public $dataArray = [];

    protected $apiToken = "1431648419:AAHns8IHW3T0HJMwOyFWL_pdrtB0CMEZ1rQ";
    protected $ChatId = '-1001426573564';

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

    public static $WeatherApiEnpoint = 'https://api.weather.com/v3/wx/forecast/daily/5day';
    public static $WeatherApiToken = '1ee695f625b44d48a695f625b41d48b8';

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
                if (!Accuweather::where('datetime', Carbon::parse($service['Date']))->where('region', self::$regions[$key])->first()) {
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

                UzHydromet::updateOrCreate(
                    ['service_id' => $service['id']],
                    [
                        'region' => $region,
                        'service_id' => $service['id'],
                        'datetime' => $service['date'],
                        'date' => $service['date'],
                        'air_t_min' => round($service['air_t_min']),
                        'air_t_max' => round($service['air_t_max']),
                        'wind_direction' => $service['wind_direction'],
                        'wind_speed_min' => round($service['wind_speed_min']),
                        'wind_speed_max' => round($service['wind_speed_max']),
                        'day_part' => $service['day_part'],
                        'precipitation' => $service['precipitation'] != 'none' && $service['precipitation'] != 'fog' ? true : false,
                    ]
                );

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
        return ($temp1 + $temp2) / 2;

    }

    public static function Delta($tem_min, $temp_max, $current)
    {
        $tem_min = round($tem_min);
        $temp_max = round($temp_max);
        $current = round($current);

        if ($current < $tem_min) {
            $result_temp = abs(abs(($tem_min - $current) / (self::getSumm($tem_min, $temp_max) - $current)) * 100 - 100);
        } else if ($current >= $tem_min && $current <= $temp_max) {
            $result_temp = 100;
        } else if ($current > $temp_max) {
            $result_temp = abs(abs(($temp_max - $current) / (self::getSumm($tem_min, $temp_max) - $current)) * 100 - 100);
        }

//        $psumm = self::getSumm($tem_min, $temp_max);
//        $temprature = ($psumm - $current) / $current * 100;
//        $result_temp = 100 - abs($temprature);

        return round($result_temp);
    }

    public static function CheckIsTrue()
    {
        foreach (self::$regions as $region) {
//            $subopenweather = \App\Models\OpenWeather::toBase()
//                ->where('region', $region)
//                ->selectRaw('MAX(id) as id')
//                ->wheretime('datetime', '<=', Carbon::now())
//                ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
//                ->groupBy('date')
//                ->pluck('id')
//                ->toArray();
//            $openweather = \App\Models\OpenWeather::whereIn('id', $subopenweather)->first();
//            $weather = Http::get('http://www.meteo.uz/api/v2/weather/current.json?city=' . $region . '&language=ru')->json();
//            $openweather->temp_precent = self::Delta($openweather->temp_min, $openweather->temp_max, $weather['air_t']);
//            $openweather->factik = $weather['air_t'];
//            $openweather->save();

            $weather = Http::get('http://www.meteo.uz/api/v2/weather/current.json?city=' . $region . '&language=ru')->json();

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
                $accuweather->temp_precent = self::Delta($accuweather->temp_min, $accuweather->temp_max, $weather['air_t']);
                $accuweather->factik = $weather['air_t'];
                $accuweather->save();
            }

            $start = '07:00:00';
            $end = '18:00:00';
            $now = Carbon::now('UTC');
            $time = $now->format('H:i:s');


            $subopenweather = UzHydromet::toBase()
                ->where('region', $region)
                ->where('datetime', '=', Carbon::now()->format('Y-m-d'))
                ->pluck('id')
                ->toArray();

            $gidromet = \App\Models\UzHydromet::whereIn('id', $subopenweather)->get();
            foreach ($gidromet as $item) {
                $item->temp_precent = self::Delta($gidromet->min('air_t_min'), $gidromet->max('air_t_max'), $weather['air_t']);
                $item->factik = $weather['air_t'];
                $item->save();

            }


//            $subopenweather = WeatherBit::toBase()
//                ->selectRaw('MAX(id) as id')
//                ->where('region', $region)
//                ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
//                ->groupBy('date')
//                ->pluck('id')
//                ->toArray();
//            $weatherbit = \App\Models\WeatherBit::whereIn('id', $subopenweather)->first();
//            if ($weatherbit) {
//                $weatherbit->temp_precent = self::Delta($weatherbit->min_temp, $weatherbit->max_temp, $weather['air_t']);
//                $weatherbit->factik = $weather['air_t'];
//                $weatherbit->save();
//            }
//
//
//            $subopenweather = \App\Models\DarkSky::toBase()
//                ->selectRaw('MAX(id) as id')
//                ->where('region', $region)
//                ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
//                ->groupBy('date')
//                ->pluck('id')
//                ->toArray();;
//            $darksky = \App\Models\DarkSky::whereIn('id', $subopenweather)->first();
//            if ($darksky) {
//                $darksky->temp_precent = self::Delta($darksky->temperatureMin, $darksky->temperatureMax, $weather['air_t']);
//                $darksky->factik = $weather['air_t'];
//                $darksky->save();
//
//            }
//
//
//            $subopenweather = \App\Models\Aerisweather::toBase()
//                ->selectRaw('MAX(id) as id')
//                ->where('region', $region)
//                ->wheretime('datetime', '<=', Carbon::now())
//                ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
//                ->groupBy('date')
//                ->pluck('id')
//                ->toArray();
//            $aerisweather = \App\Models\Aerisweather::whereIn('id', $subopenweather)->first();
//            if ($aerisweather) {
//                $aerisweather->temp_precent = self::Delta($aerisweather->minTempC, $aerisweather->maxTempC, $weather['air_t']);
//                $aerisweather->factik = $weather['air_t'];
//                $aerisweather->save();
//            }

            $weatherApi = WeatherApi::where('region', $region)
                ->where('date', Carbon::now()->format("Y-m-d"))->first();
            if ($weatherApi) {
                $weatherApi->faktik = $weather['air_t'];
                $weatherApi->temp_precent = self::Delta($weatherApi->temp_min, $weatherApi->temp_max, $weather['air_t']);
                $weatherApi->save();
            }
        }
    }

    public static function GetRu($region)
    {
        switch ($region) {
            case 'tashkent':
                return 'г. Ташкент';
                break;
            case 'andijan':
                return 'Андижанская область';
                break;
            case 'bukhara':
                return 'Бухарская область';
                break;
            case 'jizzakh':
                return 'Джизакская область';
                break;
            case 'qarshi':
                return 'Кашкадарьинская область';
                break;
            case 'navoiy':
                return 'Навоийская область';
                break;
            case 'namangan':
                return 'Наманганская область';
                break;
            case 'samarkand':
                return 'Самаркандская область';
                break;
            case 'termez':
                return 'Сурхандарьинская область';
                break;
            case 'gulistan':
                return 'Сырдарьинская область';
                break;
            case 'gulistan':
                return 'Сырдарьинская область';
                break;
            case 'nurafshon':
                return 'Ташкентская область';
                break;
            case 'fergana':
                return 'Ферганская область';
                break;
            case 'urgench':
                return 'Хорезмская область';
                break;
            case 'nukus':
                return 'Республика Каракалпакстан';
                break;
        }

    }


    public static function GetReport($model, $s_hour, $f_hour, $region = 'tashkent')
    {

        if ($model == 'uz_hydromets') {
            $startDate = Carbon::now()->subHour($s_hour);
            $endDate = Carbon::now()->subHour($f_hour);
            $objects = DB::table($model)
                ->where('region', $region)
                ->whereBetween('datetime', [$endDate, $startDate])
                ->get();
        } else {
            $startDate = Carbon::now()->subHour($s_hour);
            $endDate = Carbon::now()->subHour($f_hour);
            $objects = DB::table($model)
                ->where('region', $region)
                ->whereBetween('datetime', [$endDate, $startDate])
                ->get();
        }

        $summ = 0;
        $total = 0;
        foreach ($objects as $key => $object) {
            $total += $object->temp_precent;
        }
        return $total > 0 ? round($total / count($objects)) : 0;
    }

    public static function GetReportAll($model, $s_hour, $f_hour)
    {
        $startDate = Carbon::now()->subHour($s_hour);
        $endDate = Carbon::now()->subHour($f_hour);
        $objects = DB::table($model)
            ->whereBetween('datetime', [$endDate, $startDate])
            ->get();
        $summ = 0;
        $total = 0;
        foreach ($objects as $key => $object) {
            $total += $object->temp_precent;
        }
        return $total == 0 ? 0 : round($total / count($objects));
    }

    public static function GetAwsByRegion($regionid)
    {
        $endpoint = config('app.AWS_ENDPOINT'); //env('AWS_ENDPOINT');
        $endpoint_tradional = config('app.METEOAPI_ENDPOINT');
        switch ($regionid) {
            case 1726:
                $current = Http::withBasicAuth('davronee', 'bvlgari1991')->get($endpoint . '/EnvidbCurrentDataInterface/GetCurrentDataForStationById/51/O')->json();
                $traditional = Http::withOptions([
                    'verify' => false
                ])->get($endpoint_tradional . 'api/weather/current/' . $regionid)->json();
                $cur = [
                    'title' => WeatherRegions::select('name_uz')->where('regionid', $regionid)->first()->name_uz,
                    'temp' => $current['Stations']['Sources']['Variables'][24]['Value']['Value'],
                    'min_wind' => $current['Stations']['Sources']['Variables'][18]['Value']['Value'],
                    'max_wind' => $current['Stations']['Sources']['Variables'][19]['Value']['Value'],
                    'weathercode' => $traditional['weather_code'],
                    'regionid' => $regionid
                ];
                return response()->json($cur);
            case 1735:
                $current = Http::withOptions([
                    'verify' => false
                ])->get('https://meteoapi.meteo.uz/api/weather/current/1735');
                $cur = [
                    'title' => WeatherRegions::select('name_uz')->where('regionid', $regionid)->first()->name_uz,
                    'temp' => $current->json()['air_t'],
                    'min_wind' => '-',
                    'max_wind' => '-',
                    'regionid' => $regionid,
                    'weathercode' => $current['weather_code'],
                ];
                return response()->json($cur);
            case 1703:
                $current = Http::withBasicAuth('davronee', 'bvlgari1991')->get($endpoint . '/EnvidbCurrentDataInterface/GetCurrentDataForStationById/1/O');
                $traditional = Http::withOptions([
                    'verify' => false
                ])->get($endpoint_tradional . 'api/weather/current/' . $regionid)->json();
                $cur = [
                    'title' => WeatherRegions::select('name_uz')->where('regionid', $regionid)->first()->name_uz,
                    'temp' => $current->json()['Stations']['Sources']['Variables'][24]['Value']['Value'],
                    'min_wind' => $current->json()['Stations']['Sources']['Variables'][18]['Value']['Value'],
                    'max_wind' => $current->json()['Stations']['Sources']['Variables'][19]['Value']['Value'],
                    'weathercode' => $traditional['weather_code'],
                    'regionid' => $regionid
                ];
                return response()->json($cur);
            case 1706:
                $current = Http::withBasicAuth('davronee', 'bvlgari1991')->get($endpoint . '/EnvidbCurrentDataInterface/GetCurrentDataForStationById/6/O');
                $traditional = Http::withOptions([
                    'verify' => false
                ])->get($endpoint_tradional . 'api/weather/current/' . $regionid)->json();
                $cur = [
                    'title' => WeatherRegions::select('name_uz')->where('regionid', $regionid)->first()->name_uz,
                    'temp' => $current->json()['Stations']['Sources']['Variables'][24]['Value']['Value'],
                    'min_wind' => $current->json()['Stations']['Sources']['Variables'][18]['Value']['Value'],
                    'max_wind' => $current->json()['Stations']['Sources']['Variables'][19]['Value']['Value'],
                    'weathercode' => $traditional['weather_code'],
                    'regionid' => $regionid
                ];
                return response()->json($cur);
            case 1708:
                $current = Http::withBasicAuth('davronee', 'bvlgari1991')->get($endpoint . '/EnvidbCurrentDataInterface/GetCurrentDataForStationById/60/O');
                $traditional = Http::withOptions([
                    'verify' => false
                ])->get($endpoint_tradional . 'api/weather/current/' . $regionid)->json();
                $cur = [
                    'title' => WeatherRegions::select('name_uz')->where('regionid', $regionid)->first()->name_uz,
                    'temp' => $current->json()['Stations']['Sources']['Variables'][24]['Value']['Value'],
                    'min_wind' => $current->json()['Stations']['Sources']['Variables'][18]['Value']['Value'],
                    'max_wind' => $current->json()['Stations']['Sources']['Variables'][19]['Value']['Value'],
                    'weathercode' => $traditional['weather_code'],
                    'regionid' => $regionid
                ];
                return response()->json($cur);
            case 1710:
                $current = Http::withBasicAuth('davronee', 'bvlgari1991')->get($endpoint . '/EnvidbCurrentDataInterface/GetCurrentDataForStationById/54/O');
                $traditional = Http::withOptions([
                    'verify' => false
                ])->get($endpoint_tradional . 'api/weather/current/' . $regionid)->json();
                $cur = [
                    'title' => WeatherRegions::select('name_uz')->where('regionid', $regionid)->first()->name_uz,
                    'temp' => $current->json()['Stations']['Sources']['Variables'][24]['Value']['Value'],
                    'min_wind' => $current->json()['Stations']['Sources']['Variables'][18]['Value']['Value'],
                    'max_wind' => $current->json()['Stations']['Sources']['Variables'][19]['Value']['Value'],
                    'weathercode' => $traditional['weather_code'],
                    'regionid' => $regionid
                ];
                return response()->json($cur);
            case 1712:
                $current = Http::withBasicAuth('davronee', 'bvlgari1991')->get($endpoint . '/EnvidbCurrentDataInterface/GetCurrentDataForStationById/17/O');
                $traditional = Http::withOptions([
                    'verify' => false
                ])->get($endpoint_tradional . 'api/weather/current/' . $regionid)->json();
                $cur = [
                    'title' => WeatherRegions::select('name_uz')->where('regionid', $regionid)->first()->name_uz,
                    'temp' => $current->json()['Stations']['Sources']['Variables'][24]['Value']['Value'],
                    'min_wind' => $current->json()['Stations']['Sources']['Variables'][18]['Value']['Value'],
                    'max_wind' => $current->json()['Stations']['Sources']['Variables'][19]['Value']['Value'],
                    'weathercode' => $traditional['weather_code'],
                    'regionid' => $regionid
                ];
                return response()->json($cur);
            case 1714:
                $current = Http::withOptions([
                    'verify' => false
                ])->get('https://meteoapi.meteo.uz/api/weather/current/1714');
                $traditional = Http::withOptions([
                    'verify' => false
                ])->get($endpoint_tradional . 'api/weather/current/' . $regionid)->json();
                $cur = [
                    'title' => WeatherRegions::select('name_uz')->where('regionid', $regionid)->first()->name_uz,
                    'temp' => $current->json()['air_t'],
                    'min_wind' => '-',
                    'max_wind' => '-',
                    'weathercode' => $traditional['weather_code'],
                    'regionid' => $regionid
                ];
                return response()->json($cur);
            case 1718:
                $current = Http::withBasicAuth('davronee', 'bvlgari1991')->get($endpoint . '/EnvidbCurrentDataInterface/GetCurrentDataForStationById/20/O');
                $traditional = Http::withOptions([
                    'verify' => false
                ])->get($endpoint_tradional . 'api/weather/current/' . $regionid)->json();
                $cur = [
                    'title' => WeatherRegions::select('name_uz')->where('regionid', $regionid)->first()->name_uz,
                    'temp' => $current->json()['Stations']['Sources']['Variables'][24]['Value']['Value'],
                    'min_wind' => $current->json()['Stations']['Sources']['Variables'][18]['Value']['Value'],
                    'max_wind' => $current->json()['Stations']['Sources']['Variables'][19]['Value']['Value'],
                    'weathercode' => $traditional['weather_code'],
                    'regionid' => $regionid
                ];
                return response()->json($cur);
            case 1722:
                $current = Http::withBasicAuth('davronee', 'bvlgari1991')->get($endpoint . '/EnvidbCurrentDataInterface/GetCurrentDataForStationById/25/O');
                $traditional = Http::withOptions([
                    'verify' => false
                ])->get($endpoint_tradional . 'api/weather/current/' . $regionid)->json();
                $cur = [
                    'title' => WeatherRegions::select('name_uz')->where('regionid', $regionid)->first()->name_uz,
                    'temp' => $current->json()['Stations']['Sources']['Variables'][24]['Value']['Value'],
                    'min_wind' => $current->json()['Stations']['Sources']['Variables'][18]['Value']['Value'],
                    'max_wind' => $current->json()['Stations']['Sources']['Variables'][19]['Value']['Value'],
                    'weathercode' => $traditional['weather_code'],
                    'regionid' => $regionid
                ];
                return response()->json($cur);
            case 1724:
                $current = Http::withBasicAuth('davronee', 'bvlgari1991')->get($endpoint . '/EnvidbCurrentDataInterface/GetCurrentDataForStationById/26/O');
                $traditional = Http::withOptions([
                    'verify' => false
                ])->get($endpoint_tradional . 'api/weather/current/' . $regionid)->json();
                $cur = [
                    'title' => WeatherRegions::select('name_uz')->where('regionid', $regionid)->first()->name_uz,
                    'temp' => $current->json()['Stations']['Sources']['Variables'][24]['Value']['Value'],
                    'min_wind' => $current->json()['Stations']['Sources']['Variables'][18]['Value']['Value'],
                    'max_wind' => $current->json()['Stations']['Sources']['Variables'][19]['Value']['Value'],
                    'weathercode' => $traditional['weather_code'],
                    'regionid' => $regionid
                ];
                return response()->json($cur);
            case 1727:
                $current = Http::withBasicAuth('davronee', 'bvlgari1991')->get($endpoint . '/EnvidbCurrentDataInterface/GetCurrentDataForStationById/42/O');
                $traditional = Http::withOptions([
                    'verify' => false
                ])->get($endpoint_tradional . 'api/weather/current/' . $regionid)->json();
                $cur = [
                    'title' => WeatherRegions::select('name_uz')->where('regionid', $regionid)->first()->name_uz,
                    'temp' => $current->json()['Stations']['Sources']['Variables'][24]['Value']['Value'],
                    'min_wind' => $current->json()['Stations']['Sources']['Variables'][18]['Value']['Value'],
                    'max_wind' => $current->json()['Stations']['Sources']['Variables'][19]['Value']['Value'],
                    'weathercode' => $traditional['weather_code'],
                    'regionid' => $regionid
                ];
                return response()->json($cur);
            case 1730:
                $current = Http::withBasicAuth('davronee', 'bvlgari1991')->get($endpoint . '/EnvidbCurrentDataInterface/GetCurrentDataForStationById/43/O');
                $traditional = Http::withOptions([
                    'verify' => false
                ])->get($endpoint_tradional . 'api/weather/current/' . $regionid)->json();
                $cur = [
                    'title' => WeatherRegions::select('name_uz')->where('regionid', $regionid)->first()->name_uz,
                    'temp' => $current->json()['Stations']['Sources']['Variables'][24]['Value']['Value'],
                    'min_wind' => $current->json()['Stations']['Sources']['Variables'][18]['Value']['Value'],
                    'max_wind' => $current->json()['Stations']['Sources']['Variables'][19]['Value']['Value'],
                    'weathercode' => $traditional['weather_code'],
                    'regionid' => $regionid
                ];
                return response()->json($cur);
            case 1733:
                $current = Http::withBasicAuth('davronee', 'bvlgari1991')->get($endpoint . '/EnvidbCurrentDataInterface/GetCurrentDataForStationById/49/O');
                $traditional = Http::withOptions([
                    'verify' => false
                ])->get($endpoint_tradional . 'api/weather/current/' . $regionid)->json();
                $cur = [
                    'title' => WeatherRegions::select('name_uz')->where('regionid', $regionid)->first()->name_uz,
                    'temp' => $current->json()['Stations']['Sources']['Variables'][24]['Value']['Value'],
                    'min_wind' => $current->json()['Stations']['Sources']['Variables'][18]['Value']['Value'],
                    'max_wind' => $current->json()['Stations']['Sources']['Variables'][19]['Value']['Value'],
                    'weathercode' => $traditional['weather_code'],
                    'regionid' => $regionid
                ];
                return response()->json($cur);
        }
    }

    public static function GetWeatherApi()
    {
        foreach (self::$geolocation as $regKey => $item) {
            $forecasts = Http::withOptions([
                'verify' => false
            ])->get(self::$WeatherApiEnpoint, [
                'geocode' => $item['lat'] . ',' . $item['lon'],
                'format' => 'json',
                'units' => 'm',
                'language' => 'ru-Ru',
                'apiKey' => '1ee695f625b44d48a695f625b41d48b8',
            ])->json();
            $index = 1;
            foreach ($forecasts['validTimeLocal'] as $key => $forecast) {
                if (!WeatherApi::where('region', self::$regions[$regKey])->where('date', Carbon::parse($forecast)->format('Y-m-d'))->first()) {
                    $weatherApi = new WeatherApi();
                    $weatherApi->region = self::$regions[$regKey];
                    $weatherApi->datetime = Carbon::parse($forecast);
                    $weatherApi->date = Carbon::parse($forecast)->format('Y-m-d');
                    $weatherApi->temp_min = $forecasts['temperatureMin'][$key];
                    $weatherApi->temp_max = $forecasts['temperatureMax'][$key];
                    $weatherApi->dayOfWeek = $forecasts['dayOfWeek'][$key];
                    $weatherApi->precipChance = $forecasts['daypart'][0]['precipChance'][$index];
                    $weatherApi->precipType = $forecasts['daypart'][0]['precipType'][$index];
                    $weatherApi->relativeHumidity = $forecasts['daypart'][0]['relativeHumidity'][$index];
                    $weatherApi->windDirection = $forecasts['daypart'][0]['windDirection'][$index];
                    $weatherApi->windDirectionCardinal = $forecasts['daypart'][0]['windDirectionCardinal'][$index];
                    $weatherApi->windSpeed = $forecasts['daypart'][0]['windSpeed'][$index];
                    $index += 2;
                    $weatherApi->save();
                }
            }
        }
    }

    public function GetHoribaAvarage()
    {
        $arr = [];

        $data = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'WebOneLocale' => 'ru-RU',
        ])->withOptions([
            'verify' => false
        ])->get($this->endpointhoriba, [
            'timeZoneId' => 'Pakistan Standard Time',
            'repositoryName' => 'Main',
            'rowLimit' => 4000,
            'beginTime' => Carbon::now()->format('Y-m-d') . 'T00:00:00',
            'endTime' => Carbon::now()->addDays(1)->format('Y-m-d') . 'T00:00:00',
            'dateTimeRangeLength' => 1,
            'dateTimeRangeLengthUnit' => 'Hours',
            'unit' => 'h',
            'dateTimeRange' => 'Fixed',
            'pointId[]' => 1,
            'type' => 'LongTerm',
            'stationId[]' => 1,
            'componentId[]' => '26,28',
        ]);

        foreach ($data->json() as $item) {
            if (\Carbon\Carbon::parse($item['EndTime'])->format('i') == '00') {
                array_push($arr, $item);
            }
        }
        $this->horibaData = $arr;

        return $this->horibaData;
    }

    public function GetMeteoBot()
    {
        $meteobot = Http::withOptions([
            'verify' => false
        ])->withBasicAuth(3231343030303336, 'k8hwRivdex7hr_5tc')->
        get('https://export.meteobot.com/v2/Generic/Index', [
            'id' => 22070082,//'3231343030303336',
            'startDate' => Carbon::now()->format('Y-m-d'),
            'endDate' => Carbon::now()->addDays(1)->format('Y-m-d'),
        ]);
        $this->meteobotData = $meteobot->body();
        $arr = [];
        $acctArr = explode("\r", $meteobot);
        foreach ($acctArr as $key => $item) {
            if ($key != 0) {
                $value = "";
                if ($item != "\n") {
                    $value = str_getcsv($item, ';');
                    array_push($this->dataArray, [$value[1] . ' ' . $value[2], $value[13], 'PM10']);
                    array_push($this->dataArray, [$value[1] . ' ' . $value[2], $value[15], 'PM25']);

                }
            }


        }
        return $this->dataArray;
    }

    public function SendAirQuality()
    {
        $bot_url = "https://api.telegram.org/bot" . $this->apiToken;
        $url = $bot_url . "/sendDocument?chat_id=" . $this->ChatId;

        $post_fields = ['chat_id' => $this->ChatId,
            'document' => new \CURLFile(storage_path('app/airquality.xls'), 'application/vnd.ms-excel', 'airquality.xls'),
            'parse_mode' => "HTML"
        ];


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            "Content-Type:multipart/form-data"
        ));
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        $output = curl_exec($ch);

    }

}
