<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bigposter extends Model
{
    use HasFactory;
    protected $fillable=[
        'for','offer','description','offerprice','bigposterimg'
    ];
}
