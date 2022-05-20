<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Medical_log;
use Illuminate\Http\Request;

class MedicalLogController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $medical_log = Medical_log::get();
        return response()->json(new Message($medical_log, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $rules = [
            'patient_id'=> 'integer|required',
            'weight'=> 'double|required',
            'Allergic'=> 'string|required',
            'situation'=> 'string|required',
            'chronic_diseases'=> 'string|required',
            'genetic_diseases'=> 'string|required',
            'surgery'=> 'string|required',
            'medicine'=> 'string|required',
            'notes'=> 'text|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $medical_log_data = [];

        if($request->has('patient_id')) if(!is_null($request->patient_id)) $medical_log_data['patient_id'] = $request->patient_id;
        if($request->has('weight')) if(!is_null($request->weight)) $medical_log_data['weight'] = $request->weight;
        if($request->has('Allergic')) if(!is_null($request->Allergic)) $medical_log_data['Allergic'] = $request->Allergic;
        if($request->has('situation')) if(!is_null($request->situation)) $medical_log_data['situation'] = $request->situation;
        if($request->has('chronic_diseases')) if(!is_null($request->chronic_diseases)) $medical_log_data['chronic_diseases'] = $request->chronic_diseases;
        if($request->has('genetic_diseases')) if(!is_null($request->genetic_diseases)) $medical_log_data['genetic_diseases'] = $request->genetic_diseases;
        if($request->has('surgery')) if(!is_null($request->surgery)) $medical_log_data['surgery'] = $request->surgery;
        if($request->has('medicine')) if(!is_null($request->medicine)) $medical_log_data['medicine'] = $request->medicine;
        if($request->has('notes')) if(!is_null($request->notes)) $medical_log_data['notes'] = $request->notes;


        try
        {
            $medical_log = Medical_log::create($medical_log_data);
            $medical_log = $medical_log->Medical_log()->create($medical_log_data);
            return response()->json(new Message($medical_log->load('device'), '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show(Medical_log  $medical_log)
    {
        return response()->json(new Message($medical_log, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, Medical_log  $medical_log)
    {
        $rules = [
            'patient_id'=> 'integer|required',
            'weight'=> 'double|required',
            'Allergic'=> 'string|required',
            'situation'=> 'string|required',
            'chronic_diseases'=> 'string|required',
            'genetic_diseases'=> 'string|required',
            'surgery'=> 'string|required',
            'medicine'=> 'string|required',
            'notes'=> 'text|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $medical_log_data = [];

        if($request->has('patient_id')) if(!is_null($request->patient_id)) $medical_log_data['patient_id'] = $request->patient_id;
        if($request->has('weight')) if(!is_null($request->weight)) $medical_log_data['weight'] = $request->weight;
        if($request->has('Allergic')) if(!is_null($request->Allergic)) $medical_log_data['Allergic'] = $request->Allergic;
        if($request->has('situation')) if(!is_null($request->situation)) $medical_log_data['situation'] = $request->situation;
        if($request->has('chronic_diseases')) if(!is_null($request->chronic_diseases)) $medical_log_data['chronic_diseases'] = $request->chronic_diseases;
        if($request->has('genetic_diseases')) if(!is_null($request->genetic_diseases)) $medical_log_data['genetic_diseases'] = $request->genetic_diseases;
        if($request->has('surgery')) if(!is_null($request->surgery)) $medical_log_data['surgery'] = $request->surgery;
        if($request->has('medicine')) if(!is_null($request->medicine)) $medical_log_data['medicine'] = $request->medicine;
        if($request->has('notes')) if(!is_null($request->notes)) $medical_log_data['notes'] = $request->notes;

        try
        {
            $medical_log->update($medical_log_data);
            $medical_log->update($medical_log_data);
            return response()->json(new Message($medical_log->load('medical_log'),'200', true, 'info', 'done', 'تم'));

        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy(Medical_log  $medical_log)
    {
        try
        {
            $medical_log->delete();
            return response()->json(new Message( $medical_log,'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }
}
