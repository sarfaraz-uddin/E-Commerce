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

    <form action="{{route('signup')}}" method='post' class="pandaform">
        @csrf
        <div class="hand"></div>
        <div class="hand rgt"></div>
        <h1>SignUp</h1>
        <div class="form-group">
            <input type="text" class="form-control" id="username" name='username'>
            <label for="username" class="form-label">Username</label>
        </div>
        <div class="form-group">
            <input type="email" class="form-control" name="email" />
            <label class="form-label">Email</label>
            @if($errors->has('email'))
            <div class="alert alert-danger">{{$errors->first('email')}}</div>
            @endif
        </div>

        <div class="form-group">
            <input id="password" name="password" type="password" class="form-control" />
            <label class="form-label">Password</label>
            <input type="checkbox" name="" onclick="myFunction()">
            <p class="alert">Invalid Credentials..!!</p><br>
            <button class="bttn" type="submit">Submit</button>
        </div>
    </form>
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="home/js/script.js"></script>
</body>
</html>
@endsection