<?php

namespace App\Http\Controllers;

use App\Exports\ExportUzHydromet;
use App\Models\Accuweather;
use App\Models\UzHydromet;
use App\Models\WeatherBit;
use App\Models\WeatherForecast;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Maatwebsite\Excel\Facades\Excel;

class WeatherForecastController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        $subopenweather = UzHydromet::toBase()
            ->where('region', 'tashkent')
            ->where('datetime', '=', Carbon::now()->format('Y-m-d'))
            ->pluck('id')
            ->toArray();

//        $gidromet = \App\Models\UzHydromet::whereIn('id', $subopenweather)->get();
//        $weather = Http::get('http://www.meteo.uz/api/v2/weather/current.json?city=tashkent&language=ru')->json();
//        $gidromet->temp_precent = self::Delta($gidromet->min('air_t_min'), $gidromet->max('air_t_max'), $weather['air_t']);
//        $gidromet->factik = $weather['air_t'];
//        $gidromet->save();


//        dd(Services::Delta(6,8,7));

        return view('weathers.weather');
    }

    public function getOpenWeather(Request $request)
    {
        $take = 0;
        switch (request('interval', '0')) {
            case 0:
                $take = 3;
                break;
            case 1:
                $take = 6;
                break;
            case 2:
                $take = 9;
                break;
        }

//        return [Carbon::now()->format("Y-m-d"),Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")];

        $subopenweather = \App\Models\OpenWeather::toBase()
            ->where('region', request('region', 'tashkent'))
            ->selectRaw('MAX(id) as id')
            ->wheretime('datetime', '<=', Carbon::now())
            ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
            ->groupBy('date')
            ->pluck('id')
            ->toArray();

        $openweather = \App\Models\OpenWeather::whereIn('id', $subopenweather)->get();

        return $openweather;
    }

    public function getAccuweather(Request $request)
    {
        $take = 0;
        switch (request('interval', '0')) {
            case 0:
                $take = 3;
                break;
            case 1:
                $take = 6;
                break;
            case 2:
                $take = 9;
                break;
        }
        $subopenweather = Accuweather::toBase()
            ->selectRaw('MAX(id) as id')
            ->where('region', request('region', 'tashkent'))
            ->wheretime('datetime', '<=', Carbon::now())
            ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
            ->groupBy('date')
            ->pluck('id')
            ->toArray();

        $accuweather = \App\Models\Accuweather::whereIn('id', $subopenweather)->get();
        return $accuweather;
    }

    public function GetGidromet()
    {
        $take = 0;
        switch (request('interval', '0')) {
            case 0:
                $take = 3;
                break;
            case 1:
                $take = 6;
                break;
            case 2:
                $take = 9;
                break;
        }
        $start = '07:00:00';
        $end = '18:00:00';
        $now = Carbon::now('UTC');
        $time = $now->format('H:i:s');
//        if ($time >= $start && $time <= $end) {
//            $subopenweather = UzHydromet::toBase()
//                ->selectRaw('MAX(id) as id')
//                ->where('region', request('region', 'tashkent'))
//                ->where('day_part', 'day')
//                ->wheretime('datetime', '<=', Carbon::now())
//                ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
//                ->groupBy('date')
//                ->pluck('id')
//                ->toArray();
//        } else {
//            $subopenweather = UzHydromet::toBase()
//                ->selectRaw('MAX(id) as id')
//                ->where('region', request('region', 'tashkent'))
//                ->where('day_part', 'night')
//                ->wheretime('datetime', '<=', Carbon::now())
//                ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
//                ->groupBy('date')
//                ->pluck('id')
//                ->toArray();
//        }
//        $gidromet = \App\Models\UzHydromet::whereIn('id', $subopenweather)->get();

        $gidromet = \App\Models\UzHydromet::where('region', request('region', 'tashkent'))
            ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])->get();

        $array = [];
        foreach ($gidromet as $key => $item) {
            if ($key % 2 == 0) {
                array_push($array, [
                    "region" => $item->region,
                    "date" => $item->date,
                    "air_t_min" => $item->air_t_min,
                    "air_t_max" => $item->air_t_max,
                    "air_t_min_night" => $gidromet[$key + 1]->air_t_min,
                    "air_t_max_night" => $gidromet[$key + 1]->air_t_max,
                    "wind_speed_min" => $item->wind_speed_min,
                    "wind_speed_max" => $item->wind_speed_max,
                    "wind_direction" => $item->wind_direction,
                    "precipitation" => $item->precipitation,
                    "temp_precent" => $item->temp_precent,
                    "wind_precent" => $item->region,
                    "rain_precent" => $item->region,
                    "factik" => $item->factik,
                ]);
            }

        }


        return $array;
    }

    public function GetWeatherBit(Request $request)
    {
        $subopenweather = WeatherBit::toBase()
            ->selectRaw('MAX(id) as id')
            ->where('region', request('region', 'tashkent'))
            ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
            ->groupBy('date')
            ->pluck('id')
            ->toArray();
        $weatherbit = \App\Models\WeatherBit::whereIn('id', $subopenweather)->get();
        return $weatherbit;
    }

    public function GetDarkSky(Request $request)
    {
        $subopenweather = \App\Models\DarkSky::toBase()
            ->selectRaw('MAX(id) as id')
            ->where('region', request('region', 'tashkent'))
            ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
            ->groupBy('date')
            ->pluck('id')
            ->toArray();;
        $darksky = \App\Models\DarkSky::whereIn('id', $subopenweather)->get();
        return $darksky;
    }

    public function GetAerisweather1(Request $request)
    {
        $subopenweather = \App\Models\Aerisweather::toBase()
            ->selectRaw('MAX(id) as id')
            ->where('region', request('region', 'tashkent'))
            ->wheretime('datetime', '<=', Carbon::now())
            ->whereBetween('date', [Carbon::now()->format("Y-m-d"), Carbon::now()->addDays(request('interval', 0))->format("Y-m-d")])
            ->groupBy('date')
            ->pluck('id')
            ->toArray();
        $aerisweather = \App\Models\Aerisweather::whereIn('id', $subopenweather)->get();
        return $aerisweather;
    }

    public function ForecastApi(Request $request)
    {

        $latlong = '41.26465/69.21627';
        if ($request->region == 'tashkent')
            $latlong = '41.26465/69.21627';
        else if ($request->region == 'andijan')
            $latlong = '40.78206/72.34424';
        else if ($request->region == 'bukhara')
            $latlong = '39.77472/64.42861';
        else if ($request->region == 'jizzakh')
            $latlong = '40.11583/67.84222';
        else if ($request->region == 'qarshi')
            $latlong = '38.86056/65.78905';
        else if ($request->region == 'navoiy')
            $latlong = '40.08444/65.37917';
        else if ($request->region == 'namangan')
            $latlong = '40.9983/71.67257';
        else if ($request->region == 'samarkand')
            $latlong = '39.65417/66.95972';
        else if ($request->region == 'termez')
            $latlong = '37.22417/67.27833';
        else if ($request->region == 'gulistan')
            $latlong = '40.491509/68.781077';
        else if ($request->region == 'nurafshon')
            $latlong = '41.166666/69.749997';
        else if ($request->region == 'fergana')
            $latlong = '40.38421/71.78432';
        else if ($request->region == 'urgench')
            $latlong = '41.55,60/63333';
        else if ($request->region == 'nukus')
            $latlong = '42.4530/59.6102';

        $foreacast = Http::withOptions([
            'verify' => false
        ])->withHeaders([
            'x-rapidapi-host' => 'forecast9.p.rapidapi.com',
            'x-rapidapi-key' => '6cf743554dmsh3b4a43f2fe721bcp182316jsn234c801f7093'
        ])->get('https://forecast9.p.rapidapi.com/rapidapi/forecast/' . $latlong . '/hourly/');

        return $foreacast->json();
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

    public function maploader()
    {
        // $url = 'https://www.meteoblue.com/en/weather/maps/tashkent_uzbekistan_1512569#coords=4/41.26/69.22&map=cloudsAndPrecipitation~hourly~auto~sfc~none';
//        $url = 'https://www.meteoblue.com/en/weather/maps/tashkent_uzbekistan_1512569#coords=5.12/41.27/66.1&map=cloudsAndPrecipitation~hourly~auto~sfc~none';
        $url = Http::withOptions([
            'verify' => false
        ])->withHeaders(
            [
                'Access-Control-Allow-Origin' => '*',
                'Access-Control-Allow-Methods' => 'GET, POST, PUT, PATCH, DELETE, OPTIONS',
                'Access-Control-Allow-Headers' => 'Content-Type, Authorizations'
            ]
        )->get('https://www.meteoblue.com/en/weather/maps/tashkent_uzbekistan_1512569#coords=5.12/41.27/66.1&map=cloudsAndPrecipitation~hourly~auto~sfc~none')->body();
//        $output = file_get_contents($url);
        print $url;
    }

    public function export()
    {
        return Excel::download(new ExportUzHydromet, 'report_'. Carbon::now() .'.xlsx');
    }

    public function Vendusky()
    {
        return view('vendusky');

    }
}
