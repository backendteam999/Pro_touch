<?php

namespace App\Http\Controllers;

use App\Models\ML_DematologyAndLeaser;
use App\Models\ML_Dental_Clinic;
use Illuminate\Http\Request;

class MLDermatologyLeaserController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $ml_derma_leaser = ML_Dental_Clinic::get();
        if($ml_derma_leaser) {
            return $this->returnData("ml_derma_leaser", $ml_derma_leaser, "this is all ml_derma_leasers");
        }
        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'skin_type'=> 'string|required',
            'skin_colour'=> 'string|required',
            'skin_allergies'=> 'string|required',
            'job'=> 'string|required',
            'medical_log_id'=> 'integer|required',

        ];

        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $ml_derma_leaser = ML_DematologyAndLeaser::create([
            'skin_type' => $request->skin_type,
            'skin_colour' => $request->skin_colour,
            'skin_allergies' => $request->skin_allergies,
            'job' => $request->job,
            'medical_log_id' => $request->medical_log_id,
        ]);

        return $this->returnData("ml_derma_leaser",$ml_derma_leaser,"ml_derma_leaser added successfully");

    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $ml_derma_leaser = ML_DematologyAndLeaser::get()->where('id',$id);
        if($ml_derma_leaser) {
            return $this->returnData("ml_derma_leaser",$ml_derma_leaser, "this is the ml_derma_leaser that you want");
        }
        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $ml_derma_leaser = ML_DematologyAndLeaser::find($id);
        $rules = [
            'skin_type'=> 'string|required',
            'skin_colour'=> 'string|required',
            'skin_allergies'=> 'string|required',
            'job'=> 'string|required',
            'medical_log_id'=> 'integer|required',

        ];
        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $ml_derma_leaser->skin_type = $request->skin_type;
        $ml_derma_leaserskin_colour = $request->skin_colour;
        $ml_derma_leaser->skin_allergies = $request->skin_allergies;
        $ml_derma_leaser->job = $request->job;
        $ml_derma_leaser->medical_log_id = $request->medical_log_id;
        if($ml_derma_leaser->save()){
            return $this->returnData("ml_derma_leaser",$ml_derma_leaser,"ml_derma_leaser updated successfully");

        }
        else
            return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $ml_derma_leaser = ML_DematologyAndLeaser::find($id);
        $result = $ml_derma_leaser->delete();
        if ($result){
            return $this->returnSuccessMessage("ml_derma_leaser deleted successfully");
        }
        else{
            return $this->returnError("999","something goes rung");

        }
    }
}
