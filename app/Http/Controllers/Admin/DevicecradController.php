<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Doctor;
use App\Models\Reception;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DevicecradController extends Controller
{
    use GeneralTrait;
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $device = Device::get();
        if($device) {
            return $this->returnData("device", $device, "this is all devices");
        }
        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'service_id'=> 'integer|required',
            'name'=> 'tring|required',
            'description'=> 'text|required',
        ];

        $validator= Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }

        $device = Device::create([
            'service_id' => $request->service_id,
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $this->returnData("device",$device,"device added successfully");
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $device = Device::get()->where('id',$id);
        if($device) {
            return $this->returnData("device", $device, "this is the device that you want");
        }
        return $this->returnError("999","something goes rung");    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $device = Device::find($id);
        $rules = [
            'service_id'=> 'integer|required',
            'name'=> 'string|required',
            'description'=> 'text|required',
        ];
        $validator= Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }

        $device->service_id = $request->service_id;
        $device->name = $request->name;
        $device->description = $request->description;

        if($device->save()){
            return $this->returnData("device",$device,"device updated successfully");

        }
        else
            return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $device = Device::find($id);
        $result = $device->delete();
        if ($result){
            return $this->returnSuccessMessage("device deleted successfully");
        }
        else{
            return $this->returnError("999","something goes rung");

        }


    }

}
