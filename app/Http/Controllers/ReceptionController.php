<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Doctor;
use App\Models\Reception;
use Illuminate\Http\Request;

class ReceptionController extends Controller
{


    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $reception = Reception::get();
        return response()->json(new Message($reception, '200', true, 'info', 'done', 'تم'));
    }



    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $rules = [
            'name'=> 'string|required',
            'email'=> 'integer|required',
            'password'=> 'string|required',
            'phone_number'=> 'string|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '200', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $user_data = [];
        if($request->has('name')) if(!is_null($request->name)) $user_data['name'] = $request->name;
        if($request->has('email')) if(!is_null($request->age)) $user_data['email'] = $request->email;
        if($request->has('password')) if(!is_null($request->password)) $user_data['password'] = $request->password;
        if($request->has('phone_number')) if(!is_null($request->phone_number)) $user_data['phone_number'] = $request->phone_number;

        $reception_data = [];
        if($request->has('name')) if(!is_null($request->name)) $user_data['name'] = $request->name;
        if($request->has('age')) if(!is_null($request->age)) $user_data['age'] = $request->age;
        if($request->has('gender')) if(!is_null($request->gender)) $user_data['gender'] = $request->gender;
        if($request->has('skills')) if(!is_null($request->skills)) $user_data['skills'] = $request->skills;

        try
        {
            $user = User::create($user_data);
            $reception = $user->reception()->create($reception_data);
            return response()->json(new Message($reception, '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e) {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));

        }
    }


    /////////////////////////////////// Show //////////////////////////////////
    public function show(Reception  $reception)
    {
        return response()->json(new Message($reception, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, Reception  $reception)
    {
        $rules = [
            'name'=> 'string|required',
            'email'=> 'integer|required',
            'password'=> 'string|required',
            'phone_number'=> 'string|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '200', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }
        $user_data = [];
        if($request->has('name')) if(!is_null($request->name)) $user_data['name'] = $request->name;
        if($request->has('email')) if(!is_null($request->age)) $user_data['email'] = $request->email;
        if($request->has('password')) if(!is_null($request->password)) $user_data['password'] = $request->password;
        if($request->has('phone_number')) if(!is_null($request->phone_number)) $user_data['phone_number'] = $request->phone_number;

        $reception_data = [];
        if($request->has('name')) if(!is_null($request->name)) $user_data['name'] = $request->name;
        if($request->has('age')) if(!is_null($request->age)) $user_data['age'] = $request->age;
        if($request->has('gender')) if(!is_null($request->gender)) $user_data['gender'] = $request->gender;
        if($request->has('skills')) if(!is_null($request->skills)) $user_data['skills'] = $request->skills;

        try
        {
            $user = $reception->users;
            $user->update($user_data);
            $reception->update($reception_data);
            return response()->json(new Message( $reception, '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy(Reception  $reception)
    {
        try
        {
            $reception->delete();
            return response()->json(new Message( $reception,'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }


}
