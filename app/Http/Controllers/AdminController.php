<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Reception;
use App\Models\User;
use App\Type;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $admin = Admin::get();
        return[
            'info' => $admin,
        ];
    }

    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $admin = Admin::get()->where('id',$id);
        return [
            'admin info' => $admin,
        ];    }



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

        $admin = Admin::find($id);
        $admin_rules =[
            'name'=> 'string|required',
        ];
        $this->validate($request ,$admin_rules );
        $admin->name = $request->name;
        if ($admin->save()){
            return [
                'result' => $admin,
            ];
        }


    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $result = $admin->delete();
        if ($result){
            return ["result" => "the admin has deleted"];
        }
        else{
            return ["result" => "operation failed"];
        }


    }

}
