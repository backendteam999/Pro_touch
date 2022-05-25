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
        return[
            'info' => $ml_dental,
        ];
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $rules = [
            'smoking'=> 'boolean|required',
            'Oral_Allergic'=> 'string|required',
            'medical_log_id'=> 'integer|required',

        ];

        $this->validate($request ,$rules );

        $ml_dental = ML_Dental_Clinic::create([
            'smoking' => $request->smoking,
            'Oral_Allergic' => $request->Oral_Allergic,
            'medical_log_id' => $request->medical_log_id,
        ]);

        return [

            'ml_dental'=>$ml_dental,
        ];
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $ml_dental = ML_Dental_Clinic::get()->where('id',$id);
        return [
            'ml dental info' => $ml_dental,
        ];
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $ml_dental = ML_Dental_Clinic::find($id);
        $rules = [
            'smoking'=> 'boolean|required',
            'Oral_Allergic'=> 'string|required',
            'medical_log_id'=> 'string|required',

        ];
        $this->validate($request ,$rules );

        $ml_dental->smoking = $request->smoking;
        $ml_dental->Oral_Allergic = $request->Oral_Allergic;
        $ml_dental->medical_log_id = $request->medical_log_id;
        if ($ml_dental->save()){
            return [
                'ml dental info' => $ml_dental,
            ];
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $ml_dental = ML_Dental_Clinic::find($id);
        $result = $ml_dental->delete();
        if ($result){
            return ["result" => "the ml_dental has deleted"];
        }
        else{
            return ["result" => "operation failed"];
        }


    }
}
