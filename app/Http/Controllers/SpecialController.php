<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpecialProduct;
use App\Models\Products;

class SpecialController extends Controller
{
    //
    public function specialProducts(){
        $products=Products::all();
        return view("admin.addspecialproducts",compact('products'));
    }
    public function addSpecialProducts(Request $req){
        $validateData=$req->validate([
            'description'=>'required',
            'discountprice' => 'required',
        ],
    );
        $product=SpecialProduct::create([
            'description'=>$req->description,
            'discountoffer'=>$req->discountoffer,
            'discountprice'=>$req->discountprice,
            'productId'=>$req->productId
        ]);
        return back()->with('msg','Products added Successfully!');
    }
}
