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





/////////////////////////////////// ML Nutrition //////////////////////////////////
Route::get('/', 'MLNutritionController@index');
Route::post('/store', 'MLNutritionController@store');
Route::get('/show/{id}', 'MLNutritionController@show');
Route::put('/update/{id}', 'MLNutritionController@update');
Route::delete('/delete/{id}', 'MLNutritionController@delete');

