<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Doctor;
use App\Models\Reservation;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    use GeneralTrait;
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $reservation = Reservation::get();
        if($reservation) {
            return $this->returnData("reservation", $reservation, "this is all reservations");
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
            'reception_id'=> 'integer|required',
            'event_id'=> 'integer|required',
            'service_id'=> 'integer|required',
            'Date'=> 'date|required',
            'status'=> 'boolean|required',
            'Confirmation'=> 'boolean|required',
            'offset'=> 'integer|min:1|max:60|required',
        ];

        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }
        $reservation = Reservation::create([
            'patient_id' => $request->patient_id,
            'doctor_id' => $request->doctor_id,
            'clinic_id' => $request->clinic_id,
            'reception_id' => $request->reception_id,
            'event_id' => $request->event_id,
            'service_id'=> $request->service_id,
            'Date'=> $request->Date,
            'status'=> $request->status,
            'Confirmation'=> $request->Confirmation,
            'offset'=> $request->offset,
        ]);
        return $this->returnData("reservation",$reservation,"reservation added successfully");

    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $reservation = Doctor::get()->where('id',$id);
        if($reservation) {
            return $this->returnData("reservation", $reservation, "this is the reservation that you want");
        }
        return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
        $input = $request->all();
        $reservation = Reservation::find($id);
        $rules = [
            'patient_id'=> 'integer|required',
            'doctor_id'=> 'integer|required',
            'clinic_id'=> 'integer|required',
            'reception_id'=> 'integer|required',
            'event_id'=> 'integer|required',
            'service_id'=> 'integer|required',
            'Date'=> 'date|required',
            'status'=> 'boolean|required',
            'Confirmation'=> 'boolean|required',
            'offset'=> 'integer|min:1|max:60|required',
        ];
        $validator= \Illuminate\Support\Facades\Validator::make($input ,$rules );
        if ($validator->fails()) {
            $code = $this->returnCodeAccordingToInput($validator);
            return $this->returnValidationError($code, $validator);
        }

        $reservation->patient_id = $request->patient_id;
        $reservation->doctor_id = $request->doctor_id;
        $reservation->clinic_id = $request->clinic_id;
        $reservation->reception_id = $request->reception_id;
        $reservation->event_id = $request->event_id;
        $reservation->service_id = $request->service_id;
        $reservation->Date= $request->Date;
        $reservation->status = $request->status;
        $reservation->Confirmation = $request->Confirmation;
        $reservation->offset = $request->offset;
        if($reservation->save()){
            return $this->returnData("reservation",$reservation,"reservation updated successfully");

        }
        else
            return $this->returnError("999","something goes rung");
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $result = $reservation->delete();
        if ($result){
            return $this->returnSuccessMessage("reservation deleted successfully");
        }
        else{
            return $this->returnError("999","something goes rung");

        }


    }
}
