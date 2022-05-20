<?php

namespace App\Http\Controllers;

use App\Models\Medical_log;
use App\Models\ML_Dental_Clinic;
use Illuminate\Http\Request;

class MLDentalController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $ml_dental = ML_Dental_Clinic::get();
        return response()->json(new Message($ml_dental, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $rules = [
            'smoking'=> 'boolean|required',
            'Oral_Allergic'=> 'string|required',
            'medical_log_id'=> 'string|required',

        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $ml_dental_data = [];

        if($request->has('smoking')) if(!is_null($request->smoking)) $ml_dental_data['smoking'] = $request->smoking;
        if($request->has('Oral_Allergic')) if(!is_null($request->Oral_Allergic)) $ml_dental_data['Oral_Allergic'] = $request->Oral_Allergic;
        if($request->has('medical_log_id')) if(!is_null($request->medical_log_id)) $ml_dental_data['medical_log_id'] = $request->medical_log_id;


        try
        {
            $ml_dental = ML_Dental_Clinic::create($ml_dental_data);
            $ml_dental = $ml_dental->ML_Dental_Clinic()->create($ml_dental_data);
            return response()->json(new Message($ml_dental->load('ml_dental'), '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show(ML_Dental_Clinic  $ml_dental)
    {
        return response()->json(new Message($ml_dental, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, ML_Dental_Clinic  $ml_dental)
    {
        $rules = [
            'smoking'=> 'boolean|required',
            'Oral_Allergic'=> 'string|required',
            'medical_log_id'=> 'string|required',

        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $ml_dental_data = [];

        if($request->has('smoking')) if(!is_null($request->smoking)) $ml_dental_data['smoking'] = $request->smoking;
        if($request->has('Oral_Allergic')) if(!is_null($request->Oral_Allergic)) $ml_dental_data['Oral_Allergic'] = $request->Oral_Allergic;
        if($request->has('medical_log_id')) if(!is_null($request->medical_log_id)) $ml_dental_data['medical_log_id'] = $request->medical_log_id;

        try
        {
            $ml_dental->update($ml_dental_data);
            $ml_dental->update($ml_dental_data);
            return response()->json(new Message($ml_dental->load('ml_dental'),'200', true, 'info', 'done', 'تم'));

        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy(ML_Dental_Clinic  $ml_dental)
    {
        try
        {
            $ml_dental->delete();
            return response()->json(new Message( $ml_dental,'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }
}
