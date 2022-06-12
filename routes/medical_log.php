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




/////////////////////////////////// Medical Log //////////////////////////////////
Route::get('/', 'MedicalLogController@index');
Route::post('/store', 'MedicalLogController@store');
Route::get('/show/{id}', 'MedicalLogController@show');
Route::put('/update/{id}', 'MedicalLogController@update');
Route::delete('/delete/{id}', 'MedicalLogController@delete');
