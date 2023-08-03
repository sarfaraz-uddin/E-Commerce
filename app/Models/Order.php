<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable=[
        'firstName','lastName','companyName','phone','company','street1','street2','province','email','country','town','products','userid','total','subtotal',
    ];
    public function tracking(){
        return $this->hasOne(DeliveryTracking::class,'orderId');
    }
}
