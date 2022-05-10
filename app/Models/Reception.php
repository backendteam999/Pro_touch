<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    use HasFactory;

    protected $table = 'receptions';
    protected $fillable = [
        'id','name','age ','gender','skills','user_id ',
        'created_at','updated_at'
    ];
    protected $hidden =[

    ];
}
