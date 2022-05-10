<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    public function user (){
        return $this->belongsTo(User::class,'id');
    }

    public function medical_log(){
        return $this->hasOne(Medical_log::class,'id','id');
    }

    public function reservation(){
        return $this->hasOne(Reservation::class,'id','id');
    }

    public function review(){
        return $this->hasMany(Review::class,'id','id');
    }

}
