<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services_ordered extends Model
{
    use HasFactory;
    protected $table = 'services_ordereds';
    protected $fillable = [
        'id','Date','services_id','created_at','updated_at'];
    public function services(){
        return $this->belongsTo(Service::class,'services_id');
    }
}
