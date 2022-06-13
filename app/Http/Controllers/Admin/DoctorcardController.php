<?php

namespace App\Http\Controllers\Admin;

use App\Http\Resources\DoctorResouce;
use App\Models\Device;
use App\Models\Doctor;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class DoctorcardController extends Controller
{

    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $doctor = Doctor::get();
        if($doctor) {
            return $this->returnData("doctor", $doctor, "this is all doctors");
        }
        return $this->returnError("999","something goes rung");

    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $input = $request->all();
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

        $user =User::create([
            'name'=> $request->name,
            'email' => $request->email,
            'password' => $request->password,
            'phone_number'=> $request->phone_number
        ]);



        $doctor_rules =[
            'name'=> 'string|required',
            'age'=> 'integer|required',
            'gender'=> 'string|required',
            'specialization'=> 'string|required',
            'user_id'=>'integer|required',
            'clinic_id'=>'integer|required',
        ];
        $doctor_validator= \Illuminate\Support\Facades\Validator::make($input ,$doctor_rules );
        if ($doctor_validator->fails()) {
            $code = $this->returnCodeAccordingToInput($doctor_validator);
            return $this->returnValidationError($code, $doctor_validator);
        }
        $doctor = Doctor::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'specialization' => $request->specialization,
            'user_id' => $request->user_id,
            'clinic_id'=> $request->clinic_id,
        ]);

        return $this->returnData("doctor",$doctor,"doctor added successfully");

    }


    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $doctor = Doctor::get()->where('id',$id);
        if($doctor) {
            return $this->returnData("doctor", $doctor, "this is the device that you want");
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


        $doctor = Doctor::find($id);
        $doctor_rules =[
            'name'=> 'string|required',
            'age'=> 'integer|required',
            'gender'=> 'string|required',
            'specialization'=> 'string|required',
            'user_id'=>'integer|required',
            'clinic_id'=>'integer|required',
        ];
        $doctor_validator= \Illuminate\Support\Facades\Validator::make($input ,$doctor_rules );
        if ($doctor_validator->fails()) {
            $code = $this->returnCodeAccordingToInput($doctor_validator);
            return $this->returnValidationError($code, $doctor_validator);
        }

        $doctor->name = $request->name;
        $doctor->age = $request->age;
        $doctor->gender = $request->gender;
        $doctor->specialization = $request->specialization;
        $doctor->user_id = $request->user_id;
        $doctor->clinic_id = $request->clinic_id;
        if($doctor->save()){
            return $this->returnData("doctor",$doctor,"doctor updated successfully");

        }
        else
            return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $result = $doctor->delete();
        if ($result){
            return $this->returnSuccessMessage("doctor deleted successfully");
        }
        else{
            return $this->returnError("999","something goes rung");

        }


    }

}
