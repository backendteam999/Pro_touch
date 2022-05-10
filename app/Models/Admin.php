<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
protected $table = 'admins';
protected $fillable = [
    'id','name','phone_number','created_at','updated_at'];
protected $hidden =[

];
}
