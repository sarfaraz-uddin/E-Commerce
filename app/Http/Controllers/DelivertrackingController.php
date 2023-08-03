<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryTracking;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Models\Products;


class DelivertrackingController extends Controller
{
    //
    public function getDelivertrackings(){
        $delivertrack=DeliveryTracking::all();
        $order=Order::all();
        return view('admin.deliverytracking',compact('order','delivertrack'));
    }
    public function tracking(Request $req){
        $orderid=$req->orderid;
        $order=Order::find($orderid);
        $products=$order->products;
        $delivertrack=new DeliveryTracking();
        $delivertrack->nameRecipient=$order->firstName;
        $delivertrack->street=$order->street1;
        $delivertrack->phone=$order->phone;
        $delivertrack->email=$order->email;
        $delivertrack->status="processing";
        $delivertrack->orderid=$order->id;
        $delivertrack->products=$products;
        $delivertrack->userid=$order->userid;
        $delivertrack->total=$order->total;
        $delivertrack->deliverboyId=$req-> deliverboyId;
        $delivertrack->subtotal=$order->subtotal;
        $delivertrack->save();
    }

    public function getTrackProducts(Request $req){
        $id=$req->id;
        $delivertrack=DeliveryTracking::find($id);
        $products=json_decode($delivertrack->products);
        return $products;
    }

    public function track(){
        $userid=Auth::id();
        if($userid){
            $gettrackdetails=DeliveryTracking::where('userid',$userid)->get();
            if($gettrackdetails->isNotEmpty()){
                $products=[];
                $getData=null;
                foreach($gettrackdetails as $products){
                    $products=json_decode($products->products,true);
                }
                foreach($gettrackdetails as $see){
                    $getData=$see->status;
                }
                $ord=Order::where('userid',$userid)->get();
                return view('layout.tracker',compact('gettrackdetails','products','getData','ord'));
            }
            else{
                $order=Order::where('userid',$userid)->get();
                return view('layout.tracker',compact('order'));
            }
        }
    }

    public function sendstatus(Request $req){
        $id=$req->input('trackid');
        $status=$req->input('status');
        $delivertrack=DeliveryTracking::where('id',$id)->first();
        $delivertrack->status=$status;
        $delivertrack->save();
    }
    public function acceptReject(Request $req){
        $orderid=$req->input('id');
        $value=$req->input('value');
        $order=Order::find($orderid);
        $order->acceptreject=$value;
        $order->save();
        $producting=Products::all();
        $order=Order::find($orderid);
        if($order->acceptreject==1){
            $products=json_decode($order->products,true);
            foreach($products as $p){
                foreach($producting as $productings){
                    if($p['id']==$productings->id){
                        $qty=$p['qty'];
                        $quantity=$productings->quantity;
                        $productings->quantity=$quantity-$qty;
                        $productings->save();
                    }
                }
            }
        }
    }
    public function getOrderID(Request $req){
        $orderid=$req->input('orderid');
        $order=Order::find($orderid);
        $pr=[];
        $pr=json_decode($order->products,true);
        return $pr;
    }
    public function addingOrder(Request $req){
        $orderid=$req->input('orderid');
        $order=Order::find($orderid);
        $add=[];
        $add=Order::where('id',$order->id)->get();
        return $add;
    }
    public function deldelivertrack(Request $req){
        $delivertrack=DeliveryTracking::find($req->getid);
        $delivertrack->delete();
        return back();
    }
}