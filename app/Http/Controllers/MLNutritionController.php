<?php

namespace App\Http\Controllers;

use App\Models\ML_Dental_Clinic;
use App\Models\ML_Nutrition_Clinic;
use Illuminate\Http\Request;

class MLNutritionController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $ml_nutrition = ML_Nutrition_Clinic::get();
        return response()->json(new Message($ml_nutrition, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $rules = [
            'allergy'=> 'string|required',
            'job'=> 'string|required',
            'length'=> 'integer|required',
            'age'=> 'integer|required',
            'sport_schedule'=> 'text|required',
            'medical_log_id'=> 'integer|required',

        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $ml_nutrition_data = [];

        if($request->has('allergy')) if(!is_null($request->allergy)) $ml_nutrition_data['allergy'] = $request->allergy;
        if($request->has('job')) if(!is_null($request->job)) $ml_nutrition_data['job'] = $request->job;
        if($request->has('length')) if(!is_null($request->length)) $ml_nutrition_data['length'] = $request->length;
        if($request->has('age')) if(!is_null($request->age)) $ml_nutrition_data['age'] = $request->age;
        if($request->has('sport_schedule')) if(!is_null($request->sport_schedule)) $ml_nutrition_data['sport_schedule'] = $request->sport_schedule;
        if($request->has('medical_log_id')) if(!is_null($request->medical_log_id)) $ml_nutrition_data['medical_log_id'] = $request->medical_log_id;


        try
        {
            $ml_nutrition = ML_Nutrition_Clinic::create($ml_nutrition_data);
            $ml_nutrition = $ml_nutrition->ML_Nutrition_Clinic()->create($ml_nutrition_data);
            return response()->json(new Message($ml_nutrition->load('ml_nutrition'), '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show(ML_Nutrition_Clinic  $ml_nutrition)
    {
        return response()->json(new Message($ml_nutrition, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, ML_Nutrition_Clinic  $ml_nutrition)
    {
        $rules = [
            'allergy'=> 'string|required',
            'job'=> 'string|required',
            'length'=> 'integer|required',
            'age'=> 'integer|required',
            'sport_schedule'=> 'text|required',
            'medical_log_id'=> 'integer|required',

        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $ml_nutrition_data = [];

        if($request->has('allergy')) if(!is_null($request->allergy)) $ml_nutrition_data['allergy'] = $request->allergy;
        if($request->has('job')) if(!is_null($request->job)) $ml_nutrition_data['job'] = $request->job;
        if($request->has('length')) if(!is_null($request->length)) $ml_nutrition_data['length'] = $request->length;
        if($request->has('age')) if(!is_null($request->age)) $ml_nutrition_data['age'] = $request->age;
        if($request->has('sport_schedule')) if(!is_null($request->sport_schedule)) $ml_nutrition_data['sport_schedule'] = $request->sport_schedule;
        if($request->has('medical_log_id')) if(!is_null($request->medical_log_id)) $ml_nutrition_data['medical_log_id'] = $request->medical_log_id;

        try
        {
            $ml_nutrition->update($ml_nutrition_data);
            $ml_nutrition->update($ml_nutrition_data);
            return response()->json(new Message($ml_nutrition->load('ml_nutrition'),'200', true, 'info', 'done', 'تم'));

        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy(ML_Nutrition_Clinic  $ml_nutrition)
    {
        try
        {
            $ml_nutrition->delete();
            return response()->json(new Message( $ml_nutrition,'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }
}
