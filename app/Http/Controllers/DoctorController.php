<?php

namespace App\Http\Controllers;

use App\Http\Resources\DoctorResouce;
use App\Models\Device;
use App\Models\Doctor;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Support\Facades\Auth;

class DoctorController extends Controller
{

    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $doctor = Doctor::get();
        return[
            'info' => $doctor,
        ];
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $user_rules =[
            'name'=> 'string|required',
            'email'=> 'string|required',
            'password'=> 'string|required',
            'phone_number'=> 'string|required',
        ];
        $this->validate($request ,$user_rules );

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
        $this->validate($request ,$doctor_rules );

        $doctor = Doctor::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'specialization' => $request->specialization,
            'user_id' => $request->user_id,
            'clinic_id'=> $request->clinic_id,
        ]);

        return [

            'doctor'=>$doctor,
        ];
    }


    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $doctor = Doctor::get()->where('id',$id);
        return [
          'doctor info' => $doctor,
        ];

    }



    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user_rules =[
            'name'=> 'string|required',
            'email'=> 'string|required',
            'password'=> 'string|required',
            'phone_number'=> 'string|required',
        ];
        $this->validate($request ,$user_rules );

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone_number = $request->phone_number;
        if ($user->save()){
            return [
                'result' => "user updated",
            ];
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
        $this->validate($request ,$doctor_rules );

        $doctor->name = $request->name;
        $doctor->age = $request->age;
        $doctor->gender = $request->gender;
        $doctor->specialization = $request->specialization;
        $doctor->user_id = $request->user_id;
        $doctor->clinic_id = $request->clinic_id;
        if ($doctor->save()){
            return [
                'result' => $doctor,
            ];
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $doctor = Doctor::find($id);
        $result = $doctor->delete();
        if ($result){
            return ["result" => "the doctor has deleted"];
        }
        else{
            return ["result" => "operation failed"];
        }


    }


}
