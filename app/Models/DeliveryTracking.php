<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryTracking extends Model
{
    use HasFactory;
    protected $fillable=[
        'total',
    ];
    public function order(){
        return $this->belongsTo(Order::class,'orderId');
    }
}
