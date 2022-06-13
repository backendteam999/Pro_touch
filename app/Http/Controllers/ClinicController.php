<?php

namespace App\Http\Controllers;

use App\Models\Clinic;
use App\Models\Device;
use App\Models\Doctor;
use Illuminate\Http\Request;

class ClinicController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $clinic = Clinic::get();
        return response()->json($clinic);
        //[
          //  'info' => $clinic,
        //];
    }


    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $clinic = Clinic::get()->where('id',$id);
        return [
            'clinic info' => $clinic,
        ];    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $clinic = Doctor::find($id);
        $rules = [
            'name'=> 'string|required',
            'description'=> 'text|required',
        ];

        $this->validate($request ,$rules );

        $clinic->name = $request->name;
        $clinic->description = $request->description;
        if ($clinic->save()) {
            return [
                'clinic' => $clinic,
            ];
        }
    }



}
