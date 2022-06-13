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
        if($ml_nutrition) {
            return $this->returnData("ml_nutrition", $ml_nutrition, "this is all ml_nutritions");
        }
        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'food_allergy'=> 'string|required',
            'job'=> 'string|required',
            'length'=> 'integer|required',
            'age'=> 'integer|required',
            'sport_schedule'=> 'text|required',
            'medical_log_id'=> 'integer|required',

        ];

        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $ml_nutrition = ML_Nutrition_Clinic::create([
            'food_allergy' => $request->food_allergy,
            'job' => $request->job,
            'length' => $request->length,
            'age' => $request->specialization,
            'sport_schedule' => $request->sport_schedule,
            'medical_log_id'=> $request->clinic_id,
        ]);
        return $this->returnData("ml_nutrition",$ml_nutrition,"ml_nutrition added successfully");

    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $ml_nutrition = Doctor::get()->where('id',$id);
        if($ml_nutrition) {
            return $this->returnData("ml_nutrition", $ml_nutrition, "this is the ml_nutrition that you want");
        }
        return $this->returnError("999","something goes rung");    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $ml_nutrition = ML_Nutrition_Clinic::find($id);
        $rules = [
            'food_allergy'=> 'string|required',
            'job'=> 'string|required',
            'length'=> 'integer|required',
            'age'=> 'integer|required',
            'sport_schedule'=> 'text|required',
            'medical_log_id'=> 'integer|required',

        ];
        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }

        $ml_nutrition->food_allergy = $request->food_allergy;
        $ml_nutrition->job = $request->job;
        $ml_nutrition->length = $request->length;
        $ml_nutrition->age = $request->specialization;
        $ml_nutrition->sport_schedule = $request->sport_schedule;
        $ml_nutrition->medical_log_id = $request->clinic_id;
        if($ml_nutrition->save()){
            return $this->returnData("ml_nutrition",$ml_nutrition,"ml_nutrition updated successfully");

        }
        else
            return $this->returnError("999","something goes rung");

    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $ml_nutrition = ML_Nutrition_Clinic::find($id);
        $result = $ml_nutrition->delete();
        if ($result){
            return $this->returnSuccessMessage("ml_nutrition deleted successfully");
        }
        else{
            return $this->returnError("999","something goes rung");

        }


    }
}
