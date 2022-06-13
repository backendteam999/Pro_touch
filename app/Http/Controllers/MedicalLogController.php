<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Doctor;
use App\Models\Medical_log;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class MedicalLogController extends Controller
{
    use GeneralTrait;
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $medical_log = Medical_log::get();
        if($medical_log) {
            return $this->returnData("medical_log", $medical_log, "this is all medical_logs");
        }
        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'patient_id'=> 'integer|required',
            'weight'=> 'double|required',
            'Allergic'=> 'string|required',
            'situation'=> 'string|required',
            'chronic_diseases'=> 'string|required',
            'genetic_diseases'=> 'string|required',
            'surgery'=> 'string|required',
            'medicine'=> 'string|required',
            'notes'=> 'text|required',
        ];

        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $medical_log = Medical_log::create([
            'patient_id' => $request->patient_id,
            'weight' => $request->weight,
            'Allergic' => $request->Allergic,
            'situation' => $request->situation,
            'chronic_diseases' => $request->chronic_diseases,
            'genetic_diseases'=> $request->genetic_diseases,
            'surgery'=> $request->surgery,
            'medicine'=> $request->medicine,
            'notes'=> $request->notes,
        ]);
        return $this->returnData("medical_log",$medical_log,"medical_log added successfully");

    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $medical_log = Medical_log::get()->where('id',$id);
        if($medical_log) {
            return $this->returnData("medical_log", $medical_log, "this is the medical_log that you want");
        }
        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $medical_log = Medical_log::find($id);
        $rules = [
            'patient_id'=> 'integer|required',
            'weight'=> 'double|required',
            'Allergic'=> 'string|required',
            'situation'=> 'string|required',
            'chronic_diseases'=> 'string|required',
            'genetic_diseases'=> 'string|required',
            'surgery'=> 'string|required',
            'medicine'=> 'string|required',
            'notes'=> 'text|required',
        ];
        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $medical_log->patient_id = $request->patient_id;
        $medical_log->weight = $request->weight;
        $medical_log->Allergic = $request->Allergic;
        $medical_log->situation = $request->situation;
        $medical_log->chronic_diseases = $request->chronic_diseases;
        $medical_log->genetic_diseases = $request->genetic_diseases;
        $medical_log->surgery = $request->surgery;
        $medical_log->medicine = $request->medicine;
        $medical_log->notes = $request->notes;
        if($medical_log->save()){
            return $this->returnData("medical_log",$medical_log,"medical_log updated successfully");

        }
        else
            return $this->returnError("999","something goes rung");

    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $medical_log = Medical_log::find($id);
        $result = $medical_log->delete();
        if ($result){
            return $this->returnSuccessMessage("medical_log deleted successfully");
        }
        else{
            return $this->returnError("999","something goes rung");

        }


    }
}
