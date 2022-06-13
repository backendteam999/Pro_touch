<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $fillable = [
        'id',
        'name',
        'age',
        'gender',
        'specialization',
        'user_id',
        'clinic_id','created_at','updated_at'
        ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function review(){
        return $this->hasMany(Review::class,'doctor_id','id');
    }
    public function reservation(){
        return $this->hasMany(Reservation::class,'doctor_id','id');
    }

    public function clinic(){
        return $this->belongsTo(Clinic::class,'clinic_id');
    }
}
