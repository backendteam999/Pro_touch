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



/////////////////////////////////// Doctor //////////////////////////////////
//Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/','AdminController@index');
    Route::post('/store', 'AdminController@store');
    Route::get('/show/{id}', 'AdminController@show');
    Route::put('/update/{id}', 'AdminController@update');
    Route::delete('/delete/{id}', 'AdminController@destroy');
//});


