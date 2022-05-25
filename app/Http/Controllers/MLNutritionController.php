<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\ML_Dental_Clinic;
use App\Models\ML_Nutrition_Clinic;
use Illuminate\Http\Request;

class MLNutritionController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $ml_nutrition = ML_Nutrition_Clinic::get();
        return[
            'info' => $ml_nutrition,
        ];
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $rules = [
            'food_allergy'=> 'string|required',
            'job'=> 'string|required',
            'length'=> 'integer|required',
            'age'=> 'integer|required',
            'sport_schedule'=> 'text|required',
            'medical_log_id'=> 'integer|required',

        ];

        $this->validate($request ,$rules );

        $ml_nutrition = ML_Nutrition_Clinic::create([
            'food_allergy' => $request->food_allergy,
            'job' => $request->job,
            'length' => $request->length,
            'age' => $request->specialization,
            'sport_schedule' => $request->sport_schedule,
            'medical_log_id'=> $request->clinic_id,
        ]);

        return [

            'ml_nutrition'=>$ml_nutrition,
        ];
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $ml_nutrition = Doctor::get()->where('id',$id);
        return [
            'ml nutrition info' => $ml_nutrition,
        ];    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $ml_nutrition = ML_Nutrition_Clinic::find($id);
        $rules = [
            'food_allergy'=> 'string|required',
            'job'=> 'string|required',
            'length'=> 'integer|required',
            'age'=> 'integer|required',
            'sport_schedule'=> 'text|required',
            'medical_log_id'=> 'integer|required',

        ];
        $this->validate($request ,$rules );


        $ml_nutrition->food_allergy = $request->food_allergy;
        $ml_nutrition->job = $request->job;
        $ml_nutrition->length = $request->length;
        $ml_nutrition->age = $request->specialization;
        $ml_nutrition->sport_schedule = $request->sport_schedule;
        $ml_nutrition->medical_log_id = $request->clinic_id;
        if ($ml_nutrition->save()){
            return [

                'ml_nutrition'=>$ml_nutrition,
            ];
        }

    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $ml_nutrition = ML_Nutrition_Clinic::find($id);
        $result = $ml_nutrition->delete();
        if ($result){
            return ["result" => "the ml_nutrition has deleted"];
        }
        else{
            return ["result" => "operation failed"];
        }


    }
}
