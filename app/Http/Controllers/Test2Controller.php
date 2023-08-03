<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialProduct;
use App\Models\Brand;

class Test2Controller extends Controller
{
    //
    public function datas(Request $req){
        Brand::create([
            'brandName'=>$req->subtotal
        ]);
    }
    public function datas1(){
        return view('layout.testview');
    }
}
