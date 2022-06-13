<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Reception;
use App\Models\User;
use Illuminate\Http\Request;

class ReceptioncradController extends Controller
{



    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $reception = Reception::get();
        if($reception) {
            return $this->returnData("reception", $reception, "this is all receptions");
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

        $reception_rules =[
            'name'=> 'string|required',
            'age'=> 'integer|required',
            'gender'=> 'string|required',
            'skills'=> 'string|required',
            'user_id'=>'integer|required',
        ];
        $reception_validator= \Illuminate\Support\Facades\Validator::make($input ,$reception_rules );
        if ($reception_validator->fails()) {
            $code = $this->returnCodeAccordingToInput($reception_validator);
            return $this->returnValidationError($code, $reception_validator);
        }
        $reception = Reception::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'skills' => $request->skills,
            'user_id' => $request->user_id,
        ]);
        return $this->returnData("reception",$reception,"reception added successfully");

    }


    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $reception = Doctor::get()->where('id',$id);
        if($reception) {
            return $this->returnData("reception", $reception, "this is the device that you want");
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


        $reception = Reception::find($id);
        $reception_rules =[
            'name'=> 'string|required',
            'age'=> 'integer|required',
            'gender'=> 'string|required',
            'skills'=> 'string|required',
            'user_id'=>'integer|required',
        ];
        $reception_validator= \Illuminate\Support\Facades\Validator::make($input ,$reception_rules );
        if ($reception_validator->fails()) {
            $code = $this->returnCodeAccordingToInput($reception_validator);
            return $this->returnValidationError($code, $reception_validator);
        }
        $reception->name = $request->name;
        $reception->age = $request->age;
        $reception->gender = $request->gender;
        $reception->skills = $request->skills;
        $reception->user_id = $request->user_id;
        if($reception->save()){
            return $this->returnData("reception",$reception,"reception updated successfully");

        }
        else
            return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $reception = Reception::find($id);
        $result = $reception->delete();
        if ($result){
            return $this->returnSuccessMessage("reception deleted successfully");
        }
        else{
            return $this->returnError("999","something goes rung");

        }


    }

}
