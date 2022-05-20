<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Reception;
use Illuminate\Http\Request;

class DeviceController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $device = Device::get();
        return response()->json(new Message($device, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $rules = [
            'service_id'=> 'integer|required',
            'name'=> 'tring|required',
            'description'=> 'text|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $device_data = [];

        if($request->has('service_id')) if(!is_null($request->service_id)) $device_data['service_id'] = $request->service_id;
        if($request->has('name')) if(!is_null($request->name)) $device_data['name'] = $request->name;
        if($request->has('description')) if(!is_null($request->description)) $device_data['description'] = $request->description;


        try
        {
            $device = Device::create($device_data);
            $device = $device->Device()->create($device_data);
            return response()->json(new Message($device->load('device'), '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show(Device  $device)
    {
        return response()->json(new Message($device, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, Device  $device)
    {
        $rules = [
            'service_id'=> 'integer|required',
            'name'=> 'string|required',
            'description'=> 'text|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $device_data = [];

        if($request->has('service_id')) if(!is_null($request->service_id)) $device_data['service_id'] = $request->service_id;
        if($request->has('name')) if(!is_null($request->name)) $device_data['name'] = $request->name;
        if($request->has('description')) if(!is_null($request->description)) $device_data['description'] = $request->description;

        try
        {
            $device->update($device_data);
            $device->update($device_data);
            return response()->json(new Message($device->load('device'),'200', true, 'info', 'done', 'تم'));

        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy(Device  $device)
    {
        try
        {
            $device->delete();
            return response()->json(new Message( $device,'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }

}
