<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $fillable=[
        'username','email','password','img'
    ];
    public function cart(){
        return $this->hasMany(Cart::class,'userid');
    }
    public function notification(){
        return $this->hasMany(Notification::class,'userid');
    }
}
