<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Mail\Websitemail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    //
    public function signup(Request $req){
        $req->validate([
            'username'=> 'required',
            'email'=> 'required|email|unique:users,email',
            'password'=> 'required',
        ]);
        
        $token = hash('sha256',time());
        
        $user = new User();
        $user->username = $req->username;
        $user->email = $req->email;
        $user->password = Hash::make($req->password);
        $user->token = $token;
        $user->save();
      
        return redirect()->route('login');
    }

    public function logging(Request $req){
        
        if(Auth::attempt(['email' => $req->email,'password'=>$req->password])){
            $usertype=Auth::user()->usertype;
            if($usertype==='1'){
                return redirect()->route('dashboard');
            }
            else{
                return redirect()->route('main');
            }
        }
        else{
            Session::flash('fail','Email or password is incorrect!');
            return back();
        }
    }
    public function logout(){
        Session::flush();
        Auth::logout();
        // return redirect()->route('home');
        // auth()->logout();

        return redirect()->route('main');
    }
    public function forgot(){
        return view('layout.forgot');
    }
    public function forget_password_submit(Request $req)
    {
        
        $token = hash('sha256',time());

        $user = User::where('email',$req->email)->first();
        if(!$user) {
            Session::flash('fail','Email not found!');
            return back();
        }

        $user->token = $token;
        $user->update();

        $reset_link = url('reset-password/'.$token.'/'.$req->email);
        $subject = 'Reset Password';
        $message = 'Please click on the following link: <br><a href="'.$reset_link.'">Click here</a>';
        Mail::to($req->email)->send(new Websitemail($subject,$message));
     
        Session::flash('success','Link Code has been sent to your Email!');
        return back();
    }
    public function password_reset($token,$email)
    {
        $user = User::where('token',$token)->where('email',$email)->first();
        if(!$user) {
            return redirect()->route('login');
        }
        return view('layout.password_reset', compact('token','email'));

    }
    public function reset_password_submit(Request $req)
     {   
    if($req->password!=$req->repassword)
    {
        Session::flash('Error','The password did not match.Plz enter same password!');
        return back();
    }
    $user = User::where('token', $req->token)->where('email', $req->email)->first();
    
    $user->token = '';
    $user->password = Hash::make($req->password);
    $user->update();
        
    return redirect()->route('login');
    Session::flash('success','Password reset success!');
    }

    public function addImg(Request $req){
        $image=$req->file('image');
        $response=$image->store('dbimages','public');
        $user=Auth::user()->id;
        $data=User::find($user);
        $data->img=$response;
        $data->save();
    }
    public function userinfo(){
        return view('layout.userinfo');
    }
    public function changePass(Request $req){
        $req->validate([
            'oldpassword'=>'required',
            'newpassword'=>'required',
            'retypepassword'=>'required|same:newpassword'
        ]);
        $curPassStatus = Hash::check($req->oldpassword, auth()->user()->password);
        if ($curPassStatus) {
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($req->newpassword),
            ]);

            return redirect()->back()->with('success', 'Password updated succesfully');
        } else {
            return redirect()->back()->with('error', 'Old Password not matched');
        }
    }
                
}


