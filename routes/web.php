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

Route::group(['namespace' => 'App\Http\Controllers'], function () {

    Route::group(['namespace' => 'Frontend'], function () {
        // home page
        Route::get('/', 'HomeController');

        // news page
        Route::get('/news', 'NewsController');

        // About Us page
        Route::get('/aboutus', 'AboutUsController');

        // Contact Us page
        Route::get('/contactus', 'ContactUsController@index');
        Route::post('/contactus', 'ContactUsController@create');
    });

    Route::group(['namespace' => 'Backend'], function () {
        // auth
        Route::group(['middleware' => 'auth'], function () {
            Route::get('/admin', 'AuthController@index');
            Route::post('/login', 'AuthController@login');
        });

        // logout
        Route::get('/logout', 'AuthController@logout');

        Route::group(['prefix' => '/admin', 'middleware' => 'guest'], function () {

            /* ADMIN */
            Route::get('/activity', 'ActivityController');

            /* DASHBOARD */
            Route::get('/dashboard', 'DashboardController');

            /* ADMIN */
            Route::get('/admin', 'AdminController@index');
            Route::get('/admin__add', 'AdminController@add');
            Route::post('/admin__save', 'AdminController@create');
            Route::get('/admin__edit/{id}', 'AdminController@edit');
            Route::post('/admin__update/{id}', 'AdminController@update');
            Route::get('/admin__delete/{id}', 'AdminController@delete');

            /* USER */
            Route::get('/user', 'AdminController@index');

            /* ABOUT US */
            Route::get('/aboutus', 'AboutController@index');
            Route::post('/aboutus__edit', 'AboutController@save');

            /* CONTACT US */
            Route::get('/contactus', 'ContactController@index');
            Route::get('/contactus__delete/{id}', 'ContactController@delete');

            /* NEWS */
            Route::get('/news', 'NewsController@index');
            Route::get('/news__add', 'NewsController@add');
            Route::post('/news__save', 'NewsController@create');
            Route::get('/news__edit/{id}', 'NewsController@edit');
            Route::post('/news__update/{id}', 'NewsController@update');
            Route::get('/news__delete/{id}', 'NewsController@delete');

            /* BANNER */
            Route::get('/banner', 'BannerController@index');
            Route::get('/banner__add', 'BannerController@add');
            Route::post('/banner__save', 'BannerController@create');
            Route::get('/banner__edit/{id}', 'BannerController@edit');
            Route::post('/banner__update/{id}', 'BannerController@update');
            Route::get('/banner__delete/{id}', 'BannerController@delete');

            /* BANNER */
            Route::get('/opportunity', 'OpportunityController@index');
            Route::get('/opportunity__add', 'OpportunityController@add');
            Route::post('/opportunity__save', 'OpportunityController@create');
            Route::get('/opportunity__edit/{id}', 'OpportunityController@edit');
            Route::post('/opportunity__update/{id}', 'OpportunityController@update');
            Route::get('/opportunity__delete/{id}', 'OpportunityController@delete');

        });

    });
});
