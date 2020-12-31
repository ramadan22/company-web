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

Route::get('/', function () {
    return view('index');
});

/* ADMIN PAGE */
Route::get('/admin', function () {
    // return view('admin/pages/home');
    return view('admin/login');
});

/* ABOUT US */
Route::get('/admin/aboutus', 'AboutusController@index');
Route::post('/admin/aboutus__edit', 'aboutusController@edit')->name('/admin/aboutus__edit');

/* CONTACT US */
Route::get('/admin/contactus', 'ContactusController@index');
Route::get('/admin/contactus__delete/{id}', 'ContactusController@delete')->name('/admin/contactus__delete');

/* NEWS */
Route::get('/admin/news', 'NewsController@index');
Route::post('/admin/news__add', 'NewsController@add')->name('/admin/news__add');
Route::get('/admin/news__delete/{id}', 'NewsController@delete')->name('/admin/news__delete');
Route::post('/admin/news__edit', 'NewsController@edit')->name('/admin/news__edit');
Route::post('/admin/news/get-edit', 'NewsController@getEdit')->name('/admin/news/get-edit');

/* BANNER */
Route::get('/admin/banner', 'BannerController@index');
Route::post('/admin/banner__add', 'BannerController@add')->name('/admin/banner__add');
Route::get('/admin/banner__delete/{id}', 'BannerController@delete')->name('/admin/banner__delete');
Route::post('/admin/banner__edit', 'BannerController@edit')->name('/admin/banner__edit');
Route::post('/admin/banner/get-edit', 'BannerController@getEdit')->name('/admin/banner/get-edit');
