<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Reception;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    use GeneralTrait;

    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $patient = Patient::get();
        if($patient) {
            return $this->returnData("patient", $patient, "this is all patients");
        }
        return $this->returnError("999","something goes rung");
    }

    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $input = $request->all();
        $user_rules = [
            'name'=> 'string|required',
            'email'=> 'integer|required',
            'password'=> 'string|required',
            'phone_number'=> 'string|required',
        ];

        $validator= \Illuminate\Support\Facades\Validator::make($input ,$user_rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $user =User::create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number'=> $request->phone_number
        ]);

        $patient_rules =[
            'name'=> 'string|required',
            'age'=> 'integer|required',
            'gender'=> 'string|required',
            'user_id'=>'integer|required',
        ];
        $patient_validator= \Illuminate\Support\Facades\Validator::make($input ,$patient_rules );
        if ($patient_validator->fails()) {
            $code = $this->returnCodeAccordingToInput($patient_validator);
            return $this->returnValidationError($code, $patient_validator);
        }
        $patient = Patient::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'user_id' => $request->user_id,
        ]);

        return $this->returnData("patient",$patient,"patient added successfully");

    }


    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $patient = Patient::get()->where('id',$id);
        if($patient) {
            return $this->returnData("patient", $patient, "this is the patient that you want");
        }
        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $user = User::find($id);
        $user_rules =[
            'name'=> 'string|required',
            'email'=> 'string|required',
            'password'=> 'string|required',
            'phone_number'=> 'string|required',
        ];
        $validator= \Illuminate\Support\Facades\Validator::make($input ,$user_rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone_number = $request->phone_number;
        if ($user->save()){
            return $this->returnData("user",$user,"user updated successfully");

        }


        $patient_rules =[
            'name'=> 'string|required',
            'age'=> 'integer|required',
            'gender'=> 'string|required',
            'user_id'=>'integer|required',
        ];
        $patient_validator= \Illuminate\Support\Facades\Validator::make($input ,$patient_rules );
        if ($patient_validator->fails()) {
            $code = $this->returnCodeAccordingToInput($patient_validator);
            return $this->returnValidationError($code, $patient_validator);
        }
        $patien = Patient::find($id);
        $patien->name = $request->name;
        $patien->age = $request->age;
        $patien->gender = $request->gender;
        $patien->user_id = $request->user_id;
        if($patien->save()){
            return $this->returnData("patient",$patien,"v updated successfully");

        }
        else
            return $this->returnError("999","something goes rung");

    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $result = $patient->delete();
        if ($result){
            return $this->returnSuccessMessage("patient deleted successfully");
        }
        else{
            return $this->returnError("999","something goes rung");

        }


    }

}

