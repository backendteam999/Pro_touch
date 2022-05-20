<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Reception;
use App\Type;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $admin = Admin::get();
        return response()->json(new Message($admin, '200', true, 'info', 'done', 'تم'));
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

        $admin_data = [];
        if($request->has('name')) if(!is_null($request->name)) $user_data['name'] = $request->name;

        try
        {
            $user = User::create($user_data);
            $admin = $user->doctor()->create($admin_data);
            return response()->json(new Message($admin, '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e) {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));

        }
    }


    /////////////////////////////////// Show //////////////////////////////////
    public function show(Admin  $admin)
    {
        return response()->json(new Message($admin, '200', true, 'info', 'done', 'تم'));
    }



    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, Admin  $admin)
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

        $admin_data = [];
        if($request->has('name')) if(!is_null($request->name)) $user_data['name'] = $request->name;

        try
        {
            $user = $admin->users;
            $user->update($user_data);
            $admin->update($admin_data);
            return response()->json(new Message( $admin, '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy(Admin  $admin)
    {
        try
        {
            $admin->delete();
            return response()->json(new Message( $admin,'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }

}
