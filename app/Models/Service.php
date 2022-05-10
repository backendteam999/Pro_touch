<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $table = 'services';
    protected $fillable = [
        'id','clinic_id','price','description',
        'created_at','updated_at'
    ];
    protected $hidden =[

    ];
}
