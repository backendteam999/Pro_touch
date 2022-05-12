<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ML_Nutrition_Clinic extends Model
{
    use HasFactory;
    public function Medical_log(){
        return $this->belongsTo(Medical_log::class,'id');
    }
}
