<?php

namespace App\Http\Controllers;

use App\Models\Meteo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WidgetController extends Controller
{
    public function index(Request $request)
    {

        return view('widget.index');
    }

    public function map(Request $request)
    {

        return view('pages.map');
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

    public function getAccuweatherCurrent(Request $request){
        $request->validate([
            'locationkey'=>'required'
        ]);
        $accuweather = Http::get('http://dataservice.accuweather.com/currentconditions/v1/'.$request->locationkey,[
            'apikey'=>'9r5K2d9cY9TVWeTrSQyAXupIAHD8VE8V',
            'language'=>'Ru-ru',
            'metric'=>'true',
        ])->json();



        return [
            'temp'=>round($accuweather[0]['Temperature']['Metric']['Value']),
            'desc'=>$accuweather[0]['WeatherText']
        ];

    }

    public function getAccuweatherForecast(Request $request){
        $request->validate([
            'locationkey'=>'required'
        ]);
        $accuweather = Http::get('http://dataservice.accuweather.com/forecasts/v1/daily/5day/'.$request->locationkey,[
            'apikey'=>'9r5K2d9cY9TVWeTrSQyAXupIAHD8VE8V',
            'language'=>'Ru-ru',
            'metric'=>'true',
        ])->json();



       return $accuweather['DailyForecasts'];

    }

    public function world(Request  $request)
    {
        return view('pages.world_index');

    }

    public function getForeCast(Request  $request)
    {
        $request->validate([
            'city'=>'required'
        ]);

        $gidromet  = Http::get('http://www.meteo.uz/index.php/forecast/city',[
            'city'=>$request->city,
            'expand'=>'city'
        ]);

        $gidromet = array_reverse(array_sort($gidromet));

        return $gidromet;

    }

}
