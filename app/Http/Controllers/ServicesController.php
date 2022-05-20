<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Service;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $services = Device::get();
        return response()->json(new Message($services, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $rules = [
            'clinic_id'=> 'integer|required',
            'price'=> 'double|required',
            'description'=> 'text|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $services_data = [];

        if($request->has('clinic_id')) if(!is_null($request->clinic_id)) $services_data['clinic_id'] = $request->clinic_id;
        if($request->has('price')) if(!is_null($request->price)) $services_data['price'] = $request->price;
        if($request->has('description')) if(!is_null($request->description)) $services_data['description'] = $request->description;


        try
        {
            $services = Service::create($services_data);
            $services = $services->Service()->create($services_data);
            return response()->json(new Message($services->load('services'), '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show(Service  $service)
    {
        return response()->json(new Message($service, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, Service  $services)
    {
        $rules = [
            'clinic_id'=> 'integer|required',
            'price'=> 'double|required',
            'description'=> 'text|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $services_data = [];

        if($request->has('clinic_id')) if(!is_null($request->clinic_id)) $device_data['clinic_id'] = $request->clinic_id;
        if($request->has('price')) if(!is_null($request->price)) $device_data['price'] = $request->price;
        if($request->has('description')) if(!is_null($request->description)) $device_data['description'] = $request->description;

        try
        {
            $services->update($services_data);
            $services->update($services_data);
            return response()->json(new Message($services->load('services'),'200', true, 'info', 'done', 'تم'));

        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy(Service  $services)
    {
        try
        {
            $services->delete();
            return response()->json(new Message( $services,'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }

}
