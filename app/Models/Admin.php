<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;


class Admin extends  Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

protected $table = 'admins';
protected $fillable = [
    'id','name','phone_number','email','password','created_at','updated_at'];
protected $hidden =[

];
}
