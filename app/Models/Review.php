<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function patient(){
        return $this->belongsTo(Patient::class,'id');
    }

    public function clinic(){
        return $this->belongsTo(Clinic::class,'id');
    }

}
