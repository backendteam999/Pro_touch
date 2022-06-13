<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $table = 'notifications';
    protected $fillable = [
        'id','message','user_id','created_at','updated_at'];
    protected $hidden =[

    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
