<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = [
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

    use HasFactory;

    public function patient (){
        return $this->belongsTo(Patient::class,'id');
    }

    public function clinic(){
        return $this->belongsTo(Clinic::class,'id');
    }
}
