@extends('layout.header')

@section('contents')
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Fashi Template">
    <meta name="keywords" content="Fashi, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fashi | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="home/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="home/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="home/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="home/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/style.css" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <a href="{{route('main')}}"><i class="fa fa-home"></i> Home</a>
                        <span>Change Password</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
<div class="container">
    @if (session()->has('error'))
        <div class="alert alert-danger" role="alert">
       {{session()->get('error')}}
        </div>
    @endif 
    @if (session()->has('success'))
       <div class="alert alert-success" role="alert">
       {{session()->get('success')}}
        </div>
    @endif 
    <form action="{{route('changepass')}}" method="post">
        @csrf
        <label for="email" class="form-label">Email:</label>
        <input type="text" name="email" id="email" class="form-control" required="required">
        @if($errors->any('email'))
            <span class="text-danger">{{$errors->first('email')}}</span>
        @endif
        <label for="password"> Enter Old password:</label>
        <input type="text" name="oldpassword" id="oldpassword" class="form-control" required="required">
        @if($errors->any('oldpassword'))
            <span class="text-danger">{{$errors->first('oldpassword')}}</span>
        @endif 
        <label for="newpassword">Enter New Password:</label>
        <input type="password" name="newpassword" id="newpassword" class="form-control" required="required">
        @if($errors->any('newpassword'))
            <span class="text-danger">{{$errors->first('newpassword')}}</span>
        @endif 
        <label for="newpassword">Re-type password</label>
        <input type="password" name="retypepassword" id="retypepassword" class="form-control" required="required">
        @if($errors->any('retypepassword'))
            <span class="text-danger">{{$errors->first('retypepassword')}}</span>
        @endif
        <button type='submit' class="karl-checkout-btn">Change Password</button>
    </form>
</div>

    
    <script src='//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <!-- Js Plugins -->
    <script src="home/js/jquery/jquery-2.2.4.min.js"></script>
    <!-- Popper js -->
    <script src="home/js/popper.min.js"></script>
    <!-- Bootstrap js -->
    <script src="home/js/bootstrap.min.js"></script>
    <!-- Plugins js -->
    <script src="home/js/plugins.js"></script>
    <!-- Active js -->
    <script src="home/js/active.js"></script>
    <script src="home/js/jquery-3.3.1.min.js"></script>
    <script src="home/js/bootstrap.min.js"></script>
    <script src="home/js/jquery-ui.min.js"></script>
    <script src="home/js/jquery.countdown.min.js"></script>
    <script src="home/js/jquery.nice-select.min.js"></script>
    <script src="home/js/jquery.zoom.min.js"></script>
    <script src="home/js/jquery.dd.min.js"></script>
    <script src="home/js/jquery.slicknav.js"></script>
    <script src="home/js/owl.carousel.min.js"></script>
    <script src="home/js/main.js"></script>
</body>
</html>
@endsection