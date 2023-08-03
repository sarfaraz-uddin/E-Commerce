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
        <div class="body1"></div>
        <div class="foot1">
            <div class="finger"></div>
        </div>
        <div class="foot1 rgt">
            <div class="finger"></div>
        </div>
    </div>

    <form action="{{route('reset_password_submit')}}" method='post' class="pandaform">
        @csrf
        <div class="hand"></div>
        <div class="hand rgt"></div>
        @if (session()->has('Error'))
            <div style="color:black;background:lightcoral">{{session()->get('Error')}}</div>
        @endif 
        <h1>Reset Password</h1>
        <input type="hidden" name="token" value="{{ $token }}">
        <input type="hidden" name="email" value="{{ $email }}">

        <div class="form-group">
            <input name="password" type="password"  class="form-control" />
            <label class="form-label">Password</label>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="password" name="repassword" type="password" class="form-control" />
            <label class="form-label">Re-enter your Password</label>
            @error('retype_password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <button class="bttn" type="submit">Reset</button>

    </form>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="home/js/script.js"></script>
</body>
</html>
@endsection