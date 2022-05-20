<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $offer = Offer::get();
        return response()->json(new Message($offer, '200', true, 'info', 'done', 'تم'));
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

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $offer_data = [];

        if($request->has('clinic_id')) if(!is_null($request->clinic_id)) $offer_data['clinic_id'] = $request->clinic_id;
        if($request->has('service_id')) if(!is_null($request->service_id)) $offer_data['service_id'] = $request->service_id;
        if($request->has('offer_price')) if(!is_null($request->offer_price)) $offer_data['offer_price'] = $request->offer_price;
        if($request->has('start_date')) if(!is_null($request->start_date)) $offer_data['start_date'] = $request->start_date;
        if($request->has('due_date')) if(!is_null($request->due_date)) $offer_data['due_date'] = $request->due_date;
        if($request->has('information')) if(!is_null($request->information)) $offer_data['information'] = $request->information;

        try
        {
            $offer = Offer::create($offer_data);
            $offer = $offer->Offer()->create($offer_data);
            return response()->json(new Message($offer->load('device'), '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show(Offer  $offer)
    {
        return response()->json(new Message($offer, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, Offer  $offer)
    {
        $rules = [
            'clinic_id'=> 'integer|required',
            'service_id'=> 'integer|required',
            'offer_price'=> 'double|required',
            'start_date'=> 'date|required',
            'due_date'=> 'date|required',
            'information'=> 'text|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $offer_data = [];

        if($request->has('clinic_id')) if(!is_null($request->clinic_id)) $offer_data['clinic_id'] = $request->clinic_id;
        if($request->has('service_id')) if(!is_null($request->service_id)) $offer_data['service_id'] = $request->service_id;
        if($request->has('offer_price')) if(!is_null($request->offer_price)) $offer_data['offer_price'] = $request->offer_price;
        if($request->has('start_date')) if(!is_null($request->start_date)) $offer_data['start_date'] = $request->start_date;
        if($request->has('due_date')) if(!is_null($request->due_date)) $offer_data['due_date'] = $request->due_date;
        if($request->has('information')) if(!is_null($request->information)) $offer_data['information'] = $request->information;

        try
        {
            $offer->update($offer_data);
            $offer->update($offer_data);
            return response()->json(new Message($offer->load('offer'),'200', true, 'info', 'done', 'تم'));

        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy(Offer  $offer)
    {
        try
        {
            $offer->delete();
            return response()->json(new Message( $offer,'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }
}
