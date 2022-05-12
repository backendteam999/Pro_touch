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
    public function ML_Dental_Clinic(){
        return $this->hasMany(ML_Dental_Clinic::class,'id','id');
    }


    public function ML_Nutrition_Clinic(){
        return $this->hasMany(ML_Nutrition_Clinic::class,'id','id');
    }
}
