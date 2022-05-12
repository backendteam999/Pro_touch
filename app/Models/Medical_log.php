<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical_log extends Model
{
    use HasFactory;

    public function patient(){
        return $this->belongsTo(Patient::class,'id');
    }
    public function ML_Nutrition_Clinic(){
        return $this->hasMany(ML_Nutrition_Clinic::class,'medical_log_id','id');
    }
    public function ML_Dermatology_laser_clinic(){
        return $this->hasOne(ML_Dermatology_laser_clinic::class,'medical_log_id','id');
    }

}
