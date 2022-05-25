<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $fillable = [
       'name',
        'age',
        'gender',
        'specialization',
        'user_id',
        'clinic_id',
        ];

    public function user(){
        return $this->belongsTo(User::class,'id');
    }

    public function review(){
        return $this->hasMany(Review::class,'id','id');
    }

    public function clinic(){
        return $this->belongsTo(Clinic::class,'id');
    }
}
