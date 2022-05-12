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

    public function ml_dental_clinic(){
        return $this->hasOne(ML_Dental_Clinic::class,'id','id');
    }
}
