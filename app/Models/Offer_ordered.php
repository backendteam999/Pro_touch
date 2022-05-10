<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Offer_ordered extends Model
{
    use HasFactory;

    protected $table = 'offers_ordereds';
    protected $fillable = [
        'id','Date','offer_id ',
        'created_at','updated_at'
    ];
    protected $hidden =[

    ];
}
