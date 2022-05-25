<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'clinic_id',
        'price',
        'description',
    ];

    public function device (){
        return $this->hasMany(Device::class,'id','id');
    }

    public function services_ordered(){
        return $this->hasMany(Services_ordered::class,'id','id');
    }

    public function clinic(){
        return $this->belongsTo(Clinic::class,'id','id');
    }
}
