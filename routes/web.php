<?php

use Illuminate\Support\Facades\Route;

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
    Route::get('/data', function () {
        return view('pages.map');
    });
    Route::get('/', [App\Http\Controllers\WidgetController::class, 'index'])->name('home');
    Route::get('/test', [App\Http\Controllers\WidgetController::class, 'test'])->name('test');


//    Route::prefix('widget')->group(function () {
//        Route::get('/', [App\Http\Controllers\WidgetController::class, 'index'])->name('home');
//
//    });

    Auth::routes(['register' => false]);
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
});

