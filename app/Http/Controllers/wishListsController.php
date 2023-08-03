<?php

namespace App\Http\Controllers;
use App\Models\Products;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\wishLists;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class wishListsController extends Controller
{
    public function addWishlist(Request $req){
        // dd($req->all());
        $productId = $req->input('product_id');
        $product = Products::find($productId);
        $wishlistItem = new wishLists(['product_id' => $product->id]);
        $wishlistItem->user_id=Auth::id();
        $wishlistItem->save();
        return redirect()->back()->with('success', 'Product added to wishlist!');
        
    }
}
