<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Doctor;
use App\Models\Review;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    use GeneralTrait;
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $review = Review::get();
        if($review) {
            return $this->returnData("review", $review, "this is all reviews");
        }
        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
        $input = $request->all();
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


        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $review = Review::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'clinic_id' => $request->clinic_id,
            'service_id' => $request->service_id,
            'reservation_id' => $request->reservation_id,
            'notes'=> $request->notes,
            'next_view'=> $request->next_view,
        ]);
        return $this->returnData("review",$review,"review added successfully");

    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $review = Review::get()->where('id',$id);
        if($review) {
            return $this->returnData("review", $review, "this is the review that you want");
        }
        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $input = $request->all();
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


        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $review->patient_id = $request->patient_id;
        $review->doctor_id = $request->doctor_id;
        $review->clinic_id = $request->clinic_id;
        $review->service_id = $request->service_id;
        $review->reservation_id = $request->reservation_id;
        $review->notes = $request->notes;
        $review->next_view = $request->next_view;
        if($review->save()){
            return $this->returnData("review",$review,"review updated successfully");

        }
        else
            return $this->returnError("999","something goes rung");

    }


}
