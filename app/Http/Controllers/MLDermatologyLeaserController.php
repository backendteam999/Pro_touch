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
        return[
            'info' => $ml_derma_leaser,
        ];
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $rules = [
            'skin_type'=> 'string|required',
            'skin_colour'=> 'string|required',
            'skin_allergies'=> 'string|required',
            'job'=> 'string|required',
            'medical_log_id'=> 'integer|required',

        ];

        $this->validate($request ,$rules );

        $ml_derma_leaser = ML_DematologyAndLeaser::create([
            'skin_type' => $request->skin_type,
            'skin_colour' => $request->skin_colour,
            'skin_allergies' => $request->skin_allergies,
            'job' => $request->job,
            'medical_log_id' => $request->medical_log_id,
        ]);

        return [

            'ml_derma_leaser'=>$ml_derma_leaser,
        ];
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $ml_derma_leaser = ML_DematologyAndLeaser::get()->where('id',$id);
        return [
            'ml_derma_leaser info' => $ml_derma_leaser,
        ];
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $ml_derma_leaser = ML_DematologyAndLeaser::find($id);
        $rules = [
            'skin_type'=> 'string|required',
            'skin_colour'=> 'string|required',
            'skin_allergies'=> 'string|required',
            'job'=> 'string|required',
            'medical_log_id'=> 'integer|required',

        ];
        $this->validate($request ,$rules );
        $ml_derma_leaser->skin_type = $request->skin_type;
        $ml_derma_leaserskin_colour = $request->skin_colour;
        $ml_derma_leaser->skin_allergies = $request->skin_allergies;
        $ml_derma_leaser->job = $request->job;
        $ml_derma_leaser->medical_log_id = $request->medical_log_id;
        if ($ml_derma_leaser->save()){
            return [
                'ml_derma_leaser info' => $ml_derma_leaser,
            ];
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $ml_derma_leaser = ML_DematologyAndLeaser::find($id);
        $result = $ml_derma_leaser->delete();
        if ($result){
            return ["result" => "the $ml_derma_leaser has deleted"];
        }
        else{
            return ["result" => "operation failed"];
        }
    }
}
