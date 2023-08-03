<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

$wishlist = wishlist::where ('user_id,$user_id')->whwre('model_id, $model_id')->first();
if($wishLists){
    $notification = array(
        'message'=>'Model is already in Wishlist',
        'alert-type'=>'error'
    );
    return redirect()->back()->with($notification);
    else{
        wishLists::insert([
            'user_id' =>$user_id,
            'model_id' =>$model_id
        ]);
        $notification = array{
            'message'=>'Model is added Successfully to wishlist',
            'alert-type'=>'success'
        };
        return redirect()->back()->with($notification);
    }
}