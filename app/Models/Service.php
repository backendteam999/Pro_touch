<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = 'services';
    protected $fillable = [
        'id',
        'clinic_id',
        'price',
        'description',
    ];

    public function device (){
        return $this->hasMany(Device::class,'service_id','id');
    }

    public function services_ordered(){
        return $this->hasMany(Services_ordered::class,'services_id','id');
    }
    public function review(){
        return $this->hasMany(Review::class,'service_id','id');
    }

    public function clinic(){
        return $this->belongsTo(Clinic::class,'clinic_id','id');
    }
}
