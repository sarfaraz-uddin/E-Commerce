<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ResetController extends Controller
{
    //
    public function generateToken()
    {
        $token = Str::random(6);
        return view('mail.hello',compact('token'));
    }
    public function Token(){
        return view('mail.gene');
    }

}
