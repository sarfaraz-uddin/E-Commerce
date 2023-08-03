<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Brand;

class ProductsController extends Controller
{
    //
    public function products(Request $req){
        $validateData=$req->validate([
            'price' => ['required', 'numeric'],
            'name'=>'required',
            'image'=>'required',
            'color' => 'required|alpha',
            'quantity' => ['required', 'numeric'],
            'description'=>'required',
        ],
    );
        $image=$req->file('image');
        $response=$image->store('dbimages','public');
        $product=Products::create([
            'name' => $req->name,
            'price' => $req->price,
            'photo' => $response,
            'categoryid' => $req->categoryid,
            'brandId' => $req->brand,
            'color'=>$req->color,
            'quantity'=>$req->quantity,
            'description'=>$req->description,
            'size'=>$req->size,
        ]);
        return back()->with('msg','Products added Successfully!');
    }
    public function addProducts(){
        $products=Products::all();
        $brand=Brand::all();
        $category=Category::all();
        return view('admin.addproducts',compact('products','category','brand'));
    }
    public function editprods(Request $req){
        $product=Products::find($req->pid);
        $image=$req->file('image');
        $response=$image->store('dbimages','public');
        $product->name=$req->pname;
        $product->price=$req->pprice;
        $product->color=$req->pcolor;
        $product->categoryid=$req->cateid;
    $product->brandId=$req->brandedit;
        $product->description=$req->pdescription;
        $product->photo=$response;
        $product->save();
        return back()->with('edited','f');
    }
}
