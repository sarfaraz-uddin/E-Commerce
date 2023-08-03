<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deal;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DealController extends Controller
{
    //
    public function addDeal(Request $req){
        $image=$req->file('dealBackgroundImage');
        $response=$image->store('dbimages','public');
        $deal=new Deal();
        $deal->dealTitle = $req->dealTitle;
        $deal->dealDescription = $req->dealDescription;
        $deal->dealPrice = $req->dealPrice;
        $deal->dealBackgroundImage=$response;
        $deal->product_id = $req->product;
        $dateString=$req->endDate;
        $deal->endDate=$dateString;
        $deal->save();
        return redirect()->back()->with('msg','Deal Added!');
    }
    public function getDeal(){
        $deal=Deal::all();
        return view('admin.deal',compact('deal'));
    }
    public function dealShow(Request $request){
        $deal=Deal::all();
        foreach($deal as $makezero){
            $makezero->toshow=false;
            $makezero->save();
        }
        $data=$request->selectedValue;
        $dealsort=Deal::find($data);
        $dealsort->toshow=true;
        $dealsort->save();
    }
}
