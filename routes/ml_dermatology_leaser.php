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

/////////////////////////////////// ML Dermatology & Leaser //////////////////////////////////
Route::get('/', 'MLDermatologyLeaserController@index');
Route::post('/store', 'MLDermatologyLeaserController@store');
Route::get('/show/{id}', 'MLDermatologyLeaserController@show');
Route::put('/update/{id}', 'MLDermatologyLeaserController@update');
Route::delete('/delete/{id}', 'MLDermatologyLeaserController@delete');

