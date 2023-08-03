<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
    //
    
    public function contact(Request $req)
    {
        //save data to the database
        $Obj=new Contact();
        $Obj->name=$req->name;
        $Obj->phone=$req->phoneno;
        $Obj->email=$req->email;
        $Obj->description=$req->description;
        $Obj->save();
        return back()->with('msg','THANK U for contacting us..We will reply to u as soon as possible.');
    }
}
