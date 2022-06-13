<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    use HasFactory;
    protected $table = 'devices';
    protected $fillable = [
        'id','service_id','name','description','created_at','updated_at'];
    protected $hidden =[

    ];

    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }
}
