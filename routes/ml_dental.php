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


/////////////////////////////////// ML Dental //////////////////////////////////
Route::get('/', 'MLDentalController@index');
Route::post('/store', 'MLDentalController@store');
Route::get('/show/{id}', 'MLDentalController@show');
Route::put('/{id}', 'MLDentalController@update');
Route::delete('/delete/{id}', 'MLDentalController@delete');

