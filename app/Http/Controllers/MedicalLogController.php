<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Doctor;
use App\Models\Medical_log;
use Illuminate\Http\Request;

class MedicalLogController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $medical_log = Medical_log::get();
        return[
            'info' => $medical_log,
        ];
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
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

        $this->validate($request ,$rules );

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

        return [

            'medical_log'=>$medical_log,
        ];
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $medical_log = Medical_log::get()->where('id',$id);
        return [
            'medical log info' => $medical_log,
        ];
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
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
        $this->validate($request ,$rules );

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
           return [

               'medical_log'=>$medical_log,
           ];
       }

    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $medical_log = Medical_log::find($id);
        $result = $medical_log->delete();
        if ($result){
            return ["result" => "the medical log has deleted"];
        }
        else{
            return ["result" => "operation failed"];
        }


    }
}
