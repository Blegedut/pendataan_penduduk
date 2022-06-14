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
    return view('dashboard');
});

Route::group(['prefix' => 'rw'], function () {
    Route::get('/', 'RwController@index')->name('rw.index');
    Route::post('/store', 'RwController@store')->name('rw.store');
});
Route::group(['prefix' => 'rt'], function () {
    Route::get('/', 'RtController@index')->name('rt.index');
});
Route::group(['prefix' => 'kk'], function () {
    Route::get('/', 'KkController@index')->name('kk.index');
});
Route::group(['prefix' => 'penduduk'], function () {
    Route::get('/', 'PendudukController@index')->name('penduduk.index');
});
