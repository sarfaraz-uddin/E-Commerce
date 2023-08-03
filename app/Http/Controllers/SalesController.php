<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\DeliveryTracking;

class SalesController extends Controller
{
    //
    public function addSales(Request $req){
        $deliverytracking=DeliveryTracking::find($req->deliverid);
        $deliverytracking->setAttribute('paid/unpaid','1');
        $deliverytracking->save();
        $sales=new Sale();
        $sales->total=$req->delivertotal;
        $sales->subtotal=$req->subtotal;
        $sales->save();
    }
}
