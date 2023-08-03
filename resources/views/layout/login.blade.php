@extends('layout.app')


@section('contents')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>A.S.K Ecommerce</title>
    <link rel="stylesheet" href="home/css/panda.css">
</head>
<body class="bod">

<div class="panda">
    <div class="ear"></div>
        <div class="face">
            <div class="eye-shade"></div>
            <div class="eye-white">
                <div class="eye-ball"></div>
            </div>
            <div class="eye-shade rgt"></div>
            <div class="eye-white rgt">
                <div class="eye-ball"></div>
            </div>
            <div class="nose"></div>
            <div class="mouth"></div>
        </div>
        <div class="body"></div>
        <div class="foot">
            <div class="finger"></div>
        </div>
        <div class="foot rgt">
            <div class="finger"></div>
        </div>
</div>

<form action="{{route('logging')}}" method='post' class="pandaform">
    @csrf
    @if (session()->has('fail'))
       <div style="color:black;background:lightcoral">{{session()->get('fail')}}</div>
    @endif 
    <div class="notsigned">
        <h6> Not Signed In Yet?? <a href="{{Route('signup')}}">SignUp</a></h6>
    </div>
    <div class="hand"></div>
    <div class="hand rgt"></div>
    
    <h1>Login</h1>
    <div class="form-group">
        <input type="email" required="required" class="form-control" name="email" tabindex='1'/>
        <label class="form-label">Email</label>
    </div>
    <div class="form-group">
        <input id="password" tabindex='2' name="password" type="password" required="required" class="form-control"/>
        <label class="form-label">Password</label>
        <input type="checkbox" name="" onclick="myFunction()"><br>
        <a href="{{route('forgot')}}">Forgot Password?</a>
        <p class="alert">Invalid Credentials..!!</p><br>
        <button class="bttn" type="submit" tabindex='3'>Submit</button>
    </div>
</form>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="home/js/script.js"></script>
</body>
</html>
@endsection