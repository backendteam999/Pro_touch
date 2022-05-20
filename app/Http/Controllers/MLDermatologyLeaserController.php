<?php

namespace App\Http\Controllers;

use App\Models\ML_Dental_Clinic;
use App\Models\ML_Dermatology_laser_clinic;
use Illuminate\Http\Request;

class MLDermatologyLeaserController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $ml_dermatology_leaser = ML_Dermatology_laser_clinic::get();
        return response()->json(new Message($ml_dermatology_leaser, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $rules = [
            'skin_type'=> 'string|required',
            'skin_colour'=> 'string|required',
            'skin_allergies'=> 'string|required',
            'job'=> 'string|required',
            'medical_log_id'=> 'string|required',

        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $ml_dermatology_leaser_data = [];

        if($request->has('skin_type')) if(!is_null($request->skin_type)) $ml_dermatology_leaser_data['skin_type'] = $request->skin_type;
        if($request->has('skin_colour')) if(!is_null($request->skin_colour)) $ml_dermatology_leaser_data['skin_colour'] = $request->skin_colour;
        if($request->has('skin_allergies')) if(!is_null($request->skin_allergies)) $ml_dermatology_leaser_data['skin_allergies'] = $request->skin_allergies;
        if($request->has('job')) if(!is_null($request->job)) $ml_dermatology_leaser_data['job'] = $request->job;
        if($request->has('medical_log_id')) if(!is_null($request->medical_log_id)) $ml_dermatology_leaser_data['medical_log_id'] = $request->medical_log_id;


        try
        {
            $ml_dermatology_leaser = ML_Dermatology_laser_clinic::create($ml_dermatology_leaser_data);
            $ml_dermatology_leaser = $ml_dermatology_leaser->ML_Dermatology_laser_clinic()->create($ml_dermatology_leaser_data);
            return response()->json(new Message($ml_dermatology_leaser->load('ml_dermatology_leaser'), '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show(ML_Dermatology_laser_clinic  $ml_dermatology_leaser)
    {
        return response()->json(new Message($ml_dermatology_leaser, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, ML_Dermatology_laser_clinic  $ml_dermatology_leaser)
    {
        $rules = [
            'skin_type'=> 'string|required',
            'skin_colour'=> 'string|required',
            'skin_allergies'=> 'string|required',
            'job'=> 'string|required',
            'medical_log_id'=> 'string|required',

        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $ml_dermatology_leaser_data = [];

        if($request->has('skin_type')) if(!is_null($request->skin_type)) $ml_dermatology_leaser_data['skin_type'] = $request->skin_type;
        if($request->has('skin_colour')) if(!is_null($request->skin_colour)) $ml_dermatology_leaser_data['skin_colour'] = $request->skin_colour;
        if($request->has('skin_allergies')) if(!is_null($request->skin_allergies)) $ml_dermatology_leaser_data['skin_allergies'] = $request->skin_allergies;
        if($request->has('job')) if(!is_null($request->job)) $ml_dermatology_leaser_data['job'] = $request->job;
        if($request->has('medical_log_id')) if(!is_null($request->medical_log_id)) $ml_dermatology_leaser_data['medical_log_id'] = $request->medical_log_id;

        try
        {
            $ml_dermatology_leaser->update($ml_dermatology_leaser_data);
            $ml_dermatology_leaser->update($ml_dermatology_leaser_data);
            return response()->json(new Message($ml_dermatology_leaser->load('ml_dermatology_leaser'),'200', true, 'info', 'done', 'تم'));

        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy(ML_Dermatology_laser_clinic  $ml_dermatology_leaser)
    {
        try
        {
            $ml_dermatology_leaser->delete();
            return response()->json(new Message( $ml_dermatology_leaser,'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }
}
