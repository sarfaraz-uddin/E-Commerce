<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable=[
        'departmentName','departmentImage',
    ];
    public function category(){
        return $this->hasMany(Category::class);
    }
}
