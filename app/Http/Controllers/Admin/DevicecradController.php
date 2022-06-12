<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Doctor;
use App\Models\Reception;
use Illuminate\Http\Request;

class DevicecradController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $device = Device::get();
        return[
            'info' => $device,
        ];
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $rules = [
            'service_id'=> 'integer|required',
            'name'=> 'tring|required',
            'description'=> 'text|required',
        ];

        $this->validate($request ,$rules );

        $device = Device::create([
            'service_id' => $request->service_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return [

            'device'=>$device,
        ];
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $device = Device::get()->where('id',$id);
        return [
            'device info' => $device,
        ];    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $device = Device::find($id);
        $rules = [
            'service_id'=> 'integer|required',
            'name'=> 'string|required',
            'description'=> 'text|required',
        ];
        $this->validate($request ,$rules );

        $device->service_id = $request->service_id;
        $device->name = $request->name;
        $device->description = $request->description;

        if($device->seve()){
            return [

                'device'=>$device,
            ];
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $device = Device::find($id);
        $result = $device->delete();
        if ($result){
            return ["result" => "the device has deleted"];
        }
        else{
            return ["result" => "operation failed"];
        }


    }

}
