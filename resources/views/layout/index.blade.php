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
    <title>A.S.K Ecommerce</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
        integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Css Styles -->
    <link rel="stylesheet" href="home/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/quickview.css" type="text/css">
    <link rel="stylesheet" href="home/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/themify-icons.css" type="text/css">
    <link rel="stylesheet" href="home/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="home/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="home/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="home/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="{{asset('home/css/ribbon.css')}}">
    <link rel="stylesheet" href="home/css/style.css" type="text/css">
    <style>
    .product-cards-container {
        display: flex;
        flex-wrap: wrap;
    }
    #toast-container > .toast-success {
    background-color: #28a745 !important;
    }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.1/moment.min.js"></script>


</head>

<body>

    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hero-items owl-carousel">
            @foreach($bigposter as $bigposter)
            <div class="single-hero-items set-bg" data-setbg="{{asset('/storage/'.$bigposter->bigposterimg)}}">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>{{$bigposter->for}}</span>
                            <h1>{{$bigposter->offer}}</h1>
                            <p>{{$bigposter->description}}</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                            <!-- <div class="off-card">
                                <h2>Sale <span>{{$bigposter->offerprice}}</span></h2>
                            </div> -->
                            <!-- <button type="submit" class="primary-btn">Shop Now</button> -->
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- <div class="single-hero-items set-bg" data-setbg="img/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <span>Bag,kids</span>
                            <h1>Black friday</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut labore et dolore</p>
                            <a href="#" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    <div class="off-card">
                        <h2>Sale <span>50%</span></h2>
                    </div>
                </div>
            </div> -->
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Banner Section Begin -->
    <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
                @if(isset($departments))
                @foreach($departments->slice(0,3) as $banner)
                <div class="col-lg-4">
                    <div class="single-banner">
                        <img src="{{asset('/storage/'.$banner->departmentImage)}}" alt="">
                        <div class="inner-text">
                            <h4 class='clickit' data-value='{{$banner->id}}'>
                                {{$banner->departmentName}}</h4>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <!-- Banner Section End -->


    <div class="filter-control">
        <h2>Products</h2>
    </div>
    <div class="product-cards-container">
        @foreach($products as $pf)
        <div class="product-card">
            @if($pf->specialproduct)
            <div class="badge">{{$pf->specialproduct->discountoffer."% OFF"}}</div>
            <div class="product-tumb">
                <img src="{{asset('/storage/'.$pf->photo)}}" alt="" style="width:100%; height:100%;">
            </div>
            <div class="product-details">
                <span class="product-catagory">{{$pf->brand->brandName}}</span>
                <h4><a href="">{{$pf->name}}</a></h4>
                @if($pf->description==null)
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                @else
                <p>{{$pf->description}}</p>
                @endif
                <div class="product-bottom-details">
                    <div class="product-price">
                        <small>{{"$".$pf->price}}</small>{{"$".$pf->specialproduct->discountprice}}</div>
                    <div class="product-links">
                        <a href=""><i class="fa fa-heart"></i></a>
                        <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                        <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                            @csrf
                            <input type="hidden" value='{{$pf->specialproduct->discountprice}}' name='price'>
                            <input type="hidden" value="{{Auth::id()}}" name='id'>
                            @if (session()->has('message') &&
                            session()->get('productId')===$singlegallery->id)
                            <div class="floating-message">
                                {{ session()->get('message')}}
                            </div>
                            @endif
                            <a href=""><button type='submit' data-id="{{$pf->id}}" value='{{$pf->id}}' name='productId'
                                    data-user-id="{{Auth::id()}}"><i class="fa fa-shopping-cart"></i></button></a>
                        </form>
                    </div>
                </div>
            </div>
            @elseif($l = $latestproducts->firstWhere('id', $pf->id))
            <div class="badge">{{"Latest"}}</div>
            <div class="product-tumb">
                <img src="{{asset('/storage/'.$pf->photo)}}" alt="" style="width:100%; height:100%;">
            </div>
            <div class="product-details">
                <span class="product-catagory">{{$pf->brand->brandName}}</span>
                <h4><a href="">{{$pf->name}}</a></h4>
                @if($pf->description==null)
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                @else
                <p>{{$pf->description}}</p>
                @endif
                <div class="product-bottom-details">
                    <div class="product-price">{{"$".$pf->price}}</div>
                    <div class="product-links">
                        <a href=""><i class="fa fa-heart"></i></a>
                        <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                        <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                            @csrf
                            <input type="hidden" value='{{$pf->price}}' name='price'>
                            <input type="hidden" value="{{Auth::id()}}" name='id'>
                            @if (session()->has('message') &&
                            session()->get('productId')===$singlegallery->id)
                            <div class="floating-message">
                                {{ session()->get('message')}}
                            </div>
                            @endif
                            <a href=""><button type='submit' data-id="{{$pf->id}}" value='{{$pf->id}}' name='productId'
                                    data-user-id="{{Auth::id()}}"><i class="fa fa-shopping-cart"></i></button></a>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="product-tumb">
                <img src="{{asset('/storage/'.$pf->photo)}}" alt="" style="width:100%; height:100%;">
            </div>
            <div class="product-details">
                <span class="product-catagory">{{$pf->brand->brandName}}</span>
                <h4><a href="">{{$pf->name}}</a></h4>
                @if($pf->description==null)
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                @else
                <p>{{$pf->description}}</p>
                @endif
                <div class="product-bottom-details">
                    <div class="product-price">{{"$".$pf->price}}</div>
                    <div class="product-links">
                        <a href=""><i class="fa fa-heart"></i></a>
                        <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                        <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                            @csrf
                            <input type="hidden" value='{{$pf->price}}' name='price'>
                            <input type="hidden" value="{{Auth::id()}}" name='id'>
                            @if (session()->has('message') &&
                            session()->get('productId')===$singlegallery->id)
                            <div class="floating-message">
                                {{ session()->get('message')}}
                            </div>
                            @endif
                            <a href=""><button type='submit' data-id="{{$pf->id}}" value='{{$pf->id}}' name='productId'
                                    data-user-id="{{Auth::id()}}"><i class="fa fa-shopping-cart"></i></button></a>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @endforeach
    </div>



    <div class="filter-control">
        <h2>Special Products</h2>
    </div>
    <div class="product-cards-container">
        @foreach($products as $pf)
        @if($pf->specialproduct)
        <div class="product-card">
            <div class="badge">{{$pf->specialproduct->discountoffer."% OFF"}}</div>
            <div class="product-tumb">
                <img src="{{asset('/storage/'.$pf->photo)}}" alt="" style="width:100%; height:100%;">
            </div>
            <div class="product-details">
                <span class="product-catagory">{{$pf->brand->brandName}}</span>
                <h4><a href="">{{$pf->name}}</a></h4>
                @if($pf->description==null)
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                @else
                <p>{{$pf->description}}</p>
                @endif
                <div class="product-bottom-details">
                    <div class="product-price">
                        <small>{{"$".$pf->price}}</small>{{"$".$pf->specialproduct->discountprice}}</div>
                    <div class="product-links">
                        <a href=""><i class="fa fa-heart"></i></a>
                        <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                        <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                            @csrf
                            <input type="hidden" value='{{$pf->specialproduct->discountprice}}' name='price'>
                            <input type="hidden" value="{{Auth::id()}}" name='id'>
                            @if (session()->has('message') &&
                            session()->get('productId')===$singlegallery->id)
                            <div class="floating-message">
                                {{ session()->get('message')}}
                            </div>
                            @endif
                            <a href=""><button type='submit' data-id="{{$pf->id}}" value='{{$pf->id}}' name='productId'
                                    data-user-id="{{Auth::id()}}"><i class="fa fa-shopping-cart"></i></button></a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>




    <!-- Women Banner Section Begin -->
    <!-- <section class="women-banner spad">
        <div class="container-fluid">
            <div class="row"> -->
    <!-- <div class="col-lg-3">
                    <div class="product-large set-bg" data-setbg="img/products/sale.jpg"> -->
    <!-- <h2>Sale! Sale!</h2> -->
    <!-- <a href="#">Discover More</a>
                    </div>
                </div> -->
    <!-- <div class="col-lg-12">
                    <div class="filter-control">

                        <h2>Special Offers</h2>
                    </div>
                    <div class="product-slider owl-carousel"> -->

    <!-- Single gallery Item -->
    <!-- @if(isset($specialproduct))
                        @foreach($specialproduct as $singlegallery)
                        <div class="single_gallery_item wow fadeInUpBig" data-wow-delay="0.5s">
                            <div class="ribbon ribbon-top-left">
                                <span>{{$singlegallery->discountoffer."% off"}}</span>
                            </div> -->
    <!-- Product Image -->
    <!-- <div class="product-img">
                                <img src="{{asset('/storage/'.$singlegallery->product->photo)}}" alt=""
                                    style="min-width:100%">
                                <div class="product-quicview">
                                    <a href="#" data-toggle="modal" data-target="#quickview"
                                        data-id="{{ $singlegallery->product->id}}" id="productModalLink"
                                        class='productModalLink'><i class="ti-plus"></i></a> -->
    <!-- <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a> -->
    <!-- </div>
                            </div> -->
    <!-- Product Description -->
    <!-- <div class="product-description align">
                                @if($singlegallery->discountprice)
                                <h5 style="color:black;">{{$singlegallery->product->name}}</h5>
                                <h4 class="product-price"><strike>{{'$'.$singlegallery->product->price}}</strike>
                                </h4>
                                <h4 class="product-price">{{'$'.$singlegallery->discountprice}}</h4>
                                @else
                                <h4 class="product-price">{{'$'.$singlegallery->product->price}}</>
                                </h4>
                                <h2 style='color:red'>{{$singlegallery->description}}</h2>
                                @endif -->
    <!-- Add to Cart -->
    <!-- <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                                    @csrf
                                    @if($singlegallery->discountprice)
                                    <input type="hidden" value='{{$singlegallery->discountprice}}' name='price'>
                                    @else
                                    <input type="hidden" value='{{$singlegallery->product->price}}' name='price'>
                                    @endif
                                    <input type="hidden" value="{{Auth::id()}}" name='id'>
                                    @if (session()->has('message') &&
                                    session()->get('productId')===$singlegallery->id)
                                    <div class="floating-message">
                                        {{ session()->get('message')}}
                                    </div>
                                    @endif
                                    <button type='submit' .class="add-to-cart-btn cart_add"
                                        data-id="{{$singlegallery->product->id}}"
                                        value='{{$singlegallery->product->id}}' name='productId'
                                        data-user-id="{{Auth::id()}}">ADD TO CART</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                        @endif
                    </div>
                </div>
                <div class="product-description">
                    <a href="{{route('shop')}}"><button class="karl-checkout-btn">See More</button></a>
                </div>
            </div>
        </div> -->
    <!-- </section> -->
    <!-- Women Banner Section End -->
    <!-- quick view model start -->
    <!-- Modal content -->
    <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="false">&times;</span>
                </button>

                <div class="modal-body">
                    <div class="quickview_body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="quickview_pro_img" style="margin-top: 1.5rem">
                                        <!-- <img src="img/products/sale.jpg" alt=""> -->
                                        <img class="product-img" src="">
                                    </div>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="quickview_pro_des">
                                        <h4><strong>Name:</strong> <span class="product-name"></span></h4>
                                        <div class="top_seller_product_rating mb-15">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        <!-- <h5 class="price">$120.99 <span>$130</span></h5> -->
                                        <h4><strong>Price:</strong> <span class="product-price"></span></h4>
                                        <p class="des">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                            Mollitia
                                            expedita
                                            quibusdam aspernatur, sapiente consectetur accusantium perspiciatis
                                            praesentium eligendi, in fugiat?</p>
                                        <a href="{{route('readmore')}}"><button type="submit" class="buton">Read
                                                More</button></a>

                                        <div class="quantity mt-3">
                                            <h4><strong>Quantity:</strong></h4>
                                            <span class="qty-minus"
                                                onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                                    class="fa fa-minus" aria-hidden="true"></i></span>

                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="12"
                                                name="quantity" value="1">

                                            <span class="qty-plus"
                                                onclick="var effect = document.getElementById('qty'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i
                                                    class="fa fa-plus" aria-hidden="true"></i></span>
                                            <div class="modal_pro_cart">
                                                <a href="{{route('cart')}}" target="_blank"><i
                                                        class="fa-solid fa-cart-shopping"></i></a>
                                            </div>
                                        </div>
                                        <div class="share_wf mt-15">
                                            <p><Strong>Share With Friend</Strong></p>
                                            <div class="_icon">
                                                <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                                <a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- quick view model end -->

    <!-- Deal Of The Week Section Begin-->
    @if(isset($dealsort))
    @foreach($dealsort as $deal)
    <section class="deal-of-week set-bg spad" data-setbg="{{asset('/storage/'.$deal->dealBackgroundImage)}}">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>{{$deal->dealTitle}}</h2>
                    <p>{{$deal->dealDescription}}</p>
                    <div class="product-price">
                        ${{$deal->dealPrice}}
                        <span>/ HanBag</span>
                    </div>
                </div>
                <div class="countdown-timer">
                    <div class="cd-item">
                        <span id='days'></span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span id='hours'></span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span id='minutes'></span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span id='seconds'></span>
                        <p>Secs</p>
                    </div>
                </div>
                <a href="#" class="primary-btn">Shop Now</a>
            </div>
        </div>
    </section>
    @endforeach
    @endif
    <!-- Deal Of The Week Section End -->


    <div class="filter-control">
        <h2>Latest Products</h2>
    </div>
    <div class="product-cards-container">
        @foreach($latestproducts as $pf)
        <div class="product-card">
            @if($pf->specialproduct)
            <div class="badge">{{$pf->specialproduct->discountoffer."% OFF"}}</div>
            <div class="product-tumb">
                <img src="{{asset('/storage/'.$pf->photo)}}" alt="" style="width:100%; height:100%;">
            </div>
            <div class="product-details">
                <span class="product-catagory">{{$pf->brand->brandName}}</span>
                <h4><a href="">{{$pf->name}}</a></h4>
                @if($pf->description==null)
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                @else
                <p>{{$pf->description}}</p>
                @endif
                <div class="product-bottom-details">
                    <div class="product-price">
                        <small>{{"$".$pf->price}}</small>{{"$".$pf->specialproduct->discountprice}}</div>
                    <div class="product-links">
                        <a href=""><i class="fa fa-heart"></i></a>
                        <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                        <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                            @csrf
                            <input type="hidden" value='{{$pf->specialproduct->discountprice}}' name='price'>
                            <input type="hidden" value="{{Auth::id()}}" name='id'>
                            @if (session()->has('message') &&
                            session()->get('productId')===$singlegallery->id)
                            <div class="floating-message">
                                {{ session()->get('message')}}
                            </div>
                            @endif
                            <a href=""><button type='submit' data-id="{{$pf->id}}" value='{{$pf->id}}' name='productId'
                                    data-user-id="{{Auth::id()}}"><i class="fa fa-shopping-cart"></i></button></a>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="badge">{{"Latest"}}</div>
            <div class="product-tumb">
                <img src="{{asset('/storage/'.$pf->photo)}}" alt="" style="width:100%; height:100%;">
            </div>
            <div class="product-details">
                <span class="product-catagory">{{$pf->brand->brandName}}</span>
                <h4><a href="">{{$pf->name}}</a></h4>
                @if($pf->description==null)
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                @else
                <p>{{$pf->description}}</p>
                @endif
                <div class="product-bottom-details">
                    <div class="product-price">{{"$".$pf->price}}</div>
                    <div class="product-links">
                        <a href=""><i class="fa fa-heart"></i></a>
                        <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                        <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                            @csrf
                            <input type="hidden" value='{{$pf->price}}' name='price'>
                            <input type="hidden" value="{{Auth::id()}}" name='id'>
                            @if (session()->has('message') &&
                            session()->get('productId')===$singlegallery->id)
                            <div class="floating-message">
                                {{ session()->get('message')}}
                            </div>
                            @endif
                            <a href=""><button type='submit' data-id="{{$pf->id}}" value='{{$pf->id}}' name='productId'
                                    data-user-id="{{Auth::id()}}"><i class="fa fa-shopping-cart"></i></button></a>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
        @endforeach
    </div>


    <!-- Man Banner Section Begin -->
    <!-- <section class="man-banner spad">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="filter-control">
                        <h2>Latest Products</h2>
                    </div>
                    <div id='test'>
                        <div class="product-slider owl-carousel">
                            @foreach($latestproducts->take(3) as $normalproducts)
                            @if($normalproducts->specialproduct)
                            <div class="single_gallery_item wow fadeInUpBig" data-wow-delay="0.4s">
                                <div class="ribbon ribbon-top-left">
                                    <span>{{$normalproducts->specialproduct->discountoffer."% Offer"}}</span>
                                </div> -->
    <!-- Product Image -->
    <!-- <div class="product-img">
                                    <img src="{{asset('/storage/'.$normalproducts->photo)}}" alt=""
                                        style="min-width:100%">
                                    <div class="product-quicview"> -->
    <!-- <a href="#" data-toggle="modal" data-target="#quickview"><i
                                                class="ti-plus"></i></a> -->
    <!-- <a href="#" data-toggle="modal" data-target="#quickview"
                                            data-id="{{$normalproducts->id}}" id="productModalLink"
                                            class='productModalLink'><i class="ti-plus"></i></a>
                                    </div>
                                </div> -->
    <!-- Product Description -->
    <!-- <div class="product-description">
                                    <h4 class="product-price"><strike>{{'$'.$normalproducts->price}}</strike></h4>
                                    <h4>{{'$'.$normalproducts->specialproduct->discountprice}}</h4>
                                    <p>{{$normalproducts->name}}</p> -->
    <!-- Add to Cart -->
    <!-- <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                                        @csrf
                                        <input type="hidden" value='{{$normalproducts->specialproduct->discountprice}}'
                                            name='price'>
                                        <input type="hidden" value="{{Auth::id()}}" name='id'>
                                        @if (session()->has('message') &&
                                        session()->get('productId')===$singlegallery->id)
                                        <div class="floating-message">
                                            {{ session()->get('message')}}
                                        </div>
                                        @endif
                                        <button type='submit' class="add-to-cart-btn cart_add"
                                            data-id="{{$normalproducts->id}}" value='{{$normalproducts->id}}'
                                            name='productId' data-user-id="{{Auth::id()}}">ADD TO CART</button>
                                    </form> -->
    <!-- <a href="#" class="add-to-cart-btn">ADD TO CART</a> -->
    <!-- </div>
                            </div>
                            @else
                            <div class="single_gallery_item wow fadeInUpBig" data-wow-delay="0.4s"> -->
    <!-- Product Image -->
    <!-- <div class="product-img">
                                    <img src="{{asset('/storage/'.$normalproducts->photo)}}" alt=""
                                        style="min-width:100%;">
                                    <div class="product-quicview"> -->
    <!-- <a href="#" data-toggle="modal" data-target="#quickview"><i
                                                class="ti-plus"></i></a> -->
    <!-- <a href="#" data-toggle="modal" data-target="#quickview"
                                            data-id="{{$normalproducts->id}}" id="productModalLink"
                                            class='productModalLink'><i class="ti-plus"></i></a>
                                    </div>
                                </div> -->
    <!-- Product Description -->
    <!-- <div class="product-description">
                                    <h4 class="product-price">{{'$'.$normalproducts->price}}</h4>
                                    <p>{{$normalproducts->name}}</p> -->
    <!-- Add to Cart -->
    <!-- <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                                        @csrf
                                        <input type="hidden" value='{{$normalproducts->price}}' name='price'>
                                        <input type="hidden" value="{{Auth::id()}}" name='id'>
                                        @if (session()->has('message') &&
                                        session()->get('productId')===$singlegallery->id)
                                        <div class="floating-message">
                                            {{ session()->get('message')}}
                                        </div>
                                        @endif
                                        <button type='submit' class="add-to-cart-btn cart_add"
                                            data-id="{{$normalproducts->id}}" value='{{$normalproducts->id}}'
                                            name='productId' data-user-id="{{Auth::id()}}">ADD TO CART</button>
                                    </form> -->
    <!-- <a href="#" class="add-to-cart-btn">ADD TO CART</a> -->
    <!-- </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="product-description">
                    <a href="{{route('shop')}}"><button class="karl-checkout-btn">See More</button></a>
                </div> -->
    <!-- <div class="col-lg-3 offset-lg-1">
                    <div class="product-large set-bg m-large" data-setbg="img/products/man-large.jpg">
                        <a href="#">Discover More</a>
                    </div>
                </div> -->
    <!-- </div>
        </div>
    </section> -->
    <!-- Man Banner Section End -->
    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>From The Blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="img/latest-1.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>The Best Street Style From London Fashion Week</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="img/latest-2.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>Vogue's Ultimate Guide To Autumn/Winter 2019 Shoes</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="img/latest-3.jpg" alt="">
                        <div class="latest-text">
                            <div class="tag-list">
                                <div class="tag-item">
                                    <i class="fa fa-calendar-o"></i>
                                    May 4,2019
                                </div>
                                <div class="tag-item">
                                    <i class="fa fa-comment-o"></i>
                                    5
                                </div>
                            </div>
                            <a href="#">
                                <h4>How To Brighten Your Wardrobe With A Dash Of Lime</h4>
                            </a>
                            <p>Sed quia non numquam modi tempora indunt ut labore et dolore magnam aliquam quaerat
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="benefit-items">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Free Shipping</h6>
                                <p>For all order over 99$</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-2.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Delivery On Time</h6>
                                <p>If good have prolems</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="single-benefit">
                            <div class="sb-icon">
                                <img src="img/icon-1.png" alt="">
                            </div>
                            <div class="sb-text">
                                <h6>Secure Payment</h6>
                                <p>100% secure payment</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- latest blog end -->

    <!-- Instagram Section Begin -->
    <div class="instagram-photo">
        <div class="insta-item set-bg" data-setbg="img/insta-1.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-2.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-3.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-4.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-5.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
        <div class="insta-item set-bg" data-setbg="img/insta-6.jpg">
            <div class="inside-text">
                <i class="ti-instagram"></i>
                <h5><a href="#">colorlib_Collection</a></h5>
            </div>
        </div>
    </div>
    <!-- Instagram Section End -->
    <!-- Partner Logo Section Begin -->
    <div class="partner-logo">
        <div class="container">
            <div class="logo-carousel owl-carousel">
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-1.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-2.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-3.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-4.png" alt="">
                    </div>
                </div>
                <div class="logo-item">
                    <div class="tablecell-inner">
                        <img src="img/logo-carousel/logo-5.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Logo Section End -->


    <!-- Footer Section Begin -->
    <footer class="footer-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="footer-left">
                        <div class="footer-logo">
                            <a href="./index.html">
                                <img src="img/products/ask logo footer.png" alt="">
                                <span>A S K BLAZE</span>
                            </a>
                        </div>
                        <ul>
                            <li>Address: Kamalpokhari, Kathmandu, Nepal</li>
                            <li>Phone: +977 9823884432</li>
                            <li>Email: askblaze7860@gmail.com</li>
                        </ul>
                        <div class="footer-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 offset-lg-1">
                    <div class="footer-widget">
                        <h5>Information</h5>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Checkout</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Services</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="footer-widget">
                        <h5>My Account</h5>
                        <ul>
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Shopping Cart</a></li>
                            <li><a href="#">Shop</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="newslatter-item">
                        <h5>Join Our Newsletter Now</h5>
                        <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#" class="subscribe-form">
                            <input type="text" placeholder="Enter Your Mail">
                            <button type="button">Subscribe</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright-reserved">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright-text">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>
                            document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="payment-pic">
                            <img src="img/payment-method.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->
    <script>
    $(document).ready(function() {
        $(".normal").click(function() {
            var test = $(this).val();
            $.ajax({
                type: 'GET',
                datatype: 'html',
                url: '{{url("/abc")}}',
                data: {
                    'test': test
                },
                success: function(response) {
                    $('#test').html(response);
                }
            });
        });

    });
    $('.productModalLink').click(function() {
        var productId = $(this).data('id');
        $.ajax({
            url: '/get-product/' + productId,
            type: 'GET',
            success: function(data) {
                $('#quickview').find('.product-name').text(data.name);
                $('#quickview').find('.product-price').text(data.price);
                $('#quickview').find('.product-brand').text(data.brand);
                $('#quickview').find('.product-img').attr('src', data.photo);
            }
        });
    });
    </script>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if(Session::has('added'))
    <script>
    toastr.success("Added to Cart Successfully!");
    </script>
    @endif

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
    <!-- Js Plugins -->
    <script src="https://cdn.lordicon.com/fudrjiwc.js"></script>
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
    <script>
    var endDate = '<?php echo json_encode($endDate); ?>';
    var dateValue = '<?php echo json_encode($dateValue); ?>';
    </script>
    <script src="{{asset('home/js/department.js')}}"></script>
    <script src="{{asset('home/js/index.js')}}"></script>
    <!-- Latest Blog Section End -->



    @endsection