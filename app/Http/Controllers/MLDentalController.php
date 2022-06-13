<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Medical_log;
use App\Models\ML_Dental_Clinic;
use Illuminate\Http\Request;

class MLDentalController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $ml_dental = ML_Dental_Clinic::get();
        if($ml_dental) {
            return $this->returnData("ml_dental", $ml_dental, "this is all ml_dentals");
        }
        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'smoking'=> 'boolean|required',
            'Oral_Allergic'=> 'string|required',
            'medical_log_id'=> 'integer|required',

        ];

        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $ml_dental = ML_Dental_Clinic::create([
            'smoking' => $request->smoking,
            'Oral_Allergic' => $request->Oral_Allergic,
            'medical_log_id' => $request->medical_log_id,
        ]);

        return $this->returnData("ml_dental",$ml_dental,"ml_dental added successfully");

    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $ml_dental = ML_Dental_Clinic::get()->where('id',$id);
        if($ml_dental) {
            return $this->returnData("ml_dental", $ml_dental, "this is the ml_dental that you want");
        }
        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $ml_dental = ML_Dental_Clinic::find($id);
        $rules = [
            'smoking'=> 'boolean|required',
            'Oral_Allergic'=> 'string|required',
            'medical_log_id'=> 'string|required',

        ];
        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $ml_dental->smoking = $request->smoking;
        $ml_dental->Oral_Allergic = $request->Oral_Allergic;
        $ml_dental->medical_log_id = $request->medical_log_id;
        if($ml_dental->save()){
            return $this->returnData("ml_dental",$ml_dental,"ml_dental updated successfully");

        }
        else
            return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $ml_dental = ML_Dental_Clinic::find($id);
        $result = $ml_dental->delete();
        if ($result){
            return $this->returnSuccessMessage("ml_dental deleted successfully");
        }
        else{
            return $this->returnError("999","something goes rung");

        }


    }
}
