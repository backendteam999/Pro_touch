<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'age',
        'gender',
        'user_id',
        ];

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
