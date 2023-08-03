<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\DeliverMan;
use Illuminate\Support\Facades\Date;
use App\Models\Notification;



class OrderController extends Controller
{
    //
    public function postOrder(Request $req){
        $validateorder=([
            'firstname'=>'required',
            'lastname'=>'required',
            'company'=>'required',
        ]);
        if(Auth::check()){
            $userid=Auth::id();
            $products=$req->products;
            $products_encode=json_encode($products);
            $orderall=Order::all();
            $maketrue=false;
            foreach($orderall as $idcheck){
                if($idcheck->userid==$userid){
                    $maketrue=true;
                }
            }
            // if(!$maketrue){
                $order=Order::create([
                    'firstName'=>$req->firstname,
                    'lastName'=>$req->lastname,
                    // 'companyName'=>$req->company,
                    'country'=>$req->country,
                    'street1'=>$req->streetaddress1,
                    'town'=>$req->town,
                    'province'=>$req->province,
                    'email'=>$req->email,
                    'phone'=>$req->phone,
                    'products'=>$products_encode,
                    'userid'=>$userid,
                    'subtotal'=>$req->subtotal,
                    'total'=>$req->total,   
                ]);
                $notify=new Notification();
                $notify->userid=Auth::id();
                $notify->orderid=$order->id;
                $notify->save();
                return back()->with('orderpost','order has been posted successfully');

            // }
            // else{
            //     dd('fjlsd');
            // }
        }
    }
    public function orders(Request $req){
        $orderproducts=[];
        $order=Order::all();
        $deliverman=DeliverMan::all();
        $products_decode=[];
        if(isset($order)){
            foreach($order as $orders){
                $products_decode=json_decode($orders->products,true);
            }
        }
        else{
            $products_decode=[];
        }
        return view('admin.order',compact('order','products_decode','deliverman'));
    }
    public function giveproducts(Request $req){
        $orderid=$req->orderid;
        $order=Order::find($orderid);
        $products_decode=[];
        if(isset($order)){
                $products_decode=json_decode($order->products,true);
        }
        else{
            $products_decode=[];
        }
        return response()->json([
            'products' => $products_decode
        ]);
    }

    public function delorders(Request $req){
        $order=Order::find($req->getid);
        $order->delete();
        return back();
    }
}
