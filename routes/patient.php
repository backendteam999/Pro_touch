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





/////////////////////////////////// Patient //////////////////////////////////
//Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/', 'PatientController@index');
    Route::post('/store', 'PatientController@store');
    Route::get('/show/{id}', 'PatientController@show');
    Route::put('/update/{id}', 'PatientController@update');
    Route::delete('/delete/{id}', 'PatientController@delete');
//});

