<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StationController;
use App\Http\Controllers\API\DistrictController;

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
    Route::get('/', [\App\Http\Controllers\ArmController::class, 'index'])->name('arm.index');
    Route::get('/{id}', [\App\Http\Controllers\ArmController::class, 'get'])->name('arm.get');
});


Route::get('/districts', [DistrictController::class, 'index'])->name('api.district.index');
Route::get('/stations', [StationController::class, 'index'])->name('api.station.index');
