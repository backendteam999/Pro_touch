<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews';
    protected $fillable = [
        'id',
        'patient_id',
        'doctor_id',
        'clinic_id',
        'service_id',
        'reservation_id',
        'notes',
        'date',
        'next_view',
    ];

    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id');
    }
    public function doctor(){
        return $this->belongsTo(Doctor::class,'doctor_id');
    }
    public function clinic(){
        return $this->belongsTo(Clinic::class,'clinic_id');
    }
    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }
    public function reservation(){
        return $this->belongsTo(Reservation::class,'reservation_id');
    }

}
