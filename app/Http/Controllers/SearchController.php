<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Department;
use App\Models\Brand;
use App\Models\DeliverMan;
use App\Models\Order;
use App\Models\DeliveryTracking;

class SearchController extends Controller
{
    //
    public function getSearch(Request $req){
        $searchItem=$req->input('searchItem');
        $items=Products::where('name','LIKE','%'.$searchItem.'%')->get();
        return response()->json($items);
    }
    public function searchResults(){
        $id=request()->input('id');
        $product=Products::where('id',$id)->get();
        $productrelate=Products::where('categoryid',$product[0]->categoryid)->get();
        $latestproducts=Products::orderBy('created_at','DESC')->get()->take(8);
        return view('layout.searchView',compact('product','productrelate','latestproducts'));
    }
    public function searchThis(Request $req){
        $searchItem=$req->searchItem;
        $category=Category::where('categories','LIKE',$searchItem.'%')->get();
        return view('admin.categoryfilter',compact('category'));
    }
    public function searchProducts(Request $req){
        $searchItem=$req->searchItem;
        $products=Products::where('name','LIKE','%'.$searchItem.'%')->get();
        return view('admin.prouductsfilter',compact('products'));
    }
    public function searchDepartments(Request $req){
        $searchItem=$req->searchItem;
        $departsearched=Department::where('departmentName','LIKE','%'.$searchItem.'%')->get();
        return view('admin.departmentsfilter',compact('departsearched'));
    }
    public function searchBrands(Request $req){
        $searchItem=$req->searchItem;
        $brandsearched=Brand::where('brandName','LIKE','%'.$searchItem.'%')->get();
        return view('admin.brandfilter',compact('brandsearched'));
    }
    public function searchDeliverman(Request $req){
        $searchItem=$req->searchItem;
        $delivermansearched=DeliverMan::where('name','LIKE','%'.$searchItem.'%')->get();
        return view('admin.delivermanfilter',compact('delivermansearched'));
    }
    public function searchOrders(Request $req){
        $searchItem=$req->searchItem;
        $order=Order::where('phone','LIKE','%'.$searchItem.'%')->get();
        return view('admin.orderfilter',compact('order'));
    }
    public function deliverytrackingResults(Request $req){
        $searchItem=$req->searchItem;
        $delivertrack=DeliveryTracking::where('nameRecipient','LIKE','%'.$searchItem.'%')->get();
        return view('admin.deliverytrackingfilter',compact('delivertrack'));
    }
}
