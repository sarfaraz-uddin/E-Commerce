<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'categories','department_id'
    ];
    public function products(){
        return $this->hasMany(Products::class,'categoryid');
    }
    public function departments(){
        return $this->belongsTo(Department::class,'department_id');
    }
}
