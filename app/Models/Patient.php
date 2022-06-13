<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    use HasFactory;
    protected $table = 'patients';
    protected $fillable = [
        'id',
        'name',
        'age',
        'gender',
        'user_id',
    ];
    public function user (){
        return $this->belongsTo(User::class,'user_id');
    }

    public function medical_log(){
        return $this->hasOne(Medical_log::class,'patient_id','id');
    }

    public function reservation(){
        return $this->hasMany(Reservation::class,'patient_id','id');
    }

    public function review(){
        return $this->hasMany(Review::class,'patient_id','id');
    }

}
