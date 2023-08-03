<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverMan extends Model
{
    use HasFactory;
    public function deliverytracking(){
        return $this->belongsTo(DeliveryTracking::class,'productid');
    }
}
