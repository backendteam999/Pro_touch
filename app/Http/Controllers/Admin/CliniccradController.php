<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Clinic;
use App\Models\Device;
use App\Models\Doctor;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CliniccradController extends Controller
{
    use GeneralTrait;
    public function index()
    {
        $clinic = Clinic::get();
        if($clinic) {
            return $this->returnData("clinic", $clinic, "this is all clinic");
        }
        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $clinic = Clinic::get()->where('id',$id);
        if($clinic) {
            return $this->returnData("clinic", $clinic, "this is the clinic that you want");
        }
        return $this->returnError("999","something goes rung");

    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $clinic = Doctor::find($id);
        $rules = [
            'name'=> 'string|required',
            'description'=> 'text|required',
        ];

        $validator= Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }

        $clinic->name = $request->name;
        $clinic->description = $request->description;
        if ($clinic->save()) {
            return $this->returnData("clinic",$clinic,"clinic updated successfully");
        }
        return $this->returnError("999","something goes rung");
    }

}
