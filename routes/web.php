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

Route::group(['namespace' => 'Frontend'], function () {
    Route::get('/', 'HomeController');
});

Route::group(['namespace' => 'Backend'], function () {
    // auth
    Route::group(['namespace' => 'Auth', 'middleware' => 'auth'], function () {
        Route::get('/admin', 'LoginController@index');
        Route::post('/login', 'LoginController@login');
        Route::post('/register', 'RegisterController@register');
    });

    Route::group(['prefix' => '/admin', 'middleware' => 'guest'], function () {
        /* ADMIN */
        Route::group(['namespace' => 'Admin'], function () {
            Route::get('/admin', 'AdminController@index');
            // Route::post('/aboutus__edit', 'AboutController@save');
        });

        /* ABOUT US */
        Route::group(['namespace' => 'About'], function () {
            Route::get('/aboutus', 'AboutController@index');
            Route::post('/aboutus__edit', 'AboutController@save');
        });

        /* CONTACT US */
        Route::group(['namespace' => 'Contact'], function () {
            Route::get('/contactus', 'ContactController@index');
            Route::get('/contactus__delete/{id}', 'ContactController@delete')->name('/admin/contactus__delete');
        });

        /* NEWS */
        Route::get('/news', 'NewsController@index');
        Route::post('/news__add', 'NewsController@add')->name('/admin/news__add');
        Route::get('/news__delete/{id}', 'NewsController@delete')->name('/admin/news__delete');
        Route::post('/news__edit', 'NewsController@edit')->name('/admin/news__edit');
        Route::post('/news/get-edit', 'NewsController@getEdit')->name('/admin/news/get-edit');

        /* BANNER */
        Route::get('/banner', 'BannerController@index');
        Route::post('/banner__add', 'BannerController@add')->name('/admin/banner__add');
        Route::get('/banner__delete/{id}', 'BannerController@delete')->name('/admin/banner__delete');
        Route::post('/banner__edit', 'BannerController@edit')->name('/admin/banner__edit');
        Route::post('/banner/get-edit', 'BannerController@getEdit')->name('/admin/banner/get-edit');

    });

});
