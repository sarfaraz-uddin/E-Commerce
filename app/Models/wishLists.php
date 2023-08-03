<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class wishLists extends Model
{
    use HasFactory;
    protected $table = 'wishLists';

    protected $fillable = ['user_id', 'product_id'];
}
