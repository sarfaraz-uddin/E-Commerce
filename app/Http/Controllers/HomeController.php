<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Bigposter;
use App\Models\Department;
use App\Models\Deal;
use App\Models\Contact;
use App\Models\SpecialProduct;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function signup(){
        return view('layout.signup');
    }
    public function login(){
        return view('layout.login');
    }
    public function contact(){
        return view('layout.contact');
    }
    public function main(){
        $specialproduct=SpecialProduct::all();
        $products=Products::all();
        $dealsort=Deal::where('toshow',true)->get();
        $endDate=null;
        $dateValue = null;
        $startdate=null;
        $deal=Deal::all();
        foreach($deal as $d){
            if($d->toshow==1){
                $startdate=$d->created_at;
                $endDate=$d->endDate;
                $dateValue = $startdate->format('Y-m-d  H:i:s');
            }
        }
        $departments=Department::all();
        $bigposter=Bigposter::all();
        $latestproducts=Products::orderBy('created_at','DESC')->get()->take(8);
        $category=Category::all();
        $ca = Cart::all();
        $userId = Auth::id(); 
        $exist = Cart::where('userid', $userId)->first();
        if ($exist) {
            $productIds = json_decode($exist->product_ids, true);
            foreach($productIds as $getids){
                $product_keys[]=$getids['productid'];
            }
            $count = count($product_keys);
            $productData = Products::whereIn('id', $product_keys)->get();
        } 
        else {
            $productData = [];
            $count=0;
        }
        return view('layout.index',compact('category','products','latestproducts','bigposter','count','productData','departments','deal','endDate','dealsort','specialproduct','dateValue','ca'));
    }

    public function shop(Request $request){
        $ca = Cart::all();
        $query=Products::query();
        $category=Category::all();
        $products=Products::all();
        $brands=Brand::all();
        $uniqueCategory = Category::all()->unique('categories');
        $departments=Department::all();
        $cart=Cart::all();
        $userId=Auth::id();
        $exist = Cart::where('userid', $userId)->first();
        $latestproducts=Products::orderBy('created_at','DESC')->get()->take(8);
        if ($exist) {
            $productIds = json_decode($exist->product_ids, true);
            foreach($productIds as $getids){
                $product_keys[]=$getids['productid'];
            }
            $count = count($product_keys);
            $productData = Products::whereIn('id', $product_keys)->get();
        } 
        else {
            $productData = [];
            $count=0;
        }
        return view('layout.shop',compact('products','category','uniqueCategory','brands','departments','count','productData','latestproducts','ca'));
    }
    public function PriceFilter(Request $req){
        $latestproducts=Products::orderBy('created_at','DESC')->get()->take(8);
        if($req->ajax()){
            $minamount = filter_var($req->minamount, FILTER_SANITIZE_NUMBER_INT);
            $maxamount = filter_var($req->maxamount, FILTER_SANITIZE_NUMBER_INT); 
            if(empty($req->category) && empty($req->globalBrands)){
                $unfilteredgoods=Products::all();
                   // foreach ($unfilteredgoods as $goods) {
                //     $goods->price = str_replace("$", "", $goods->price);
                // }
                $unfilteredgoods = Products::all()->map(function($item) {
                    $item->price = intval($item->price);
                    return $item;
                });
                $goods = $unfilteredgoods->filter(function($item) use ($minamount, $maxamount) {
                    return $item->price >= $minamount && $item->price <= $maxamount;
                });
                return view('layout.categoryfilter', compact('goods','latestproducts'));
            }
            else if(empty($req->category) && !empty($req->globalBrands)){
                $goods=Products::whereIn('brandId',$req->globalBrands)->get();
                $goods=$goods->map(function($item){
                    $item->price=intval($item->price);
                    return $item;
                });
                $goods=$goods->filter(function($item) use ($minamount,$maxamount){
                    return $item->price >= $minamount && $item->price <= $maxamount;
                });
                return view('layout.categoryfilter', compact('goods','latestproducts'));
            }
            else if(!empty($req->category) && empty($req->globalBrands)){
                $unfiltercategorygoods = Products::where('categoryid', $req->category)->get();
                $unfilteredgoods = $unfiltercategorygoods->map(function($item) {
                $item->price = intval($item->price);
                    return $item;
                }); 
                $goods = $unfilteredgoods->filter(function($item) use ($minamount, $maxamount) {
                    return $item->price >= $minamount && $item->price <= $maxamount;
                });
                return view('layout.categoryfilter', compact('goods','latestproducts'));
            }
            else if(!empty($req->category) && !empty($req->globalBrands)){
                $goods=Products::where('categoryid',$req->category)->whereIn('brandId',$req->globalBrands)->get();
                $goods = $goods->map(function($item) {
                    $item->price = intval($item->price);
                        return $item;
                }); 
                $goods = $goods->filter(function($item) use ($minamount, $maxamount) {
                    return $item->price >= $minamount && $item->price <= $maxamount;
                });
                return view('layout.categoryfilter', compact('goods','latestproducts'));           
            }
        }
    }
    public function data(Request $request){
        $latestproducts=Products::orderBy('created_at','DESC')->get()->take(8);
        $category=Category::all();
        $products=Products::all();
        if($request->ajax()){
            if(empty($request->category)){
                $goods=Products::all();
                return view('layout.categoryfilter',compact('goods','category','latestproducts'));
            }
            else{
                $goods=Products::where(['categoryid'=>$request->category])->get();
                return view('layout.categoryfilter',compact('goods','category','latestproducts'));
            }
            // return response()->json(['goods'=>$goods]);
        }
    }
    public function boxFilter(Request $req){
        $latestproducts=Products::orderBy('created_at','DESC')->get()->take(8);
        if($req->ajax()){
            if(empty($req->category)){
                if(empty($req->brands)){
                    $goods=Products::all();
                    return view('layout.categoryfilter',compact('goods','latestproducts'));
                }
                else{
                    $goods=Products::whereIn('brandId',$req->brands)->get();
                    return view('layout.categoryfilter',compact('goods','latestproducts'));
                }
            }
            else if(!empty($req->category)){
                if(empty($req->brands)){
                    $goods=Products::where('categoryid',$req->category)->get();
                    return view('layout.categoryfilter',compact('goods','latestproducts'));
                }
                else{
                    $goods=Products::where('categoryid',$req->category)->whereIn('brandId',$req->brands)->get();
                    return view('layout.categoryfilter',compact('goods','latestproducts')); 
                }
            }
        }    
    }
    public function getProduct($id)
    {
        $product = Products::find($id);
        return response()->json($product);
    }

    public function readmore(){
        return view('layout.readmore');
    }
    public function checkout(){
        return view('layout.checkout');
    }

    public function about(){
        return view('layout.aboutUs');
    }
    public function aboutuser(){
        return view('layout.userpage');
    }

}
