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

Route::get('/', 'indexController@index');
Route::get('/sorry', 'indexController@sorry');

Route::get('/api/league', 'apiController@league');
Route::get('/api/club', 'apiController@club');
Route::get('/api/match', 'apiController@match');
Route::get('/api/standing/{league}/{club}', 'apiController@standing');

Route::post('/api/league', 'apiController@storeLeague');
Route::post('/api/club', 'apiController@storeClub');
Route::post('/api/match/{ui}', 'apiController@storeMatch');
