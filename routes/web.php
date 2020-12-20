<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WidgetController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\DailyStationInfoController;
use App\Http\Controllers\HourlyStationInfoController;
use App\Http\Controllers\UserProfilePasswordController;

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

Route::group(['middleware' => ['set_locale']], function() {
    Auth::routes(['register' => false]);
    Route::get('/data', function () {
        return view('pages.map');
    });

    // widget controller
    Route::get('/', [WidgetController::class, 'index'])->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::get('/getWindSpeed', [WidgetController::class, 'getWindSpeed'])->name('getWindSpeed');

    Route::group(['middleware' => ['auth']], function() {
        // user profile routes
        Route::resource('admin/user', UserController::class)->except(['show']);

        // user profile routes
        Route::resource('user-profile', UserProfileController::class)->only([
            'edit', 'update', 'show'
        ]);
        Route::get('/user-profile/{user_profile}/password', [UserProfilePasswordController::class, 'edit'])->name('user_profile.password.edit');
        Route::put('/user-profile/{user_profile}/password', [UserProfilePasswordController::class, 'update'])->name('user_profile.password.update');

        // hourly info routes
        Route::resource('hourly-station-info', HourlyStationInfoController::class)->middleware('isProfileFilled');

        // daily info routes
        Route::resource('daily-station-info', DailyStationInfoController::class)->middleware('isProfileFilled');
    });
});

