<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Reception;
use App\Models\User;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{


    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $reception = Reception::get();
        return[
            'info' => $reception,
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

        $reception_rules =[
            'name'=> 'string|required',
            'age'=> 'integer|required',
            'gender'=> 'string|required',
            'skills'=> 'string|required',
            'user_id'=>'integer|required',
        ];
        $this->validate($request ,$reception_rules );

        $reception = Reception::create([
            'name' => $request->name,
            'age' => $request->age,
            'gender' => $request->gender,
            'skills' => $request->skills,
            'user_id' => $request->user_id,
        ]);
        return [

            'reception'=>$reception,
        ];
    }


    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $reception = Doctor::get()->where('id',$id);
        return [
            'reception info' => $reception,
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


        $reception = Reception::find($id);
        $reception_rules =[
            'name'=> 'string|required',
            'age'=> 'integer|required',
            'gender'=> 'string|required',
            'skills'=> 'string|required',
            'user_id'=>'integer|required',
        ];
        $this->validate($request ,$reception_rules );

        $reception->name = $request->name;
        $reception->age = $request->age;
        $reception->gender = $request->gender;
        $reception->skills = $request->skills;
        $reception->user_id = $request->user_id;
        if ($reception->save()){
            return [
                'reception' => $reception,
            ];
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $reception = Reception::find($id);
        $result = $reception->delete();
        if ($result){
            return ["result" => "the reception has deleted"];
        }
        else{
            return ["result" => "operation failed"];
        }


    }


}
