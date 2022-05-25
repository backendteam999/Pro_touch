<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ML_DematologyAndLeaser extends Model
{
    use HasFactory;
    protected $fillable =[
        'skin_type' , 'skin_colour' ,'skin_allergies' , 'job' , 'medical_log_id',
    ];

    public function Medical_log(){
        return $this->belongsTo(Medical_log::class,'medical_log_id');
    }
}
