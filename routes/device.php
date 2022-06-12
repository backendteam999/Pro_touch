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

/////////////////////////////////// Device //////////////////////////////////
Route::get('/', 'DeviceController@index');
Route::post('/store', 'DeviceController@store');
Route::get('/show/{id}', 'DeviceController@show');
Route::put('/update/{id}', 'DeviceController@update');
Route::delete('/delete/{id}', 'DeviceController@delete');

