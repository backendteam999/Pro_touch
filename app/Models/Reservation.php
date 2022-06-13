<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    protected $table = 'reservations';
    protected $fillable = [
        'id',
        'patient_id',
        'doctor_id',
        'clinic_id',
        'reception_id',
        'event_id',
        'service_id',
        'Date',
        'status',
        'Confirmation',
        'offset',
    ];


    public function patient (){
        return $this->belongsTo(Patient::class,'patient_id');
    }
    public function event(){
        return $this->belongsTo(Reservation::class,'event_id');
    }
    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }

    public function clinic(){
        return $this->belongsTo(Clinic::class,'clinic_id');
    }
    public function reception(){
        return $this->belongsTo(Reception::class,'reception_id');
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
    public function review(){
        return $this->hasOne(Review::class,'reservation_id');
    }
}
