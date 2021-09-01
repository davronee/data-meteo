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
