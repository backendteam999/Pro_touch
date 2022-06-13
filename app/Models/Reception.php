<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reception extends Model
{
    use HasFactory;
    protected $table = 'receptions';
    protected $fillable = [
        'id',
        'name',
        'age',
        'gender',
        'skills',
        'user_id',
    ];
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function reservation(){
        return $this->hasMany(Reservation::class,'reception_id','id');
    }
}
