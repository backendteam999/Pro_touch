<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $table = 'offers';
    protected $fillable = [
        'id','clinic_id','service_id ','offer_price','start_date','due_date','information',
        'created_at','updated_at'
    ];
    protected $hidden =[

    ];
    ################################### realations ########################################
    public function clinic(){
        return $this->belongsTo(Clinic::class,'clinic_id');
    }
    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }
    ######################################################################################
}
