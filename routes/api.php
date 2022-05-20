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

Route::middleware('auth:sanctum')->get('/ujhgjhgjhgjhgjhgser', function (Request $request) {
    return $request->user();
});


/////////////////////////////////// Admin //////////////////////////////////
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('admin', 'AdminController@index');
});


/////////////////////////////////// Doctor //////////////////////////////////
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/doctor', 'DoctorController@index');
    Route::post('/doctor', 'DoctorController@store');
    Route::get('/doctor/{id}', 'DocorController@show');
    Route::put('/doctor/{id}', 'DoctorController@update');
    Route::delete('/doctor/{id}', 'DoctorController@delete');
});


/////////////////////////////////// Reception //////////////////////////////////
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/reception', 'ReceptionController@index');
    Route::post('/reception', 'ReceptionController@store');
    Route::get('/reception/{id}', 'ReceptionController@show');
    Route::put('/reception/{id}', 'ReceptionController@update');
    Route::delete('/reception/{id}', 'ReceptionController@delete');
});


/////////////////////////////////// Patient //////////////////////////////////
Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/patient', 'PatientController@index');
    Route::post('/patient', 'PatientController@store');
    Route::get('/patient/{id}', 'PatientController@show');
    Route::put('/patient/{id}', 'PatientController@update');
    Route::delete('/patient/{id}', 'PatientController@delete');
});


/////////////////////////////////// Clinic //////////////////////////////////
Route::get('/clinic', 'ClinicController@index');
Route::get('/clinic/{id}', 'ClinicController@show');
Route::put('/clinic/{id}', 'ClinicController@update');


/////////////////////////////////// Medical Log //////////////////////////////////
Route::get('/medical_log', 'MedicalLogController@index');
Route::post('/medical_log', 'MedicalLogController@store');
Route::get('/medical_log/{id}', 'MedicalLogController@show');
Route::put('/medical_log/{id}', 'MedicalLogController@update');
Route::delete('/medical_log/{id}', 'MedicalLogController@delete');


/////////////////////////////////// ML Dental //////////////////////////////////
Route::get('/ml_dental', 'MLDentalController@index');
Route::post('/ml_dental', 'MLDentalController@store');
Route::get('/ml_dental/{id}', 'MLDentalController@show');
Route::put('/ml_dental/{id}', 'MLDentalController@update');
Route::delete('/ml_dental/{id}', 'MLDentalController@delete');


/////////////////////////////////// ML Nutrition //////////////////////////////////
Route::get('/ml_nutrition', 'MLNutritionController@index');
Route::post('/ml_nutrition', 'MLNutritionController@store');
Route::get('/ml_nutrition/{id}', 'MLNutritionController@show');
Route::put('/ml_nutrition/{id}', 'MLNutritionController@update');
Route::delete('/ml_nutrition/{id}', 'MLNutritionController@delete');


/////////////////////////////////// ML Dermatology & Leaser //////////////////////////////////
Route::get('/ml_dermatology_leaser', 'MLDermatologyLeaserController@index');
Route::post('/ml_dermatology_leaser', 'MLDermatologyLeaserController@store');
Route::get('/ml_dermatology_leaser/{id}', 'MLDermatologyLeaserController@show');
Route::put('/ml_dermatology_leaser/{id}', 'MLDermatologyLeaserController@update');
Route::delete('/ml_dermatology_leaser/{id}', 'MLDermatologyLeaserController@delete');


/////////////////////////////////// Offers //////////////////////////////////
Route::get('/offers', 'OfferController@index');
Route::post('/offers', 'OfferController@store');
Route::get('/offers/{id}', 'OfferController@show');
Route::put('/offers/{id}', 'OfferController@update');
Route::delete('/offers/{id}', 'OfferController@delete');


/////////////////////////////////// Device //////////////////////////////////
Route::get('/device', 'DeviceController@index');
Route::post('/device', 'DeviceController@store');
Route::get('/device/{id}', 'DeviceController@show');
Route::put('/device/{id}', 'DeviceController@update');
Route::delete('/device/{id}', 'DeviceController@delete');


/////////////////////////////////// Review //////////////////////////////////
Route::get('/review', 'ReviewController@index');
Route::post('/review', 'ReviewController@store');
Route::get('/review/{id}', 'ReviewController@show');
Route::put('/review/{id}', 'ReviewController@update');


/////////////////////////////////// Reservation //////////////////////////////////
Route::get('/reservation', 'ReservationController@index');
Route::post('/reservation', 'ReservationController@store');
Route::get('/reservation/{id}', 'ReservationController@show');
Route::delete('/reservation/{id}', 'ReservationController@delete');
