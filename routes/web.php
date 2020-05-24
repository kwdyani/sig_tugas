<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
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
    return view('/dashboard');
});
Route::resource('/dashboard', 'CovidController');
Route::get('/positif','CovidController@index');
Route::get('/positif/tambah','CovidController@tambah');
Route::post('/positif/store','CovidController@store');
Route::get('/positif/edit/{id}','CovidController@edit');
Route::post('/positif/update','CovidController@update');
Route::get('/positif/hapus/{id}','CovidController@hapus');
Route::get('/dashboard','CovidController@dashboard');
Route::get('/dashboard/cari','CovidController@cari');

Route::get('/dashboard/search','CovidController@search');


Route::get('/getDataMap', 'CovidController@getDataMap');
// Route::get('/data/getPositif', 'PositifController@getPositif');
Route::get('/create-pallete','CovidController@createPallette');
