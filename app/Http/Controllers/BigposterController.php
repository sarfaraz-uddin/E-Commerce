<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bigposter;

class BigposterController extends Controller
{
    //
    public function bigposter(){
        return view('admin.bigposter');
    }
    public function send(Request $req){
        $image=$req->file('posterimg');
        $response=$image->store('dbimages','public');
        $bigposter=new Bigposter();
        $bigposter->for=$req->for;
        $bigposter->offer=$req->offer;
        $bigposter->description=$req->description;
        $bigposter->offerprice=$req->offerprice;
        $bigposter->bigposterimg= $response;
        $bigposter->save();
        return back()->with('msg','BigPoster added successfully');
    }
}
