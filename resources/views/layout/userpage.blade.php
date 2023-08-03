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
                        <span>User Information Page</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->
        
    <div class="container">
        <div class="row g-3">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card" style="box-shadow: 5px 5px 5px 5px lightgray">
                    <img src="img/products/change your pass.jpg" class="card-img-top" alt="A Street in Europe">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;font-weight: bold;">Change Your Password</h5>
                        <p class="card-text" style="text-align: center;">You can change your password from here.</p>
                        <a href="{{route('user-info')}}" class="btn btn-danger">Change</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card" style="box-shadow: 5px 5px 5px 5px lightgray">
                    <img src="img/products/orders.jpg" class="card-img-top" alt="London">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;font-weight: bold;">Your Orders</h5>
                        <p class="card-text" style="text-align: center;">See what you have ordered till now.</p>
                        <a href="#" class="btn btn-danger">Orders</a>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card" style="box-shadow: 5px 5px 5px 5px lightgray">
                    <img src="img/products/Track-your-order.jpg" class="card-img-top" alt="New York">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align: center;font-weight: bold;">Delivery Status</h5>
                        <p class="card-text" style="text-align: center;">Track your products to be delivered.</p>
                        <a href="{{route('track')}}" class="btn btn-danger">Status</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
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