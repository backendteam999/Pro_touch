<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinic_id','service_id','offer_price','start_date','due_date','information',
    ];

    public function clinic(){
        return $this->belongsTo(Clinic::class,'id');
    }
}
