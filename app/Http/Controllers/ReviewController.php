<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Doctor;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $review = Review::get();
        return[
            'info' => $review,
        ];
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

        $this->validate($request ,$rules );

        $review = Review::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'clinic_id' => $request->clinic_id,
            'service_id' => $request->service_id,
            'reservation_id' => $request->reservation_id,
            'notes'=> $request->notes,
            'next_view'=> $request->next_view,
        ]);

        return [

            'review'=>$review,
        ];
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $review = Review::get()->where('id',$id);
        return [
            'review info' => $review,
        ];
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $review = Review::find($id);
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

        $this->validate($request ,$rules );
        $review->patient_id = $request->patient_id;
        $review->doctor_id = $request->doctor_id;
        $review->clinic_id = $request->clinic_id;
        $review->service_id = $request->service_id;
        $review->reservation_id = $request->reservation_id;
        $review->notes = $request->notes;
        $review->next_view = $request->next_view;
        if($review->save()) {
            return [
                'review' => $review,
            ];
        }

    }


}
