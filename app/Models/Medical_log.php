<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical_log extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'weight',
        'Allergic',
        'situation',
        'chronic_diseases',
        'genetic_diseases',
        'surgery',
        'medicine',
        'notes',
    ];

    public function patient(){
        return $this->belongsTo(Patient::class,'id');
    }
    public function ML_Nutrition_Clinic(){
        return $this->hasOne(ML_Nutrition_Clinic::class,'medical_log_id','id');
    }
    public function ML_Dermatology_laser_clinic(){
        return $this->hasOne(ML_DematologyAndLeaser::class,'medical_log_id','id');
    }
    public function ML_Dental_clinic(){
        return $this->hasOne(ML_Dental_Clinic::class,'medical_log_id','id');
    }

}
