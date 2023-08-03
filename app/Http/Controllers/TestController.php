<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;


class TestController extends Controller
{
    //
    // public function test(Request $request){
    //     $deals=Deal::all();
    //     foreach($deals as $makezero){
    //         $makezero->toshow=false;
    //         $makezero->save();
    //     }
    //     $data=$request->selectedValue;
    //     $deal=Deal::find($data);
    //     $deal->toshow=true;
    //     $deal->save();
    // }
    public function test(Request $request){
        $userid = Auth::id();
        $checkcart = Cart::where('userid', $userid)->first();   
        $productId=$request->input('productid');
        $quantity=$request->input('quantity');
        $updatetotalhidden=$request->input('updatetotalhidden');
        $forqty = array_combine($productId, array_map('intval',$quantity));
        $pricetoalter=$request->input('pricetoalter');
        $forprice = array_combine($productId, array_map('intval', $pricetoalter));
        $productIds = json_decode($checkcart->product_ids, true);
        foreach($productIds as &$change){
            foreach($forqty as $key=>$value){
                if($change['productid']==$key){
                    $change['qty']=$forqty[$key];
                }
            }
            foreach($forprice as $key=>$value){
                if($change['productid']==$key && $forprice[$key]!=null){
                    $change['price']=$forprice[$key];
                }
            }
        }
        $validatedData=$request->validate([
            'shippinghidden'=>'nullable',
            'totalhidden'=>'not_in:NaN',
        ],[
            'totalhidden.not_in'=>'Pls enter the shipping process',
            'shippinghidden.nullable' => 'Pls enter the shipping process',
        ]);
        $checkcart->product_ids = json_encode($productIds);
        $checkcart->subtotal=$request->updatetotalhidden;
        $checkcart->total=$request->totalhidden;
        $checkcart->shipping=$request->shippinghidden;
        $checkcart->save();
        return back()->with('update','Cart has been updated successfully');
    }
    public function clear(Request $req){
        $cart=Cart::all();
        $userid=$req->od;
        $get=Cart::where('userid',$userid)->first();
        $get->delete();
        return back()->with('msg','Cart Has Been Cleared!');
    }
    public function cart(){
        $cart=Cart::all();
        $userid=Auth::id();
        $exist=Cart::where('userid',$userid)->first();
        if ($exist){
            $contained = json_decode($exist->product_ids, true);
            $count = count($productIds); 
            $productData = Products::whereIn('id', $productIds)->get();
        } 
        else {
            $productData = [];
            $count=0;
        }
        return view('layout.cart',compact('cart','productData','count'));
    }
}