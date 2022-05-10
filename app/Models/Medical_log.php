<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medical_log extends Model
{
    use HasFactory;

    protected $table = 'medical_logs';
    protected $fillable = [
        'id','weight','Allergic','situation','chronic_diseases','genetic_diseases','surgery','medicine',
        'notes','patient_id ','created_at','updated_at'];
    protected $hidden =[

    ];
}
