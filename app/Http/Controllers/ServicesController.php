<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Doctor;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $service = Service::get();
        return[
            'info' => $service,
        ];
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $rules = [
            'clinic_id'=> 'integer|required',
            'price'=> 'double|required',
            'description'=> 'text|required',
        ];

        $this->validate($request ,$rules );

        $service = Service::create([
            'clinic_id' => $request->clinic_id,
            'price' => $request->price,
            'description' => $request->description,
        ]);

        return [

            'service'=>$service,
        ];
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $service = Service::get()->where('id',$id);
        return [
            'service info' => $service,
        ];    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $service = User::find($id);
        $rules = [
            'clinic_id'=> 'integer|required',
            'price'=> 'double|required',
            'description'=> 'text|required',
        ];

        $this->validate($request ,$rules );

        $service->clinic_id = $request->clinic_id;
        $service->price = $request->price;
        $service->description = $request->description;

    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $service = Service::find($id);
        $result = $service->delete();
        if ($result){
            return ["result" => "the service has deleted"];
        }
        else{
            return ["result" => "operation failed"];
        }


    }

}
