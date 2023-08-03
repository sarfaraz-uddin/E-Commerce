<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Products;
use Illuminate\Support\Facades\Auth;


class CheckoutController extends Controller
{
    //
    public function getDatas(Request $req){
        if(Auth::check()){
            $userid = Auth::id();
            $cart=Cart::where('userid',$userid)->first();
            if($cart){
                if($cart->shipping!=null){
                    $data=$cart->product_ids;
                    $data=json_decode($data);
                    $qty=[];
                    foreach($data as $key=>$value){
                        $qty[$value->productid]=$value->qty;
                    }
                    $price=[];
                    foreach($data as $key=>$value){
                        $price[$value->productid]=$value->price;
                    }
                    $keys = array_column($data, 'productid');
                    $productsgive=Products::whereIn('id',$keys)->get();
                    return view('layout.checkout',compact('productsgive','qty','price','cart'));
                }
                else{
                    return back()->with('ms','Pls choose the shipping method.');
                }
            }
            else{
                return back()->with('ms','Pls update your carts.');
            }
        }
    }
    // public function datas(Request $req){
    //     $subtotal=$req->subtotal;
    //     $total=$req->total;
    //     $shipping=$req->shipping;

    //     $req->session()->put('subtotal', $subtotal);
    //     $req->session()->put('total', $total);
    //     $req->session()->put('shipping', $shipping);
    // }
}
