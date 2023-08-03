<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialProduct extends Model
{
    use HasFactory;
    protected $fillable=[
        'discountoffer','discountprice','description','productId'
    ];
    public function product(){
        return $this->belongsTo(Products::class,'productId');
    }
}
