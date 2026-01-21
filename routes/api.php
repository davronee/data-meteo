<?php

use App\Http\Controllers\CalciteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StationController;
use App\Http\Controllers\API\DistrictController;
use App\Http\Controllers\API\HydrometSensorController;
use App\Http\Controllers\API\DirectoryController;
use App\Http\Controllers\ArmController;
use App\Http\Controllers\Meteocontroller;
use App\Http\Controllers\MeteobotController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('apm')->group(function () {
    Route::get('/', [ArmController::class, 'index'])->name('arm.index');
    Route::get('/stations', [ArmController::class, 'stations'])->name('apm.index');
    Route::get('/{id}', [ArmController::class, 'get'])->name('arm.get');
});


Route::prefix('directory')->group(function () {
    Route::get('/regions', [DirectoryController::class, 'regions'])->name('directory.regions.index');
    Route::get('/regionsWithWeather', [DirectoryController::class, 'regionsWithWeather'])->name('directory.regions.regionsWithWeather');
    Route::get('/current/aws/uzhydromet/{regionid}/{days}', [Meteocontroller::class, 'getAws'])->name('directory.aws.index');
    Route::get('/forecast/uzhydromet/{regionid}/{days}', [DirectoryController::class, 'uzhydromet'])->name('directory.forecast.uzhydromet');
    Route::get('/forecast/gismeteo/{regionid}/{days}', [DirectoryController::class, 'gismeteo'])->name('directory.forecast.gismeteo');
    Route::get('/forecast/yandexweather/{regionid}/{days}', [DirectoryController::class, 'yandexweather'])->name('directory.forecast.yandexweather');
    Route::get('/forecast/accuweather/{regionid}/{days}', [DirectoryController::class, 'Accuweather'])->name('directory.forecast.Accuweather');

});

Route::get('/districts', [DistrictController::class, 'index'])->name('api.district.index');
Route::get('/stations', [StationController::class, 'index'])->name('api.station.index');

Route::get('/sensor/receive', [HydrometSensorController::class, 'store'])->name('api.hydromer.sensor.store');


Route::get('/v1/uz/data', [CalciteController::class, 'IndiaAirQualityStationGetLastData'])->name('api.india.data');

// Meteobot API routes with Basic Auth
Route::prefix('meteobot')->middleware('basic.auth')->group(function () {
    Route::get('/stations', [MeteobotController::class, 'GetStations'])->name('api.meteobot.stations');
    Route::get('/air-quality/list', [MeteobotController::class, 'GetOnlyAirQualityStationsList'])->name('api.meteobot.air-quality.list');
    Route::get('/air-quality/{stationid}', [MeteobotController::class, 'GetOnlyAirQualityStation'])->name('api.meteobot.air-quality.station');
    Route::get('/locate', [MeteobotController::class, 'GetStationLocation'])->name('api.meteobot.locate');
    Route::get('/index-full', [MeteobotController::class, 'GetStationIndexFull'])->name('api.meteobot.index-full');
});
