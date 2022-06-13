<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Doctor;
use App\Models\Reception;
use App\Models\User;
use App\Traits\GeneralTrait;
use App\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdmincradController extends Controller
{
    use GeneralTrait;
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $admin = Admin::get();
        if($admin) {
            return $this->returnData("admin", $admin, "this is all admins");
        }
        return $this->returnError("999","something goes rung");

    }

    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $admin = Admin::get()->where('id',$id);
        if($admin) {
            return $this->returnData("admin", $admin, "this is the admin that you want");
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
        $validator= Validator::make($input ,$user_rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->phone_number = $request->phone_number;
        if ($user->save()){
           return $this->returnData(" user",$user,"user updated successfully");
        }

        $admin = Admin::find($id);
        $admin_rules =[
            'name'=> 'string|required',
        ];
        $admin_validator= Validator::make($input ,$admin_rules );
        if ($admin_validator->fails()) {
            $code = $this->returnCodeAccordingToInput($admin_validator);
            return $this->returnValidationError($code, $admin_validator);
        }
        $admin->name = $request->name;
        if ($admin->save()){
            return $this->returnData("admin",$admin,"admin updated successfully");        }

        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $result = $admin->delete();
        if ($result){
            return $this->returnSuccessMessage("admin deleted successfully");
        }
        else{
            return $this->returnError("999","something goes rung");

        }


    }

}
