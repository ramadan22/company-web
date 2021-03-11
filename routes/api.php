<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::group(['namespace' => 'API'], function () {

        Route::get('/about', 'AboutController');
        Route::get('/banner', 'BannerController');
        Route::post('/contact-us', 'ContactController');

        Route::get('/news', 'NewsController@index');
        Route::put('/news/detail', 'NewsController@detail');

        Route::get('/opportunity/remove-answer', 'OpportunityController@removeAnswer');
    });
});
