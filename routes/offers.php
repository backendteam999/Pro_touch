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


/////////////////////////////////// Offers //////////////////////////////////
Route::get('/', 'OfferController@index');
Route::post('/store', 'OfferController@store');
Route::get('/show/{id}', 'OfferController@show');
Route::put('/update/{id}', 'OfferController@update');
Route::delete('/delete/{id}', 'OfferController@delete');

