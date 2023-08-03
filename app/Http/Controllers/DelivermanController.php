<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliverMan;

class DelivermanController extends Controller
{
    //
    public function addDeliverman(Request $req){
        $validateData=$req->validate([
            'name'=>'required',
            'phone' => ['required', 'numeric', 'digits:10'],
            'address'=>'required',
            'image'=>'required',
        ],
    );

        $image=$req->file('image');
        $response=$image->store('dbimages','public');
        $deliverman=new Deliverman();
        $deliverman->name=$req->name;
        $deliverman->phone=$req->phone;
        $deliverman->address=$req->address;
        $deliverman->image=$response;
        $deliverman->save();
        return back()->with('msg','DeliveryMan Data Added Successfully');
    }
    public function getDeliverman(){
        $deliverman=Deliverman::all();
        return view('admin.deliverman',compact('deliverman'));
    }
    public function editdeliverman(Request $req){
        $image=$req->file('image');
        $response=$image->store('dbimages','public');
        $deliverman=Deliverman::find($req->delivermanid);
        $deliverman->name=$req->delivermanname;
        $deliverman->phone=$req->phone;
        $deliverman->address=$req->address;
        $deliverman->image=$response;
        $deliverman->save();
        return back()->with('edited','f');
    }
    public function statuss(Request $req){
        $deliverman=Deliverman::find($req->id);
        $deliverman->status=$req->status;
        $deliverman->save();
    }
    public function Deldeliverboy(Request $req){
        $deliverman=Deliverman::find($req->getid);
        $deliverman->delete();
        return back()->with('delmg','d');
    }
}
