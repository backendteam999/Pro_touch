<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Reception;
use App\Models\User;
use Illuminate\Http\Request;

class PatientController extends Controller
{

    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $patient = Patient::get();
        return[
            'info' => $patient,
        ];
    }

    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $user_rules = [
            'name'=> 'string|required',
            'email'=> 'integer|required',
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

        $patient_rules =[
            'name'=> 'string|required',
            'age'=> 'integer|required',
            'gender'=> 'string|required',
            'user_id'=>'integer|required',
        ];
        $this->validate($request ,$patient_rules );

        $patient = Patient::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'user_id' => $request->user_id,
        ]);

        return [

            'patient'=>$patient,
        ];
    }


    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $patient = Patient::get()->where('id',$id);
        return [
            'doctor info' => $patient,
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


        $patient_rules =[
            'name'=> 'string|required',
            'age'=> 'integer|required',
            'gender'=> 'string|required',
            'user_id'=>'integer|required',
        ];
        $this->validate($request ,$patient_rules );

        $patien = Patient::find($id);
        $patien->name = $request->name;
        $patien->age = $request->age;
        $patien->gender = $request->gender;
        $patien->user_id = $request->user_id;
        if ($patien->save()){
            return [
                'result' => "user updated",
            ];
        }

    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $patient = Patient::find($id);
        $result = $patient->delete();
        if ($result){
            return ["result" => "the patient has deleted"];
        }
        else{
            return ["result" => "operation failed"];
        }


    }

}

