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
    Route::group(['middleware' => 'auth'], function () {
        Route::get('/admin', 'AuthController@index');
        Route::post('/login', 'AuthController@login');
    });


    Route::group(['prefix' => '/admin', 'middleware' => 'guest'], function () {
        // logout
        Route::get('/logout', 'AuthController@logout');

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
        Route::get('/contactus__delete/{id}', 'ContactController@delete')->name('/admin/contactus__delete');

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
