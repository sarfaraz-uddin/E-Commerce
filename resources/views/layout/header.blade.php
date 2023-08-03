<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />


    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha/css/bootstrap.css"
        rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">


    <!-- Favicon  -->
    <link rel="icon" href="{{asset('img/core-img/favicon.ico')}}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{asset('home/css/core-style.css')}}">

    <!-- Responsive CSS -->
    <link href="{{asset('home/css/responsive.css')}}" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="{{asset('home/css/bootstrap.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/font-awesome.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/themify-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/themify-icon.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/elegant-icons.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/owl.carousel.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/nice-select.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/jquery-ui.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/slicknav.min.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/ribbon.css')}}">
    <style>
    /* #search-results {
        border: 1px solid black;
        padding: 100px;
    } */
    .searches {
        cursor: pointer;
    }

    .select-items th {
        font-size: 14px !important;
    }
    <style>
    table table th {
        height: 50px;
    }
</style>
    </style>
    @vite(['resources/js/app.js'])
</head>
<body>

    <header class="header-section">
        <div class="header-top">
            <div class="container">

                <div class="ht-right">
                    @guest
                    <a href="{{route('login')}}" class="login-panel"><i
                            class="fa-sharp fa-solid fa-right-to-bracket"></i>Login</a>
                    <a href="{{route('signup')}}" class="login-panel"><i class="fa fa-user"></i>Register</a>
                    @endguest
                    @auth
                    <a href="{{route('logout')}}" class="login-panel"><i
                            class="fa-sharp fa-solid fa-right-to-bracket"></i>Logout</a>

                    <a href="{{route('aboutuser')}}" class='login-panel '><i
                            class="fa fa-user"></i>{{Auth::user()->username}}

                    </a>
                    @endauth
                    <div class="top-social">
                        <a href="#"><i class="ti-facebook"></i></a>
                        <a href="#"><i class="ti-twitter-alt"></i></a>
                        <a href="#"><i class="ti-linkedin"></i></a>
                        <a href="#"><i class="ti-pinterest"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="inner-header">
                <div class="row">
                    <div class="col-lg-2 col-md-2">
                        <div class="logo">
                            <a href="./index.html">
                                <img src="img/products/ask logo.jpg" alt="">
                                <span>A S K BLAZE</span>
                            </a>
                            <!-- <span>ASK BLAZE</span> -->
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-7">
                        <div class="advanced-search">
                            <button type="button" class="category-btn">All Categories</button>
                            <div class="input-group">
                                <input type="text" placeholder="What do you need?" class="search">
                                <div id="search-results"></div>
                                <button type="button"><i class="ti-search"></i></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 text-right col-md-3">
                        <ul class="nav-right">
                            <!-- <li class="heart-icon">
                                <a href="#">
                                    <i class="icon_heart_alt"></i>
                                    <span>1</span>
                                </a>
                            </li> -->
                            <li class="cart-icon">
                                <a href="{{route('cart')}}">
                                    <i class="icon_bag_alt"></i>
                                    <span>@if(isset($count)){{$count}}@endif</span>
                                </a>
                                <div class="cart-hover">
                                    <div class="select-items">
                                        <table>
                                            <thead>
                                                    <th>Image</th>
                                                    <th>Quantity</th>
                                                    <th>Total Price</th>
                                            </thead>
                                            @if(isset($ca))
                                            @foreach($ca as $cart)
                                            <tr>
                                                <td class="si-text">
                                                    <div class="product-selected">
                                                        @if($cart->userid == Auth::id())
                                                        @php
                                                        $cartItems = json_decode($cart->product_ids, true);
                                                        foreach($cartItems as $c){
                                                        foreach($productData as $pc){
                                                        if($c['productid']==$pc->id){
                                                        echo '<div class="product-item" style="display:flex;">';
                                                            echo '<img src="'.asset('/storage/'.$pc->photo).'" alt=""
                                                                width="80vw" height="40vh"
                                                                style="margin-right: 40px;">';
                                                            }
                                                            }
                                                            echo "<p style='margin-right:40px;'>X" . $c['qty']
                                                                ."&nbsp;&nbsp;". $c['price'] . "</p>";
                                                            echo '</div>';
                                                        } @endphp
                                                        @endif

                                                    </div>
                                                </td>

                                            </tr>
                                            @endforeach
                                            @endif

                                        </table>
                                    </div>
                                    <div class="select-total">
                                        <span>total:</span>
                                        @if(isset($ca))
                                        @foreach($ca as $ca)
                                        @if(Auth::id()==$ca->userid)
                                        <h5>{{"$".$ca->subtotal}}</h5>
                                        @endif
                                        @endforeach
                                        @endif
                                    </div>
                                    <div class="select-button">
                                        <a href="{{route('cart')}}" class="primary-btn view-card">VIEW CART</a>
                                        <a href="{{route('checkout')}}" class="primary-btn checkout-btn">CHECK OUT</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="nav-item">
            <div class="container">
                <div class="nav-depart">
                    <div class="depart-btn">
                        <i class="ti-menu"></i>
                        <span>All departments</span>
                        <ul class="depart-hover">
                            @if(isset($departments))
                            @foreach($departments as $departmentschoose)
                            <li style="color:black; padding:0.1em; margin-left:0.5em;" class='deptgo'
                                value='{{$departmentschoose->id}}'>
                                {{$departmentschoose->departmentName}}</li>
                            @endforeach
                            @endif

                        </ul>
                    </div>
                </div>
                <nav class="nav-menu mobile-menu">
                    <ul>
                        <li class="{{Request::is('/')?'active':''}}"><a href="{{route('main')}}">Home</a></li>
                        <li class="{{Request::is('shop*')?'active':''}}"><a href="{{route('shop')}}">Shop</a></li>
                        <li><a href="#">Collection</a>
                            <ul class="dropdown">
                                <li><a href="#">Men's</a></li>
                                <li><a href="#">Women's</a></li>
                                <li><a href="#">Kid's</a></li>
                            </ul>
                        </li>
                        <li class="{{Request::is('blog*')?'active':''}}"><a href="{{route('blog')}}">Blog</a></li>
                        <li class="{{Request::is('contact*')?'active':''}}"><a href="{{route('contact')}}">Contact</a>
                        </li>
                        <li class="{{Request::is('pages*')?'active':''}}"><a href="#">Pages</a>
                            <ul class="dropdown">
                                <li><a href="./blog-details.html">Blog Details</a></li>
                                <li><a href="{{route('cart')}}">Shopping Cart</a></li>
                                <li><a href="{{route('checkout')}}">Checkout</a></li>
                                <li><a href="./faq.html">Faq</a></li>
                                <li><a href="{{route('signup')}}">Register</a></li>
                                <li><a href="{{route('login')}}">Login</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <div id="mobile-menu-wrap"></div>
            </div>
        </div>
    </header>
    <!-- header end -->

    <!-- Js Plugins -->
    <script></script>


    <script src="{{asset('home/js/jquery/jquery-2.2.4.min.js')}}"></script>
    <!-- Popper js -->
    <script src="{{asset('home/js/popper.min.js')}}"></script>
    <!-- Bootstrap js -->
    <script src="{{asset('home/js/bootstrap.min.js')}}"></script>
    <!-- Plugins js -->
    <script src="{{asset('home/js/plugins.js')}}"></script>
    <!-- Active js -->
    <script src="{{asset('home/js/active.js')}}"></script>
    <!-- Js Plugins -->
    <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
    <script src="{{asset('home/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('home/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('home/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.dd.min.js')}}"></script>
    <script src="{{asset('home/js/jquery.slicknav.js')}}"></script>
    <script src="{{asset('home/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('home/js/main.js')}}"></script>
    <script src="{{asset('home/js/header.js')}}"></script>
    @yield('contents')
</body>
</html>