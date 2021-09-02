<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AwdController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\QuickInfoController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\HourlyInfoSentController;
use App\Http\Controllers\DailyStationInfoController;
use App\Http\Controllers\HourlyStationInfoController;
use App\Http\Controllers\StationMonitoringController;
use App\Http\Controllers\UserProfilePasswordController;
use App\Http\Controllers\DailyStationInfoSendController;
use App\Http\Controllers\HourlyStationInfoSendController;
use App\Http\Controllers\DailyStationInfoExportController;
use App\Http\Controllers\HourlyStationInfoExportController;

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

Route::get('locale/{locale}', function ($locale) {
    \Illuminate\Support\Facades\Session::put('locale', $locale);
    return redirect()->back();
})->name('locale');

Route::prefix('weather')->group(function () {
    Route::get('/', [\App\Http\Controllers\WeatherForecastController::class, 'index'])->name('weather.index');
    Route::get('/openweather', [\App\Http\Controllers\WeatherForecastController::class, 'getOpenWeather'])->name('weather.openweather');
    Route::get('/accuweather', [\App\Http\Controllers\WeatherForecastController::class, 'getAccuweather'])->name('weather.accuweather');
    Route::get('/uzgidromet', [\App\Http\Controllers\WeatherForecastController::class, 'GetGidromet'])->name('weather.gidromet');
    Route::get('/weatherbit', [\App\Http\Controllers\WeatherForecastController::class, 'GetWeatherBit'])->name('weather.weatherbit');
    Route::get('/darksky', [\App\Http\Controllers\WeatherForecastController::class, 'GetDarkSky'])->name('weather.darksky');
    Route::get('/Aerisweather1', [\App\Http\Controllers\WeatherForecastController::class, 'GetAerisweather1'])->name('weather.Aerisweather1');
    Route::get('/ForecastApi', [\App\Http\Controllers\WeatherForecastController::class, 'ForecastApi'])->name('weather.ForecastApi');
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
    Route::get('/', [\App\Http\Controllers\CalciteController::class, 'index'])->name('map');

    Route::prefix('map')->group(function () {
//        Route::get('/', [WidgetController::class, 'map'])->name('map');
        Route::get('/', [\App\Http\Controllers\CalciteController::class, 'index'])->name('map.index');

        Route::get('/getcurrent', [WidgetController::class, 'getCurrent'])->name('map.getCurrent');
        Route::get('/forecast', [WidgetController::class, 'forecast'])->name('map.forecast');
//        Route::post('/getcurrentAll', [WidgetController::class, 'getForecastAll'])->name('map.forecast');
        Route::get('/getRadars', [WidgetController::class, 'getRadars'])->name('map.getRadars');
        Route::get('/GetAtmasfera', [WidgetController::class, 'GetAtmasfera'])->name('map.GetAtmasfera');
        Route::prefix('awd')->group(function () {
            Route::get('/getallstations', [AwdController::class, 'getAllStations'])->name('map.awd.getallstations');
            Route::post('/getStation', [AwdController::class, 'getStation'])->name('map.awd.getStation');
        });

        Route::prefix('dangerzones')->group(function () {
            Route::post('/', [WidgetController::class, 'dangerzonesLogin'])->name('map.dangerzones.login');
            Route::get('/data', [WidgetController::class, 'dangerzonesData'])->name('map.dangerzones.data');
        });


        Route::prefix('MicrostepStations')->group(function () {
            Route::get('/get', [\App\Http\Controllers\MicrostepStationsController::class, 'get'])->name('map.MicrostepStations.get');
        });

        Route::prefix('MeteoinfocomStationData')->group(function () {
            Route::get('/get', [\App\Http\Controllers\AwdController::class, 'GetMeteoinfocomStationData'])->name('map.MeteoinfocomStationData.get');
        });

    });

    Route::prefix('map2')->group(function () {
        Route::get('/', [\App\Http\Controllers\CalciteController::class, 'index'])->name('map.calcilate.index');

    });

    Route::group(['middleware' => ['auth']], function () {
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

        // daily info routes
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


    Route::post('/microstep-receive', [\App\Http\Controllers\MicrostepStationsController::class, 'getinfo'])->name('microstep.getinfo');


    Route::get('/hydrometmap', [\App\Http\Controllers\CalciteController::class, 'HydrometMap'])->name('hydromet.map');
});

