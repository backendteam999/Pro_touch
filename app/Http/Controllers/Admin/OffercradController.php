<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Device;
use App\Models\Doctor;
use App\Models\Offer;
use Illuminate\Http\Request;

class OffercradController extends Controller
{
    //
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $offer = Offer::get();
        if($offer) {
            return $this->returnData("offer", $offer, "this is all offers");
        }
        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $input = $request->all();
        $rules = [
            'clinic_id'=> 'integer|required',
            'service_id'=> 'integer|required',
            'offer_price'=> 'double|required',
            'start_date'=> 'date|required',
            'due_date'=> 'date|required',
            'information'=> 'text|required',
        ];

        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }

        $offer = Offer::create([
            'clinic_id' => $request->clinic_id,
            'service_id' => $request->service_id,
            'offer_price' => $request->offer_price,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'information'=> $request->information,
        ]);

        return $this->returnData("offer",$offer,"offer added successfully");

    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $offer = Offer::get()->where('id',$id);
        if($offer) {
            return $this->returnData("offer", $offer, "this is the offer that you want");
        }
        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $offer = Offer::find($id);
        $rules = [
            'clinic_id'=> 'integer|required',
            'service_id'=> 'integer|required',
            'offer_price'=> 'double|required',
            'start_date'=> 'date|required',
            'due_date'=> 'date|required',
            'information'=> 'text|required',
        ];

        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $offer->clinic_id = $request->clinic_id;
        $offer->service_id = $request->service_id;
        $offer->offer_price = $request->offer_price;
        $offer->start_date = $request->start_date;
        $offer->due_date = $request->due_date;
        $offer->information = $request->information;
        if ($offer->save()){
            if($offer->save()){
                return $this->returnData("offer",$offer,"offer updated successfully");

            }
            else
                return $this->returnError("999","something goes rung");
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $offer = Offer::find($id);
        $result = $offer->delete();
        if ($result){
            return $this->returnSuccessMessage("offer deleted successfully");
        }
        else{
            return $this->returnError("999","something goes rung");

        }


    }
}
