<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\DataRt;
use App\DataPenduduk;
use Barryvdh\DomPDF\Facade\Pdf;

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
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// });

Route::group(['middleware' => ['auth']], function () {

    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::group(['prefix' => 'rw'], function () {
        Route::get('/', 'RwController@index')->name('rw.index');
        Route::post('/store', 'RwController@store')->name('rw.store');
        Route::put('/update/{id}', 'RwController@update')->name('rw.update');
        Route::delete('/delete/{id}', 'RwController@destroy')->name('rw.delete');
    });
    Route::group(['prefix' => 'rt'], function () {
        Route::get('/', 'RtController@index')->name('rt.index');
        Route::post('/store', 'RtController@store')->name('rt.store');
        Route::put('/update/{id}', 'RtController@update')->name('rt.update');
        Route::delete('/delete/{id}', 'RtController@destroy')->name('rt.delete');
    });
    Route::group(['prefix' => 'kk'], function () {
        Route::get('/', 'KkController@index')->name('kk.index');
        Route::post('/store', 'KkController@store')->name('kk.store');
        Route::get('/{id}/showPenduduk', 'KkController@show')->name('kk.show');
        Route::put('/update/{id}', 'KkController@update')->name('kk.update');
        Route::delete('/delete/{id}', 'KkController@destroy')->name('kk.delete');
        Route::post('{id}/showPenduduk/store', 'PendudukController@store')->name('kk.storePdd');
        Route::delete('{id}/showPenduduk/delete', 'PendudukController@destroy')->name('kk.deletePdd');
        Route::put('{id}/showPenduduk/edit', 'PendudukController@update')->name('kk.editPdd');
    });
    Route::group(['prefix' => 'penduduk'], function () {
        Route::get('/', 'PendudukController@index')->name('penduduk.index');
        Route::get('/export/{id}', 'PendudukController@export')->name('penduduk.export');
        Route::get('/exportRt/{id}', 'PendudukController@exportRt')->name('penduduk.exportRt');
        Route::get('/exportRw/{id}', 'PendudukController@exportRw')->name('penduduk.exportRw');
        Route::get('/exportAll/{id}', 'PendudukController@exportAll')->name('penduduk.exportAll');
        Route::get('/filter', 'PendudukController@filter')->name('filter.data');
    });

    Route::post('/edit-profile', 'DashboardController@editProfile')->name('profile.edit');
    Route::get('/home', 'HomeController@index')->name('home');
});

Auth::routes();
