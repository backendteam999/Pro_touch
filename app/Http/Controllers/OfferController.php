<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Doctor;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $offer = Offer::get();
        return[
            'info' => $offer,
        ];
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $rules = [
            'clinic_id'=> 'integer|required',
            'service_id'=> 'integer|required',
            'offer_price'=> 'double|required',
            'start_date'=> 'date|required',
            'due_date'=> 'date|required',
            'information'=> 'text|required',
        ];

        $this->validate($request ,$rules );

        $offer = Offer::create([
            'clinic_id' => $request->clinic_id,
            'service_id' => $request->service_id,
            'offer_price' => $request->offer_price,
            'start_date' => $request->start_date,
            'due_date' => $request->due_date,
            'information'=> $request->information,
        ]);

        return [

            'offer'=>$offer,
        ];
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $offer = Offer::get()->where('id',$id);
        return [
            'offer info' => $offer,
        ];
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $offer = Offer::find($id);
        $rules = [
            'clinic_id'=> 'integer|required',
            'service_id'=> 'integer|required',
            'offer_price'=> 'double|required',
            'start_date'=> 'date|required',
            'due_date'=> 'date|required',
            'information'=> 'text|required',
        ];

        $this->validate($request ,$rules );

        $offer->clinic_id = $request->clinic_id;
        $offer->service_id = $request->service_id;
        $offer->offer_price = $request->offer_price;
        $offer->start_date = $request->start_date;
        $offer->due_date = $request->due_date;
        $offer->information = $request->information;
        if ($offer->save()){
            return [
                'offer info' => $offer,
            ];
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $offer = Offer::find($id);
        $result = $offer->delete();
        if ($result){
            return ["result" => "the offer has deleted"];
        }
        else{
            return ["result" => "operation failed"];
        }


    }
}
