<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=[
        'productname','productimg','productprice','userid','productid',
    ];
    public function products(){
        return $this->hasMany(Products::class,'productid');
    }
    public function users(){
        return $this->hasOne(User::class,'userid');
    }
}
