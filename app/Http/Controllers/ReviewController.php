<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $review = Review::get();
        return response()->json(new Message($review, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $rules = [
            'patient_id'=> 'integer|required',
            'doctor_id'=> 'integer|required',
            'clinic_id'=> 'integer|required',
            'service_id'=> 'integer|required',
            'reservation_id'=> 'integer|required',
            'notes'=> 'text|required',
            'date'=> 'date|required',
            'next_view'=> 'String|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $review_data = [];

        if($request->has('patient_id')) if(!is_null($request->patient_id)) $review_data['patient_id'] = $request->patient_id;
        if($request->has('doctor_id')) if(!is_null($request->doctor_id)) $review_data['doctor_id'] = $request->doctor_id;
        if($request->has('clinic_id')) if(!is_null($request->clinic_id)) $review_data['clinic_id'] = $request->clinic_id;
        if($request->has('service_id')) if(!is_null($request->service_id)) $review_data['service_id'] = $request->service_id;
        if($request->has('reservation_id')) if(!is_null($request->reservation_id)) $review_data['reservation_id'] = $request->reservation_id;
        if($request->has('notes')) if(!is_null($request->notes)) $review_data['notes'] = $request->notes;
        if($request->has('date')) if(!is_null($request->date)) $review_data['date'] = $request->date;
        if($request->has('next_view')) if(!is_null($request->next_view)) $review_data['next_view'] = $request->next_view;


        try
        {
            $review = Review::create($review_data);
            $review = $review->Review()->create($review_data);
            return response()->json(new Message($review->load('device'), '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show(Review  $review)
    {
        return response()->json(new Message($review, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, Review  $review)
    {
        $rules = [
            'patient_id'=> 'integer|required',
            'doctor_id'=> 'integer|required',
            'clinic_id'=> 'integer|required',
            'service_id'=> 'integer|required',
            'reservation_id'=> 'integer|required',
            'notes'=> 'text|required',
            'date'=> 'date|required',
            'next_view'=> 'String|required',
        ];

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $review_data = [];

        if($request->has('patient_id')) if(!is_null($request->patient_id)) $review_data['patient_id'] = $request->patient_id;
        if($request->has('doctor_id')) if(!is_null($request->doctor_id)) $review_data['doctor_id'] = $request->doctor_id;
        if($request->has('clinic_id')) if(!is_null($request->clinic_id)) $review_data['clinic_id'] = $request->clinic_id;
        if($request->has('service_id')) if(!is_null($request->service_id)) $review_data['service_id'] = $request->service_id;
        if($request->has('reservation_id')) if(!is_null($request->reservation_id)) $review_data['reservation_id'] = $request->reservation_id;
        if($request->has('notes')) if(!is_null($request->notes)) $review_data['notes'] = $request->notes;
        if($request->has('date')) if(!is_null($request->date)) $review_data['date'] = $request->date;
        if($request->has('next_view')) if(!is_null($request->next_view)) $review_data['next_view'] = $request->next_view;

        try
        {
            $review->update($review_data);
            $review->update($review_data);
            return response()->json(new Message($review->load('review'),'200', true, 'info', 'done', 'تم'));

        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }


}
