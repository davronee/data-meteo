<?php

namespace App\Http\Controllers;

use App\Models\Meteo;
use App\Models\Radar;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WidgetController extends Controller
{
//    public $endpoint = 'http://217.30.161.60:8086/';
    public $endpoint = 'http://192.168.21.131:8086/';
    public $meteoapi = 'http://meteoapi.meteo.uz/';//'http://192.168.10.249:8085/';
//    public $dangerzonesapi = 'http://10.190.24.134:11082/public/api/';
//    public $dangerzonesapi = 'http://192.168.0.28:11082/public/api/';
    public $dangerzonesapi = 'http://192.168.20.7:11082/api/';

    public function __construct()
    {
        $this->endpoint = env('AWS_ENDPOINT', 'http://192.168.21.131:8086/');  //config('endpoints.AWS_ENDPOINT','http://192.168.10.249:8086/');
        $this->meteoapi = env('METEOAPI_ENDPOINT', 'http://meteoapi.meteo.uz/');  //config('endpoints.AWS_ENDPOINT','http://192.168.10.249:8086/');
        $this->dangerzonesapi = env('DANGERZONES_ENDPOINT', 'http://192.168.20.7:11082/api/');  //config('endpoints.AWS_ENDPOINT','http://192.168.10.249:8086/');
    }

    public function index(Request $request)
    {

        return view('widget.index');
    }

    public function map(Request $request)
    {

        $radars = Radar::all();

        $stations = Http::withBasicAuth('davronee', 'bvlgari1991')->get($this->endpoint . 'EnvidbMetadataInterface/GetAllStations');

        return view('pages.map')->with([
            'radars' => $radars,
            'stations' => $stations->json()
        ]);


    }

    public function getRadars(Request $request)
    {
        $radar = Http::get('http://meteo.uz/new/index.php?r=restricted/radarimage/listAjax');
        header('Content-type:image/png');

//        if($request->region)
//        {
//            if($request->region == 1726)
//            print base64_decode($radar[0]['tashkent']['image']);
//
//            if($request->region == 1735)
//                print base64_decode($radar[0]['nukus']['image']);
//        }


        if ($request->region) {
            if ($request->region == 1726) {
                $im = imageCreateFromString(base64_decode($radar[0]['tashkent']['image']));
                $im2 = imagecrop($im, ['x' => 280, 'y' => 70, 'width' => 1320, 'height' => 1030]);
                if ($im2 !== FALSE) {
                    header("Content-type: image/png");
                    imagepng($im2);
//                imagedestroy($im2);
                }
            }

            if ($request->region == 1735) {
                $im = imageCreateFromString(base64_decode($radar[0]['nukus']['image']));
                $im2 = imagecrop($im, ['x' => 280, 'y' => 70, 'width' => 1320, 'height' => 1030]);
                if ($im2 !== FALSE) {
                    header("Content-type: image/png");
                    imagepng($im2);
//                imagedestroy($im2);
                }
            }

            if ($request->region == 1706) {
                $im = imageCreateFromString(base64_decode($radar[0]['bukhara']['image']));
                $im2 = imagecrop($im, ['x' => 280, 'y' => 70, 'width' => 1320, 'height' => 1030]);
                if ($im2 !== FALSE) {
                    header("Content-type: image/png");
                    imagepng($im2);
//                imagedestroy($im2);
                }
            }
        }

    }

    public function getCurrent(Request $request)
    {
        $current = Http::withOptions([
            'verify' => false
        ])->get($this->meteoapi . 'api/weather/current/' . $request->regionid);
//        $current = Http::get('http://217.30.161.60:8085/api/weather/current/' . $request->regionid);
        return $current->json();
    }

    public function forecast(Request $request)
    {
        $current = Http::get($this->meteoapi . 'api/weather/forecast/' . $request->regionid);
//        $current = Http::get('http://217.30.161.60:8085/api/weather/forecast/' . $request->regionid);
        return $current->json();
    }


    public function getForecastAll(Request $request)
    {
        $current = Http::get($this->meteoapi . 'api/weather/forecast');
//        $current = Http::get('http://217.30.161.60:8085/api/weather/forecast/' . $request->regionid);
        return $current->json();
    }


    public function getWindSpeed(Request $request)
    {
        $request->validate([
            'city' => 'required'
        ]);

        if ($request->city == 'tashkent')
            $wind = Http::get('https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/41.311081,69.240562')->body();
        elseif ($request->city == 'andijan')
            $wind = Http::get('https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/40.7833302,72.333332')->body();
        elseif ($request->city == 'bukhara')
            $wind = Http::get('https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/39.7666636,64.4333316')->body();
        elseif ($request->city == 'jizzakh')
            $wind = Http::get('https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/40.11583,67.84222')->body();
        elseif ($request->city == 'qarshi')
            $wind = Http::get('https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/38.86056,65.78905')->body();
        elseif ($request->city == 'navoiy')
            $wind = Http::get('https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/40.08444,65.37917')->body();
        elseif ($request->city == 'namangan')
            $wind = Http::get('https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/40.9983,71.67257')->body();
        elseif ($request->city == 'samarkand')
            $wind = Http::get('https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/39.65417,66.95972')->body();
        elseif ($request->city == 'termez')
            $wind = Http::get('https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/37.22417,67.27833')->body();
        elseif ($request->city == 'gulistan')
            $wind = Http::get('https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/40.491509,68.781077')->body();
        elseif ($request->city == 'nurafshon')
            $wind = Http::get('https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/40.45264,68.70062')->body();
        elseif ($request->city == 'fergana')
            $wind = Http::get('https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/40.38421,71.78432')->body();
        elseif ($request->city == 'urgench')
            $wind = Http::get('https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/41.534532,60.624889')->body();
        elseif ($request->city == 'nukus')
            $wind = Http::get('https://api.darksky.net/forecast/d77118a60fbebfa1cb5a648f42f623a9/42.45306,59.61028')->body();


        $wind = json_decode($wind, true);
        return response()->json($wind['currently']['windSpeed']);
    }

    public function test(Request $request)
    {

        $meteo = Meteo::all();

        return response()->json($meteo);

    }

    public function getAccuweatherCurrent(Request $request)
    {
        $request->validate([
            'locationkey' => 'required'
        ]);
        $accuweather = Http::get('http://dataservice.accuweather.com/currentconditions/v1/' . $request->locationkey, [
            'apikey' => '9r5K2d9cY9TVWeTrSQyAXupIAHD8VE8V',
            'language' => 'Ru-ru',
            'metric' => 'true',
        ])->json();


        return [
            'temp' => round($accuweather[0]['Temperature']['Metric']['Value']),
            'desc' => $accuweather[0]['WeatherText']
        ];

    }

    public function getAccuweatherForecast(Request $request)
    {
        $request->validate([
            'locationkey' => 'required'
        ]);
        $accuweather = Http::get('http://dataservice.accuweather.com/forecasts/v1/daily/5day/' . $request->locationkey, [
            'apikey' => '9r5K2d9cY9TVWeTrSQyAXupIAHD8VE8V',
            'language' => 'Ru-ru',
            'metric' => 'true',
        ])->json();


        return $accuweather['DailyForecasts'];

    }

    public function world(Request $request)
    {
        return view('pages.world');

    }

    public function getForeCast(Request $request)
    {
        $request->validate([
            'city' => 'required'
        ]);

        $gidromet = Http::get('http://www.meteo.uz/index.php/forecast/city', [
            'city' => $request->city,
            'expand' => 'city'
        ]);

        $endpoint_openweather = '';

        if ($request->city == 'tashkent') {
            $openweather = Http::get('http://api.openweathermap.org/data/2.5/onecall?exclude=current%2Cminutely%2Chourly&appid=3b7367c71902cdb4229175c9aa4113ee&lang=ru&units=metric&lat=41.26465&lon=69.21627', [
                'exclude' => 'current,minutely,hourly',
                'appid' => '3b7367c71902cdb4229175c9aa4113ee',
                'lang' => 'ru',
                'units' => 'metric',
                'lat' => '41.26465',
                'lon' => '69.21627',
            ]);

        } else if ($request->city == 'andijan') {
            $openweather = Http::get('http://api.openweathermap.org/data/2.5/onecall?exclude=current%2Cminutely%2Chourly&appid=3b7367c71902cdb4229175c9aa4113ee&lang=ru&units=metric&lat=41.26465&lon=69.21627', [
                'exclude' => 'current,minutely,hourly',
                'appid' => '3b7367c71902cdb4229175c9aa4113ee',
                'lang' => 'ru',
                'units' => 'metric',
                'lat' => '40.7820',
                'lon' => '72.34424',
            ]);
        } else if ($request->city == 'bukhara') {
            $openweather = Http::get('http://api.openweathermap.org/data/2.5/onecall?exclude=current%2Cminutely%2Chourly&appid=3b7367c71902cdb4229175c9aa4113ee&lang=ru&units=metric&lat=41.26465&lon=69.21627', [
                'exclude' => 'current,minutely,hourly',
                'appid' => '3b7367c71902cdb4229175c9aa4113ee',
                'lang' => 'ru',
                'units' => 'metric',
                'lat' => '39.77472',
                'lon' => '64.42861',
            ]);
        } else if ($request->city == 'jizzakh') {
            $openweather = Http::get('http://api.openweathermap.org/data/2.5/onecall?exclude=current%2Cminutely%2Chourly&appid=3b7367c71902cdb4229175c9aa4113ee&lang=ru&units=metric&lat=41.26465&lon=69.21627', [
                'exclude' => 'current,minutely,hourly',
                'appid' => '3b7367c71902cdb4229175c9aa4113ee',
                'lang' => 'ru',
                'units' => 'metric',
                'lat' => '40.11583',
                'lon' => '67.84222',
            ]);
        } else if ($request->city == 'qarshi') {
            $openweather = Http::get('http://api.openweathermap.org/data/2.5/onecall?exclude=current%2Cminutely%2Chourly&appid=3b7367c71902cdb4229175c9aa4113ee&lang=ru&units=metric&lat=41.26465&lon=69.21627', [
                'exclude' => 'current,minutely,hourly',
                'appid' => '3b7367c71902cdb4229175c9aa4113ee',
                'lang' => 'ru',
                'units' => 'metric',
                'lat' => '38.86056',
                'lon' => '65.78905',
            ]);
        } else if ($request->city == 'navoiy') {
            $openweather = Http::get('http://api.openweathermap.org/data/2.5/onecall?exclude=current%2Cminutely%2Chourly&appid=3b7367c71902cdb4229175c9aa4113ee&lang=ru&units=metric&lat=41.26465&lon=69.21627', [
                'exclude' => 'current,minutely,hourly',
                'appid' => '3b7367c71902cdb4229175c9aa4113ee',
                'lang' => 'ru',
                'units' => 'metric',
                'lat' => '40.08444',
                'lon' => '65.37917',
            ]);
        } else if ($request->city == 'namangan') {
            $openweather = Http::get('http://api.openweathermap.org/data/2.5/onecall?exclude=current%2Cminutely%2Chourly&appid=3b7367c71902cdb4229175c9aa4113ee&lang=ru&units=metric&lat=41.26465&lon=69.21627', [
                'exclude' => 'current,minutely,hourly',
                'appid' => '3b7367c71902cdb4229175c9aa4113ee',
                'lang' => 'ru',
                'units' => 'metric',
                'lat' => '40.9983',
                'lon' => '71.67257',
            ]);

        } else if ($request->city == 'samarkand') {
            $openweather = Http::get('http://api.openweathermap.org/data/2.5/onecall?exclude=current%2Cminutely%2Chourly&appid=3b7367c71902cdb4229175c9aa4113ee&lang=ru&units=metric&lat=41.26465&lon=69.21627', [
                'exclude' => 'current,minutely,hourly',
                'appid' => '3b7367c71902cdb4229175c9aa4113ee',
                'lang' => 'ru',
                'units' => 'metric',
                'lat' => '39.65417',
                'lon' => '66.95972',
            ]);
        } else if ($request->city == 'termez') {
            $openweather = Http::get('http://api.openweathermap.org/data/2.5/onecall?exclude=current%2Cminutely%2Chourly&appid=3b7367c71902cdb4229175c9aa4113ee&lang=ru&units=metric&lat=41.26465&lon=69.21627', [
                'exclude' => 'current,minutely,hourly',
                'appid' => '3b7367c71902cdb4229175c9aa4113ee',
                'lang' => 'ru',
                'units' => 'metric',
                'lat' => '37.22417',
                'lon' => '67.27833',
            ]);
        } else if ($request->city == 'gulistan') {
            $openweather = Http::get('http://api.openweathermap.org/data/2.5/onecall?exclude=current%2Cminutely%2Chourly&appid=3b7367c71902cdb4229175c9aa4113ee&lang=ru&units=metric&lat=41.26465&lon=69.21627', [
                'exclude' => 'current,minutely,hourly',
                'appid' => '3b7367c71902cdb4229175c9aa4113ee',
                'lang' => 'ru',
                'units' => 'metric',
                'lat' => '40.491509',
                'lon' => '68.781077',
            ]);
        } else if ($request->city == 'nurafshon') {
            $openweather = Http::get('http://api.openweathermap.org/data/2.5/onecall?exclude=current%2Cminutely%2Chourly&appid=3b7367c71902cdb4229175c9aa4113ee&lang=ru&units=metric&lat=41.26465&lon=69.21627', [
                'exclude' => 'current,minutely,hourly',
                'appid' => '3b7367c71902cdb4229175c9aa4113ee',
                'lang' => 'ru',
                'units' => 'metric',
                'lat' => '41.166666',
                'lon' => '69.749997',
            ]);

        } else if ($request->city == 'fergana') {
            $openweather = Http::get('http://api.openweathermap.org/data/2.5/onecall?exclude=current%2Cminutely%2Chourly&appid=3b7367c71902cdb4229175c9aa4113ee&lang=ru&units=metric&lat=41.26465&lon=69.21627', [
                'exclude' => 'current,minutely,hourly',
                'appid' => '3b7367c71902cdb4229175c9aa4113ee',
                'lang' => 'ru',
                'units' => 'metric',
                'lat' => '40.38421',
                'lon' => '71.78432',
            ]);
        } else if ($request->city == 'urgench') {
            $openweather = Http::get('http://api.openweathermap.org/data/2.5/onecall?exclude=current%2Cminutely%2Chourly&appid=3b7367c71902cdb4229175c9aa4113ee&lang=ru&units=metric&lat=41.26465&lon=69.21627', [
                'exclude' => 'current,minutely,hourly',
                'appid' => '3b7367c71902cdb4229175c9aa4113ee',
                'lang' => 'ru',
                'units' => 'metric',
                'lat' => '41.55',
                'lon' => '60.63333',
            ]);
        } else if ($request->city == 'nukus') {
            $openweather = Http::get('http://api.openweathermap.org/data/2.5/onecall?exclude=current%2Cminutely%2Chourly&appid=3b7367c71902cdb4229175c9aa4113ee&lang=ru&units=metric&lat=41.26465&lon=69.21627', [
                'exclude' => 'current,minutely,hourly',
                'appid' => '3b7367c71902cdb4229175c9aa4113ee',
                'lang' => 'ru',
                'units' => 'metric',
                'lat' => '42.45306',
                'lon' => '59.6102',
            ]);
        }

        if ($request->city == 'tashkent')
            $accuweather_locationkey = 719862;
        else if ($request->city == 'andijan')
            $accuweather_locationkey = 351828;
        else if ($request->city == 'bukhara')
            $accuweather_locationkey = 352479;
        else if ($request->city == 'jizzakh')
            $accuweather_locationkey = 348390;
        else if ($request->city == 'qarshi')
            $accuweather_locationkey = 350541;
        else if ($request->city == 'navoiy')
            $accuweather_locationkey = 355115;
        else if ($request->city == 'namangan')
            $accuweather_locationkey = 355095;
        else if ($request->city == 'samarkand')
            $accuweather_locationkey = 355776;
        else if ($request->city == 'termez')
            $accuweather_locationkey = 356042;
        else if ($request->city == 'gulistan')
            $accuweather_locationkey = 355934;
        else if ($request->city == 'nurafshon')
            $accuweather_locationkey = 356228;
        else if ($request->city == 'fergana')
            $accuweather_locationkey = 353238;
        else if ($request->city == 'urgench')
            $accuweather_locationkey = 356378;
        else if ($request->city == 'nukus')
            $accuweather_locationkey = 355666;


        $accuweather = Http::get('http://dataservice.accuweather.com/forecasts/v1/daily/5day/' . $request->locationkey, [
            'apikey' => '9r5K2d9cY9TVWeTrSQyAXupIAHD8VE8V',
            'language' => 'Ru-ru',
            'metric' => 'true',
        ])->json();


//        $accuweather = json_decode($accuweather,true);

//        return $accuweather;

        $gidromet = [
            'gidromet' => array(
                [$gidromet[4], $gidromet[5]],
                [$gidromet[2], $gidromet[3]],
                [$gidromet[0], $gidromet[1]],
            ),
            'openweather' => array(
                $openweather['daily'][1],
                $openweather['daily'][2],
                $openweather['daily'][3],
            )
        ];

        return response()->json($gidromet);

    }

    public function GetAtmasfera()
    {
//        $atmasfera = Http::get('http://217.30.161.60:8085/api/atmosphere/monitoring/');
        $atmasfera = Http::withOptions([
            'verify' => false
        ])->get($this->meteoapi . 'api/atmosphere/monitoring/');
        return $atmasfera->json();
    }

    public function dangerzonesLogin()
    {
        $response = Http::post($this->dangerzonesapi . 'oneid_template', [
            'email' => 'info@ygk.uz',
            'password' => 'X25G-y8nvQ8Tq_2D',
        ]);

        return $response->json()['token'];
    }

    public function dangerzonesData(Request $request)
    {
        $data = Http::withBasicAuth('info@ygk.uz','X25G-y8nvQ8Tq_2D')->get($this->dangerzonesapi . 'hydromet/' . $request->endpoint);
        return $data->json();
    }

    public function GetHoribaDrujba()
    {
        $horiba = Http::get('http://ecoweb-api.meteo.uz?point=2')->json();

        return $horiba;
    }

    public function GetHoribaPlashadka()
    {
        $horiba = Http::get('http://ecoweb-api.meteo.uz?point=1')->json();

        return $horiba;
    }

    public function ChineStations()
    {
        $stations = Http::get('http://chinese-api.meteo.uz/allStations.php?station_id=43')->json();
        return $stations;
    }

    public function ChineStationCurrent(Request $request)
    {
        $stations = Http::get('http://chinese-api.meteo.uz',[
            'station_id'=>$request->station_id,
            'year'=>Carbon::now()->year,
            'month'=>Carbon::now()->month,
        ])->json();


        $date = date_create($stations[1]);

        return [
            'station_id'=>$request->station_id,
            'datetime'=>date_format($date, 'd.m.Y H:i:s'),
            'ws'=>number_format($stations[2] / 10,1),
            'wd'=>number_format($stations[3],1),
            'prsp'=> number_format($stations[4],1),
            'temp'=>number_format($stations[5] / 10,1),
            'hr'=>number_format($stations[6],1),
            'stp'=>number_format($stations[13],1),
        ];
    }
}

