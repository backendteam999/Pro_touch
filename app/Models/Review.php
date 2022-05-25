<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $fillable = [
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
        return $this->belongsTo(Patient::class,'id');
    }

    public function clinic(){
        return $this->belongsTo(Clinic::class,'id');
    }

}
