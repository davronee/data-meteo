<?php

use App\Http\Controllers\AmudarController;
use App\Http\Controllers\ApmMeteoUmbController;
use App\Http\Controllers\AwdController;
use App\Http\Controllers\CalciteController;
use App\Http\Controllers\DailyStationInfoController;
use App\Http\Controllers\DailyStationInfoExportController;
use App\Http\Controllers\DailyStationInfoSendController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HourlyInfoSentController;
use App\Http\Controllers\HourlyStationInfoController;
use App\Http\Controllers\HourlyStationInfoExportController;
use App\Http\Controllers\HourlyStationInfoSendController;
use App\Http\Controllers\MeteobotController;
use App\Http\Controllers\MicrostepStationsController;
use App\Http\Controllers\OneIdController;
use App\Http\Controllers\QuickInfoController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceRestorController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\StationMonitoringController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\UserProfilePasswordController;
use App\Http\Controllers\VariableController;
use App\Http\Controllers\WaterCadastrController;
use App\Http\Controllers\WeatherForecastController;
use App\Http\Controllers\WidgetController;
use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\MtrkController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//require __DIR__.'/auth.php';
Route::get('locale/{locale}', function ($locale) {
    \Illuminate\Support\Facades\Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');

Route::get('/oneid', [OneIdController::class, 'login'])->name('index.oneid');
Route::get('/oneidlogin', [OneIdController::class, 'OneIdLogin'])->name('oneidlogin');
Route::get('/oneidlogged', [OneIdController::class, 'Oneid_get_logged'])->name('oneidlogged');

Route::prefix('weather')->group(function () {
    Route::get('/', [WeatherForecastController::class, 'index'])->name('weather.index');
    Route::get('/openweather', [WeatherForecastController::class, 'getOpenWeather'])->name('weather.openweather');
    Route::get('/accuweather', [WeatherForecastController::class, 'getAccuweather'])->name('weather.accuweather');
    Route::get('/weatherapi', [WeatherForecastController::class, 'getWeatherApi'])->name('weather.getWeatherApi');
    Route::get('/uzgidromet', [WeatherForecastController::class, 'GetGidromet'])->name('weather.gidromet');
    Route::get('/weatherbit', [WeatherForecastController::class, 'GetWeatherBit'])->name('weather.weatherbit');
    Route::get('/darksky', [WeatherForecastController::class, 'GetDarkSky'])->name('weather.darksky');
    Route::get('/Aerisweather1', [WeatherForecastController::class, 'GetAerisweather1'])->name('weather.Aerisweather1');
    Route::get('/ForecastApi', [WeatherForecastController::class, 'ForecastApi'])->name('weather.ForecastApi');
    Route::get('/download', [WeatherForecastController::class, 'export'])->name('weather.download');
});

Route::prefix('meteo')->group(function () {
    Route::get('/', [\App\Http\Controllers\Meteocontroller::class, 'index'])->name('meteo.index');

});


Route::group(['middleware' => ['set_locale']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');


    Auth::routes(['register' => false]);
    Route::get('/data', function () {
        return view('pages.map');
    });

    // widget controller


    Route::prefix('world')->group(function () {
        Route::get('/', [WidgetController::class, 'world'])->name('world.index');
        Route::get('/forecast', [WidgetController::class, 'getForeCast'])->name('world.forecast');
        Route::get('/getWindSpeed', [WidgetController::class, 'getWindSpeed'])->name('getWindSpeed');
        Route::get('/getAccuweatherCurrent', [WidgetController::class, 'getAccuweatherCurrent'])->name('getAccuweatherCurrent');
        Route::get('/getAccuweatherForecast', [WidgetController::class, 'getAccuweatherForecast'])->name('getAccuweatherForecast');
    });


//    Route::get('/', [WidgetController::class, 'index'])->name('home');
    Route::get('/', [CalciteController::class, 'index'])->name('map');

    Route::prefix('map')->group(function () {
//        Route::get('/', [WidgetController::class, 'map'])->name('map');
        Route::get('/', [CalciteController::class, 'index'])->name('map.index');

        Route::get('/getcurrent', [WidgetController::class, 'getCurrent'])->name('map.getCurrent');
        Route::get('/forecast', [WidgetController::class, 'forecast'])->name('map.forecast');
//        Route::post('/getcurrentAll', [WidgetController::class, 'getForecastAll'])->name('map.forecast');
        Route::get('/getRadars', [WidgetController::class, 'getRadars'])->name('map.getRadars');
        Route::get('/getMeteobotsStations', [CalciteController::class, 'GetMeteobotStations'])->name('map.meteobotstations');
        Route::get('/GetAtmasfera', [WidgetController::class, 'GetAtmasfera'])->name('map.GetAtmasfera');
        Route::get('/GetHoribadrujba', [WidgetController::class, 'GetHoribaDrujba'])->name('map.horiba.drujba');
        Route::get('/GetHoribaPlashadka', [WidgetController::class, 'GetHoribaPlashadka'])->name('map.horiba.plashadka');
        Route::get('/GetAmbientweather', [CalciteController::class, 'GetAmbientweather'])->name('map.GetAmbientweather');
        Route::prefix('awd')->group(function () {
            Route::get('/getallstations', [AwdController::class, 'getAllStations'])->name('map.awd.getallstations');
            Route::post('/getStation', [AwdController::class, 'getStation'])->name('map.awd.getStation');
            Route::get('/getCrams', [AwdController::class, 'GetCrams'])->name('map.awd.GetCrams');
        });
        Route::prefix('radiation')->group(function () {
            Route::get('/stations', [VariableController::class, 'getStations'])->name('map.radiation.stations');
            Route::get('/station/{id}/{year?}', [VariableController::class, 'getStation'])->name('map.radiation.station');
            Route::get('/years', [VariableController::class, 'years'])->name('map.radiation.years');

        });

        Route::prefix('dangerzones')->group(function () {
            Route::post('/', [WidgetController::class, 'dangerzonesLogin'])->name('map.dangerzones.oneid_template');
            Route::get('/data', [WidgetController::class, 'dangerzonesData'])->name('map.dangerzones.data');
        });

        Route::prefix('watercadastr')->group(function () {
            Route::get('/', [WaterCadastrController::class, 'getStation'])->name('map.watercadastr.get');
            Route::get('/water-consuption', [WaterCadastrController::class, 'GetWaterConsumption'])->name('map.watercadastr.GetWaterConsumption');
            Route::get('/water-level', [WaterCadastrController::class, 'GetWaterLevel'])->name('map.watercadastr.GetWaterLevel');
            Route::get('/water-automat-hydrostation', [WaterCadastrController::class, 'GetAutostationHydro'])->name('map.watercadastr.GetAutostationHydro');
        });


        Route::prefix('MicrostepStations')->group(function () {
            Route::get('/get', [MicrostepStationsController::class, 'get'])->name('map.MicrostepStations.get');
        });

        Route::prefix('MeteoinfocomStationData')->group(function () {
            Route::get('/get', [AwdController::class, 'GetMeteoinfocomStationData'])->name('map.MeteoinfocomStationData.get');
            Route::get('/avgan', [AwdController::class, 'GetAvganData'])->name('map.GetAvganData.get');
        });

        Route::get('/regions', [CalciteController::class, 'GetRegions'])->name('map.regions');
        Route::get('/sensitive', [\App\Http\Controllers\SensitiveController::class, 'index'])->name('map.sensitive');


    });

    Route::prefix('map2')->group(function () {
        Route::get('/', [CalciteController::class, 'index'])->name('map.calcilate.index');

    });

    Route::prefix('neftgaz')->group(function () {
        Route::post('/', function (Request $request) {
            $request->validate([
                'airData' => 'required',
            ]);
            \Illuminate\Support\Facades\Log::info('neftgaz: ' . print_r(request()->all(), true));
        });


    });
    Route::get('/crams', [CalciteController::class, 'Crams'])->name('map.crams.index');


    // services
    Route::resource('service', ServiceController::class)->middleware('auth');
    Route::resource('openregister', ServiceRestorController ::class);
    Route::get('/openreestr_export', [ServiceRestorController::class, 'export'])->name('openreeste_export');


    Route::group(['middleware' => ['auth', 'role:superadmin admin control viewer worker shift-agent-station central-agent-station station-status-admin station-status-tracker station-status-viewer quick-info-editor']], function () {
        // user profile routes
        Route::resource('admin/user', UserController::class)->except(['show']);

        // user profile routes
        Route::resource('user-profile', UserProfileController::class)->only([
            'edit', 'update', 'show'
        ]);
        Route::get('/user-profile/{user_profile}/password', [UserProfilePasswordController::class, 'edit'])->name('user_profile.password.edit');
        Route::put('/user-profile/{user_profile}/password', [UserProfilePasswordController::class, 'update'])->name('user_profile.password.update');

        // hourly info routes
        Route::get('/hourly-station-info/sent-list', [HourlyInfoSentController::class, 'index'])->middleware('isProfileFilled')->name('hourly-station-info.sent');
        Route::resource('hourly-station-info', HourlyStationInfoController::class)->middleware('isProfileFilled');
        Route::get('/hourly-station-info/export/{hourly_station_info}/doc', [HourlyStationInfoExportController::class, 'doc'])->name('hourly-station-info.export.doc');
        Route::get('/hourly-station-info/export/{hourly_station_info}/pdf', [HourlyStationInfoExportController::class, 'pdf'])->name('hourly-station-info.export.pdf');
        Route::post('/hourly-station-info/{hourly_station_info}/send', [HourlyStationInfoSendController::class, 'store'])->name('hourly-station-info.send');

        Route::resource('station', StationController::class)->middleware('isProfileFilled');
        Route::resource('daily-station-info', DailyStationInfoController::class)->middleware('isProfileFilled');
        Route::get('/daily-station-info/export/{daily_station_info}/doc', [DailyStationInfoExportController::class, 'doc'])->name('daily-station-info.export.doc');
        Route::get('/daily-station-info/export/{daily_station_info}/pdf', [DailyStationInfoExportController::class, 'pdf'])->name('daily-station-info.export.pdf');
        Route::post('/daily-station-info/{daily_station_info}/send', [DailyStationInfoSendController::class, 'store'])->name('daily-station-info.send');

        // aws monitoring
        Route::resource('aws-monitoring', StationMonitoringController::class)->only([
            'create', 'store', 'index'
        ]);

        // Quick info
        Route::resource('quick-info', QuickInfoController::class);
        Route::get('/quick-info/export/{quick_info}/doc', [QuickInfoController::class, 'doc'])->name('quick-info.export.doc');
        Route::get('/quick-info/export/{quick_info}/pdf', [QuickInfoController::class, 'pdf'])->name('quick-info.export.pdf');
        Route::post('/quick-info/{quick_info}/send', [QuickInfoController::class, 'send'])->name('quick-info.send');
    });

    Route::get('/aws-status', [StationMonitoringController::class, 'index'])->name('aws.status');
    Route::post('/aws-monitoring/save', [StationMonitoringController::class, 'save'])->name('aws-monitoring.save');


    Route::post('/microstep-receive', [MicrostepStationsController::class, 'getinfo'])->name('microstep.getinfo');


    Route::get('/hydrometmap', [CalciteController::class, 'HydrometMap'])->name('hydromet.map');
    Route::get('/autostations', [CalciteController::class, 'AutoStations'])->name('hydromet.autostations');
    Route::get('/weathermap', [WeatherForecastController::class, 'maploader'])->name('weather.map');


    Route::prefix('chines')->group(function () {
        Route::get('/stations', [WidgetController::class, 'ChineStations'])->name('weather.chine.station');
        Route::get('/ChineStationCurrent', [WidgetController::class, 'ChineStationCurrent'])->name('weather.chine.ChineStationCurrent');
    });
});


Route::post('/meteo-umb', [ApmMeteoUmbController::class, 'GetPost'])->name('aws.apmmeteo');
Route::get('/meteo-umb/get', [ApmMeteoUmbController::class, 'get'])->name('aws.apmmeteo.get');
Route::get('/meteo-umb/view', [ApmMeteoUmbController::class, 'view'])->name('aws.apmmeteo.view');


//Route::get('/test123', function () {
//
//    Excel::import(new \App\Imports\StationMultipleSheet(), Sto);
//
//});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/history', [HistoryController::class, 'ByStationAndInterval'])->name('history');

Route::get('/newmap', [WeatherForecastController::class, 'Vendusky'])->name('map.Vendusky');

Route::prefix('bukhara_chines')->group(function () {
    Route::get('/getRealTimeData', [App\Http\Controllers\API\StationController::class, 'GetBukharaStationData'])->name('bukhara_chines.getRealTimeData');
});

Route::prefix('amudar')->group(function () {
    Route::get('/get', [AmudarController::class, 'GetData'])->name('amudar.getRealTimeData');
});


Route::prefix('meteobot')->group(function () {
    Route::get('/stations', [MeteobotController::class, 'GetStations'])->name('meteobot.stations');
    Route::get('/get/{id?}', [App\Http\Controllers\API\StationController::class, 'GetMeteoBotInfo'])->name('meteobot.GetMeteoBotInfo');
//    Route::get('/air-quality/list', [MeteobotController::class, 'GetOnlyAirQualityStationsList'])->middleware(['horiba'])->name('meteobot.stations.air-quality.list');
//    Route::get('/air-quality/{id}', [MeteobotController::class, 'GetOnlyAirQualityStation'])->middleware(['horiba'])->name('meteobot.stations.air-quality.object');
});


Route::prefix('mtrk')->group(function () {
    Route::get('/report/get', [MtrkController::class, 'getReport'])->name('mtrk.get');
    Route::get('/report/offset', [MtrkController::class, 'offset'])->name('mtrk.offset');
});


Route::get('/test', function () {
    \App\Classes\Services::GetWeatherApi();
});
