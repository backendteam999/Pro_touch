<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ML_Nutrition_Clinic extends Model
{
    use HasFactory;

    protected $fillable = [
        'food_allergy','job','length','age','sport_schedule','medical_log_id',
    ];

    public function Medical_log(){
        return $this->belongsTo(Medical_log::class,'medical_log_id');
    }
}
