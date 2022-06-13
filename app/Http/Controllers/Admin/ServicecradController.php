<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class ServicecradController extends Controller
{
    use GeneralTrait;

    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $service = Service::get();
        if($service) {
            return $this->returnData("service", $service, "this is all services");
        }
        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'clinic_id'=> 'integer|required',
            'price'=> 'double|required',
            'description'=> 'text|required',
        ];

        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $service = Service::create([
            'clinic_id' => $request->clinic_id,
            'price' => $request->price,
            'description' => $request->description,
        ]);
        return $this->returnData("service",$service,"service added successfully");

    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $service = Service::get()->where('id',$id);
        if($service) {
            return $this->returnData("service", $service, "this is the service that you want");
        }
        return $this->returnError("999","something goes rung");    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $service = User::find($id);
        $rules = [
            'clinic_id'=> 'integer|required',
            'price'=> 'double|required',
            'description'=> 'text|required',
        ];

        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $service->clinic_id = $request->clinic_id;
        $service->price = $request->price;
        $service->description = $request->description;
        if($service->save()){
            return $this->returnData("service",$service,"service updated successfully");

        }
        else
            return $this->returnError("999","something goes rung");

    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $service = Service::find($id);
        $result = $service->delete();
        if ($result){
            return $this->returnSuccessMessage("service deleted successfully");
        }
        else{
            return $this->returnError("999","something goes rung");

        }


    }

}
