<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function doctor(){
        return $this->hasMany(Doctor::class,'id','id');
    }

    public function services(){
        return $this->hasMany(Service::class,'id','id');
    }

    public function review(){
        return $this->hasMany(Review::class,'id','id');
    }

    public function reservation(){
        return $this->hasMany(Reservation::class,'id','id');
    }

    public function offer(){
        return $this->hasMany(Offer::class,'id','id');
    }
}
