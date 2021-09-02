<?php

namespace App\Http\Controllers;

use App\Models\WeatherForecast;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherForecastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('weathers.weather');
    }

    public function getOpenWeather(Request $request)
    {
        $openweather = Http::get('http://api.openweathermap.org/data/2.5/forecast', [
            'q' => request('region', 'tashkent'),
            'appid' => '3b7367c71902cdb4229175c9aa4113ee',
            'units' => 'metric'
        ]);

        return $openweather->json();
    }

    public function getAccuweather(Request $request)
    {
        $accuweather_locationkey = 719862;
        if ($request->region == 'tashkent')
            $accuweather_locationkey = 719862;
        else if ($request->region == 'andijan')
            $accuweather_locationkey = 351828;
        else if ($request->region == 'bukhara')
            $accuweather_locationkey = 352479;
        else if ($request->region == 'jizzakh')
            $accuweather_locationkey = 348390;
        else if ($request->region == 'qarshi')
            $accuweather_locationkey = 350541;
        else if ($request->region == 'navoiy')
            $accuweather_locationkey = 355115;
        else if ($request->region == 'namangan')
            $accuweather_locationkey = 355095;
        else if ($request->region == 'samarkand')
            $accuweather_locationkey = 355776;
        else if ($request->region == 'termez')
            $accuweather_locationkey = 356042;
        else if ($request->region == 'gulistan')
            $accuweather_locationkey = 355934;
        else if ($request->region == 'nurafshon')
            $accuweather_locationkey = 356228;
        else if ($request->region == 'fergana')
            $accuweather_locationkey = 353238;
        else if ($request->region == 'urgench')
            $accuweather_locationkey = 356378;
        else if ($request->region == 'nukus')
            $accuweather_locationkey = 355666;
        $accuweather = Http::get('http://dataservice.accuweather.com/forecasts/v1/daily/5day/' . $accuweather_locationkey, [
            'apikey' => '9r5K2d9cY9TVWeTrSQyAXupIAHD8VE8V',
            'language' => 'Ru-ru',
            'metric' => "true",
            'details' => "true"
        ]);

        return $accuweather->json();
    }

    public function GetGidromet()
    {
        $gidromet = Http::withOptions([
            'verify' => false
        ])->get('https://www.meteo.uz/index.php/forecast/city', [
            'city' => request('region', 'tashkent')
        ]);

        return $gidromet->json();
    }

    public function GetWeatherBit(Request $request)
    {
        $latlong = [];
        if ($request->region == 'tashkent')
            $latlong = ['lat' => 41.26465, 'lon' => 69.21627];
        else if ($request->region == 'andijan')
            $latlong = ['lat' => 40.78206, 'lon' => 72.34424];
        else if ($request->region == 'bukhara')
            $latlong = ['lat' => 39.77472, 'lon' => 64.42861];
        else if ($request->region == 'jizzakh')
            $latlong = ['lat' => 40.11583, 'lon' => 67.84222];
        else if ($request->region == 'qarshi')
            $latlong = ['lat' => 38.86056, 'lon' => 65.78905];
        else if ($request->region == 'navoiy')
            $latlong = ['lat' => 40.08444, 'lon' => 65.37917];
        else if ($request->region == 'namangan')
            $latlong = ['lat' => 40.9983, 'lon' => 71.67257];
        else if ($request->region == 'samarkand')
            $latlong = ['lat' => 39.65417, 'lon' => 66.95972];
        else if ($request->region == 'termez')
            $latlong = ['lat' => 37.22417, 'lon' => 67.27833];
        else if ($request->region == 'gulistan')
            $latlong = ['lat' => 40.491509, 'lon' => 68.781077];
        else if ($request->region == 'nurafshon')
            $latlong = ['lat' => 41.166666, 'lon' => 69.749997];
        else if ($request->region == 'fergana')
            $latlong = ['lat' => 40.38421, 'lon' => 71.78432];
        else if ($request->region == 'urgench')
            $latlong = ['lat' => 41.55, 'lon' => 60.63333];
        else if ($request->region == 'nukus')
            $latlong = ['lat' => 42.4530, 'lon' => 59.6102];

        $weatherbit = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'x-rapidapi-host' => 'weatherbit-v1-mashape.p.rapidapi.com',
            'x-rapidapi-key' => '6cf743554dmsh3b4a43f2fe721bcp182316jsn234c801f7093'
        ])->get('https://weatherbit-v1-mashape.p.rapidapi.com/forecast/daily', $latlong);

        return $weatherbit->json();
    }

    public function GetDarkSky(Request $request)
    {
        $latlong = '';
        if ($request->region == 'tashkent')
            $latlong = '41.26465,69.21627';
        else if ($request->region == 'andijan')
            $latlong = '40.78206,72.34424';
        else if ($request->region == 'bukhara')
            $latlong = '39.77472,64.42861';
        else if ($request->region == 'jizzakh')
            $latlong = '40.11583,67.84222';
        else if ($request->region == 'qarshi')
            $latlong = '38.86056,65.78905';
        else if ($request->region == 'navoiy')
            $latlong = '40.08444,65.37917';
        else if ($request->region == 'namangan')
            $latlong = '40.9983,71.67257';
        else if ($request->region == 'samarkand')
            $latlong = '39.65417, 66.95972';
        else if ($request->region == 'termez')
            $latlong = '37.22417, 67.27833';
        else if ($request->region == 'gulistan')
            $latlong = '40.491509, 68.781077';
        else if ($request->region == 'nurafshon')
            $latlong = '41.166666,69.749997';
        else if ($request->region == 'fergana')
            $latlong = '40.38421,71.78432';
        else if ($request->region == 'urgench')
            $latlong = '41.55,60.63333';
        else if ($request->region == 'nukus')
            $latlong = '42.4530,59.6102';

        $weatherbit = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'x-rapidapi-host' => 'dark-sky.p.rapidapi.com',
            'x-rapidapi-key' => '6cf743554dmsh3b4a43f2fe721bcp182316jsn234c801f7093'
        ])->get('https://dark-sky.p.rapidapi.com/' . $latlong, [
            'lang' => 'RU',
            'units' => 'auto',
        ]);

        return $weatherbit->json();
    }
    public function GetAerisweather1(Request $request)
    {
        $latlong = '';
        if ($request->region == 'tashkent')
            $latlong = '41.26465,69.21627';
        else if ($request->region == 'andijan')
            $latlong = '40.78206,72.34424';
        else if ($request->region == 'bukhara')
            $latlong = '39.77472,64.42861';
        else if ($request->region == 'jizzakh')
            $latlong = '40.11583,67.84222';
        else if ($request->region == 'qarshi')
            $latlong = '38.86056,65.78905';
        else if ($request->region == 'navoiy')
            $latlong = '40.08444,65.37917';
        else if ($request->region == 'namangan')
            $latlong = '40.9983,71.67257';
        else if ($request->region == 'samarkand')
            $latlong = '39.65417, 66.95972';
        else if ($request->region == 'termez')
            $latlong = '37.22417, 67.27833';
        else if ($request->region == 'gulistan')
            $latlong = '40.491509, 68.781077';
        else if ($request->region == 'nurafshon')
            $latlong = '41.166666,69.749997';
        else if ($request->region == 'fergana')
            $latlong = '40.38421,71.78432';
        else if ($request->region == 'urgench')
            $latlong = '41.55,60.63333';
        else if ($request->region == 'nukus')
            $latlong = '42.4530,59.6102';

        $weatherbit = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'x-rapidapi-host' => 'aerisweather1.p.rapidapi.com',
            'x-rapidapi-key' => '6cf743554dmsh3b4a43f2fe721bcp182316jsn234c801f7093'
        ])->get('https://aerisweather1.p.rapidapi.com/forecasts/' . $latlong);

        return $weatherbit->json();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\WeatherForecast $weatherForecast
     * @return \Illuminate\Http\Response
     */
    public function show(WeatherForecast $weatherForecast)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\WeatherForecast $weatherForecast
     * @return \Illuminate\Http\Response
     */
    public function edit(WeatherForecast $weatherForecast)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\WeatherForecast $weatherForecast
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WeatherForecast $weatherForecast)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\WeatherForecast $weatherForecast
     * @return \Illuminate\Http\Response
     */
    public function destroy(WeatherForecast $weatherForecast)
    {
        //
    }
}
