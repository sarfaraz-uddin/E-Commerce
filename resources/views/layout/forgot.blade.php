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

<form action="{{route('forget_password_submit')}}" method='post' class="pandaform">
    @csrf
    <div class="hand"></div>
    <div class="hand rgt"></div>
    @if (session()->has('fail'))
    <div style="color:black;background:lightcoral">{{session()->get('fail')}}</div>
    @endif
    @if (session()->has('success'))
       <div style="color:black;background:lightgreen">{{session()->get('success')}}</div>
    @endif 
    <h1>Forgot Your Password</h1> 
    <div class="form-group">
        <input type="email" required="required" class="form-control" name="email" tabindex='1'/>
        <label class="form-label">Email</label>
    </div>
    <button class="bttn" type="submit" tabindex='3'>Send Link Code</button>
    <div class="form-group">
        <a href="{{ route('login') }}">Back to login</a>
    </div>
</form>

    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="home/js/script.js"></script>
</body>
</html>
@endsection