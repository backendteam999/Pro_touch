<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $table = 'patients';
    protected $fillable = [
        'id','name','age ','gender','user_id ',
        'created_at','updated_at'
    ];
    protected $hidden =[

    ];
}
