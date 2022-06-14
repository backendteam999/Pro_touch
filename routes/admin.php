<?php

use App\Http\Controllers\LoginController;
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



Route::post('admin/login',[LoginController::class, 'adminLogin'])->name('adminLogin');
Route::group( ['prefix' => 'admin','middleware' => ['auth:admin-api','scopes:admin'] ],function(){
    // authenticated staff routes here
  //  Route::get('dashboard',[LoginController::class, 'adminDashboard']);
//    Route::get('/','AdminController@index');
//    Route::post('/store', 'AdminController@store');
//    Route::get('/show/{id}', 'AdminController@show');
//    Route::put('/update/{id}', 'AdminController@update');
//    Route::delete('/delete/{id}', 'AdminController@destroy');

    Route::group( ['namespace' => 'Admin'],function(){
        //////////////////////////////doctor/////////////////////////////////////////////////////
        Route::group( ['prefix' => 'doctor'],function(){

        Route::get('/','DoctorcardController@index');
        Route::post('/store', 'DoctorcardController@store');
        Route::get('/show/{id}', 'DoctorcardController@show');
        Route::put('/update/{id}', 'DoctorcardController@update');
        Route::delete('/delete/{id}', 'DoctorcardController@destroy');
    });

    /////////////////////////////////// Reception //////////////////////////////////
    Route::group( ['prefix' => 'reception'],function(){
        Route::get('/', 'ReceptioncradController@index');
        Route::post('/store', 'ReceptioncradController@store');
        Route::get('/show/{id}', 'ReceptioncradController@show');
        Route::put('/update/{id}', 'ReceptioncradController@update');
        Route::delete('/delete/{id}', 'ReceptioncradController@delete');
    });
    /////////////////////////////////// Clinic //////////////////////////////////
    Route::group( ['prefix' => 'clinic'],function(){
        Route::get('/', 'CliniccradController@index');
        Route::get('/show/{id}', 'CliniccradController@show');
        Route::put('/update/{id}', 'CliniccradController@update');
    });
    /////////////////////////////////// Device //////////////////////////////////
    Route::group( ['prefix' => 'device'],function(){
        Route::get('/', 'DevicecradController@index');
        Route::post('/store', 'DevicecradController@store');
        Route::get('/show/{id}', 'DevicecradController@show');
        Route::put('/update/{id}', 'DevicecradController@update');
        Route::delete('/delete/{id}', 'DevicecradController@delete');
    });
    /////////////////////////////////// Offers //////////////////////////////////
    Route::group( ['prefix' => 'offer'],function(){
        Route::get('/', 'OffercradController@index');
        Route::post('/store', 'OffercradController@store');
        Route::get('/show/{id}', 'OffercradController@show');
        Route::put('/update/{id}', 'OffercradController@update');
        Route::delete('/delete/{id}', 'OffercradController@delete');
    }); /////////////////////////////////// Service //////////////////////////////////
    Route::group( ['prefix' => 'service'],function(){
        Route::get('/', 'ServicecradController@index');
        Route::post('/store', 'ServicecradController@store');
        Route::get('/show/{id}', 'ServicecradController@show');
        Route::put('/update/{id}', 'ServicecradController@update');
        Route::delete('/delete/{id}', 'ServicecradController@delete');
    });
});
});
//Route::group(['middleware' => 'auth:api'], function() {

//});


