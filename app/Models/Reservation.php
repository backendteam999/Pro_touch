<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $table = 'reservations';
    protected $fillable = [
        'id','patient_id','doctor_id','clinic_id','reception_id ','event_id ',
        'service_id','Date','status','Confirmation','offset','created_at','updated_at'
    ];
    protected $hidden =[

    ];
}
