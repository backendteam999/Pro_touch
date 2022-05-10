<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class,'id');
    }

    public function reservation(){
        return $this->hasMany(Reservation::class,'id','id');
    }
}
