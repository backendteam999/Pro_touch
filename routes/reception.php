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
/////////////////////////////////// Reception //////////////////////////////////
//Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/', 'ReceptionController@index');
    Route::post('/store', 'ReceptionController@store');
    Route::get('/show/{id}', 'ReceptionController@show');
    Route::put('/update/{id}', 'ReceptionController@update');
    Route::delete('/delete/{id}', 'ReceptionController@delete');
//});


