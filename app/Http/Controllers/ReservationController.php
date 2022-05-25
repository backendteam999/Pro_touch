<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Doctor;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $reservation = Reservation::get();
        return[
            'info' => $reservation,
        ];
    }


    /////////////////////////////////// Store //////////////////////////////////
    public function store(Request $request)
    {
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

        $this->validate($request ,$rules );

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

        return [

            'reservation'=>$reservation,
        ];
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show($id)
    {
        $reservation = Doctor::get()->where('id',$id);
        return [
            'reservation info' =>$reservation,
        ];
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, $id)
    {
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
        $this->validate($request ,$rules );


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
        if($reservation->save()) {
            return [
                'reservation' => $reservation,
            ];
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy($id)
    {
        $reservation = Reservation::find($id);
        $result = $reservation->delete();
        if ($result){
            return ["result" => "the reservation has deleted"];
        }
        else{
            return ["result" => "operation failed"];
        }


    }
}
