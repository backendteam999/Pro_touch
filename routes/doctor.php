<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;

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


Route::post('doctor/login',[LoginController::class, 'userLogin'])->name('userLogin');
Route::group( ['middleware' => ['auth:user-api','scopes:user'] ],function(){
    // authenticated staff routes here
    Route::get('dashboard',[LoginController::class, 'userDashboard']);
    /////////////////////////////////// Patient //////////////////////////////////
    Route::group( ['prefix' => 'patient','namespace' => 'Patient'],function(){
        Route::get('/', 'PatientController@index');
        Route::post('/store', 'PatientController@store');
        Route::get('/show/{id}', 'PatientController@show');
        Route::put('/update/{id}', 'PatientController@update');
        Route::delete('/delete/{id}', 'PatientController@delete');
    });
});
/////////////////////////////////// Doctor //////////////////////////////////
//Route::group(['middleware' => 'auth:api'], function() {

//});


