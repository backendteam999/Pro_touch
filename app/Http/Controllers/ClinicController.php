<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Device;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $clinic = Clinic::get();
        return response()->json(new Message($clinic, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Show //////////////////////////////////
    public function show(Clinic  $clinic)
    {
        return response()->json(new Message($clinic, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, Clinic  $clinic)
    {
        $rules = [
            'name'=> 'string|required',
            'description'=> 'text|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $clinic_data = [];

        if($request->has('name')) if(!is_null($request->name)) $clinic_data['name'] = $request->name;
        if($request->has('description')) if(!is_null($request->description)) $clinic_data['description'] = $request->description;

        try
        {
            $clinic->update($clinic_data);
            $clinic->update($clinic_data);
            return response()->json(new Message($clinic->load('device'),'200', true, 'info', 'done', 'تم'));

        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }



}
