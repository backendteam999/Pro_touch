<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    /////////////////////////////////// Index //////////////////////////////////
    public function index()
    {
        $reservation = Reservation::get();
        return response()->json(new Message($reservation, '200', true, 'info', 'done', 'تم'));
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

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $reservation_data = [];

        if($request->has('patient_id')) if(!is_null($request->patient_id)) $reservation_data['patient_id'] = $request->patient_id;
        if($request->has('doctor_id')) if(!is_null($request->doctor_id)) $reservation_data['doctor_id'] = $request->doctor_id;
        if($request->has('clinic_id')) if(!is_null($request->clinic_id)) $reservation_data['clinic_id'] = $request->clinic_id;
        if($request->has('reception_id')) if(!is_null($request->reception_id)) $reservation_data['reception_id'] = $request->reception_id;
        if($request->has('event_id')) if(!is_null($request->event_id)) $reservation_data['event_id'] = $request->event_id;
        if($request->has('service_id')) if(!is_null($request->service_id)) $reservation_data['service_id'] = $request->service_id;
        if($request->has('Date')) if(!is_null($request->Date)) $reservation_data['Date'] = $request->Date;
        if($request->has('status')) if(!is_null($request->status)) $reservation_data['status'] = $request->status;
        if($request->has('Confirmation')) if(!is_null($request->Confirmation)) $reservation_data['Confirmation'] = $request->Confirmation;
        if($request->has('offset')) if(!is_null($request->offset)) $reservation_data['offset'] = $request->offset;


        try
        {
            $reservation = Reservation::create($reservation_data);
            $reservation = $reservation->Reservation()->create($reservation_data);
            return response()->json(new Message($reservation->load('device'), '200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }




    /////////////////////////////////// Show //////////////////////////////////
    public function show(Reservation  $reservation)
    {
        return response()->json(new Message($reservation, '200', true, 'info', 'done', 'تم'));
    }


    /////////////////////////////////// Update //////////////////////////////////
    public function update(Request $request, Reservation  $reservation)
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

        $validated = Validator::make($request->all(),  $rules);
        if($validated->fails())
        {
            return response()->json(new Message($validated->errors(), '500', false, 'error', 'validation error', 'تحقق من المعلومات المدخلة'));
        }

        $reservation_data = [];

        if($request->has('patient_id')) if(!is_null($request->patient_id)) $reservation_data['patient_id'] = $request->patient_id;
        if($request->has('doctor_id')) if(!is_null($request->doctor_id)) $reservation_data['doctor_id'] = $request->doctor_id;
        if($request->has('clinic_id')) if(!is_null($request->clinic_id)) $reservation_data['clinic_id'] = $request->clinic_id;
        if($request->has('reception_id')) if(!is_null($request->reception_id)) $reservation_data['reception_id'] = $request->reception_id;
        if($request->has('event_id')) if(!is_null($request->event_id)) $reservation_data['event_id'] = $request->event_id;
        if($request->has('service_id')) if(!is_null($request->service_id)) $reservation_data['service_id'] = $request->service_id;
        if($request->has('Date')) if(!is_null($request->Date)) $reservation_data['Date'] = $request->Date;
        if($request->has('status')) if(!is_null($request->status)) $reservation_data['status'] = $request->status;
        if($request->has('Confirmation')) if(!is_null($request->Confirmation)) $reservation_data['Confirmation'] = $request->Confirmation;
        if($request->has('offset')) if(!is_null($request->offset)) $reservation_data['offset'] = $request->offset;

        try
        {
            $reservation->update($reservation_data);
            $reservation->update($reservation_data);
            return response()->json(new Message($reservation->load('reservation'),'200', true, 'info', 'done', 'تم'));

        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(), '100', false, 'error', 'error', 'خطأ'));
        }
    }


    /////////////////////////////////// Destroy //////////////////////////////////
    public function destroy(Device  $reservation)
    {
        try
        {
            $reservation->delete();
            return response()->json(new Message( $reservation,'200', true, 'info', 'done', 'تم'));
        }
        catch(\Exception $e)
        {
            return response()->json(new Message($e->getMessage(),'100', false, 'error', 'error', 'خطأ'));
        }
    }
}
