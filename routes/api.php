<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StationController;
use App\Http\Controllers\API\DistrictController;
use App\Http\Controllers\API\HydrometSensorController;
use App\Http\Controllers\API\DirectoryController;
use App\Http\Controllers\ArmController;

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
    Route::get('/forecast/uzhydromet/{regionid}/{days}', [DirectoryController::class, 'uzhydromet'])->name('directory.forecast.uzhydromet');
    Route::get('/forecast/gismeteo/{regionid}/{days}', [DirectoryController::class, 'gismeteo'])->name('directory.forecast.gismeteo');
    Route::get('/forecast/yandexweather/{regionid}/{days}', [DirectoryController::class, 'yandexweather'])->name('directory.forecast.yandexweather');
    Route::get('/forecast/accuweather/', [DirectoryController::class, 'Accuweather'])->name('directory.forecast.Accuweather');

});

Route::get('/districts', [DistrictController::class, 'index'])->name('api.district.index');
Route::get('/stations', [StationController::class, 'index'])->name('api.station.index');

Route::get('/sensor/receive', [HydrometSensorController::class, 'store'])->name('api.hydromer.sensor.store');
