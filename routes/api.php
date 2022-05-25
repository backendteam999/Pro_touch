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
    Route::get('/admin', 'AdminController@index');
});


/////////////////////////////////// Doctor //////////////////////////////////
//Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/doctor','DoctorController@index');
    Route::post('/doctor/store', 'DoctorController@store');
    Route::get('/doctor/show/{id}', 'DoctorController@show');
    Route::put('/doctor/update/{id}', 'DoctorController@update');
    Route::delete('/doctor/delete/{id}', 'DoctorController@destroy');
//});


/////////////////////////////////// Reception //////////////////////////////////
//Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/reception', 'ReceptionController@index');
    Route::post('/reception/store', 'ReceptionController@store');
    Route::get('/reception/show/{id}', 'ReceptionController@show');
    Route::put('/reception/update/{id}', 'ReceptionController@update');
    Route::delete('/reception/delete/{id}', 'ReceptionController@delete');
//});


/////////////////////////////////// Patient //////////////////////////////////
//Route::group(['middleware' => 'auth:api'], function() {
    Route::get('/patient', 'PatientController@index');
    Route::post('/patient/store', 'PatientController@store');
    Route::get('/patient/show/{id}', 'PatientController@show');
    Route::put('/patient/update/{id}', 'PatientController@update');
    Route::delete('/patient/delete/{id}', 'PatientController@delete');
//});


/////////////////////////////////// Clinic //////////////////////////////////
Route::get('/clinic', 'ClinicController@index');
Route::get('/clinic/show/{id}', 'ClinicController@show');
Route::put('/clinic/update/{id}', 'ClinicController@update');


/////////////////////////////////// Medical Log //////////////////////////////////
Route::get('/medical_log', 'MedicalLogController@index');
Route::post('/medical_log/store', 'MedicalLogController@store');
Route::get('/medical_log/show/{id}', 'MedicalLogController@show');
Route::put('/medical_log/update/{id}', 'MedicalLogController@update');
Route::delete('/medical_log/delete/{id}', 'MedicalLogController@delete');


/////////////////////////////////// ML Dental //////////////////////////////////
Route::get('/ml_dental', 'MLDentalController@index');
Route::post('/ml_dental/store', 'MLDentalController@store');
Route::get('/ml_dental/show/{id}', 'MLDentalController@show');
Route::put('/ml_dental/update/{id}', 'MLDentalController@update');
Route::delete('/ml_dental/delete/{id}', 'MLDentalController@delete');


/////////////////////////////////// ML Nutrition //////////////////////////////////
Route::get('/ml_nutrition', 'MLNutritionController@index');
Route::post('/ml_nutrition/store', 'MLNutritionController@store');
Route::get('/ml_nutrition/show/{id}', 'MLNutritionController@show');
Route::put('/ml_nutrition/update/{id}', 'MLNutritionController@update');
Route::delete('/ml_nutrition/delete/{id}', 'MLNutritionController@delete');


/////////////////////////////////// ML Dermatology & Leaser //////////////////////////////////
Route::get('/ml_dermatology_leaser', 'MLDermatologyLeaserController@index');
Route::post('/ml_dermatology_leaser/store', 'MLDermatologyLeaserController@store');
Route::get('/ml_dermatology_leaser/show/{id}', 'MLDermatologyLeaserController@show');
Route::put('/ml_dermatology_leaser/update/{id}', 'MLDermatologyLeaserController@update');
Route::delete('/ml_dermatology_leaser/delete/{id}', 'MLDermatologyLeaserController@delete');


/////////////////////////////////// Offers //////////////////////////////////
Route::get('/offers', 'OfferController@index');
Route::post('/offers/store', 'OfferController@store');
Route::get('/offers/show/{id}', 'OfferController@show');
Route::put('/offers/update/{id}', 'OfferController@update');
Route::delete('/offers/delete/{id}', 'OfferController@delete');


/////////////////////////////////// Device //////////////////////////////////
Route::get('/device', 'DeviceController@index');
Route::post('/device/store', 'DeviceController@store');
Route::get('/device/show/{id}', 'DeviceController@show');
Route::put('/device/update/{id}', 'DeviceController@update');
Route::delete('/device/delete/{id}', 'DeviceController@delete');


/////////////////////////////////// Review //////////////////////////////////
Route::get('/review', 'ReviewController@index');
Route::post('/review/store', 'ReviewController@store');
Route::get('/review/show/{id}', 'ReviewController@show');
Route::put('/review/update/{id}', 'ReviewController@update');


/////////////////////////////////// Reservation //////////////////////////////////
Route::get('/reservation', 'ReservationController@index');
Route::post('/reservation/store', 'ReservationController@store');
Route::get('/reservation/show/{id}', 'ReservationController@show');
Route::delete('/reservation/delete/{id}', 'ReservationController@delete');
