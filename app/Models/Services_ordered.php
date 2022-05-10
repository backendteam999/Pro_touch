<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services_ordered extends Model
{
    use HasFactory;
    public function services(){
        return $this->belongsTo(Service::class,'id');
    }
}
