<?php

namespace App\Http\Controllers;

use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use Hash;
use Validator;
use Auth;

class LoginController extends Controller
{
    use GeneralTrait;
//    public function userDashboard()
//    {
//        $users = User::all();
//        $success =  $users;
//
//        return response()->json($success, 200);
//    }
//
//    public function adminDashboard()
//    {
//        $users = Admin::all();
//        $success =  $users;
//
//        return response()->json($success, 200);
//    }

    public function userLogin(Request $request)
    {
        $input = $request->all();
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }

        if(auth()->guard('user')->attempt(['email' => request('email'), 'password' => request('password')])){

            config(['auth.guards.api.provider' => 'user']);

            $user = User::select('users.*')->find(auth()->guard('user')->user()->id);
            $success =  $user;
            $success['token'] =  $user->createToken('MyApp',['user'])->accessToken;

            return $this-> returnSuccessMessage($success,"S000");
        }else{
            return $this->returnError("200","Email and Password are Wrong.");
        }
    }

    public function adminLogin(Request $request)
    {
        $input = $request->all();
        $rules = [
            'email' => 'required|email',
            'password' => 'required',
        ];

        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $credentials = $request->only(['name', 'email', 'password']);
        return (auth()->guard('admin')->attempt($credentials));
        if(auth()->guard('admin')->attempt($credentials)){

            config(['auth.guards.api.provider' => 'admin']);

            $admin = Admin::select('admins.*')->find(auth()->guard('admin')->user()->id);
            $success =  $admin;
            $success['token'] =  $admin->createToken('MyApp',['admin'])->accessToken;

            return $this-> returnSuccessMessage($success,"S000");
        }else{
            return $this->returnError("200","Email and Password are Wrong.");
        }
    }
}
