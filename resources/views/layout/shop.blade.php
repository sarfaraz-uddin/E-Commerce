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
                        <span>Shop</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad shop_grid_area section_padding_100">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-4 col-lg-3  produts-sidebar-filter">
                    <div class="filter-widget">
                        <h4 class="fw-title">Categories</h4>
                        <ul class="filter-catagories">
                            <select name="category" id="category" class='category'>
                                <option value="">Select Category</option>
                                @foreach($uniqueCategory as $shop)
                                <option value="{{$shop->id}}">{{$shop->categories}}</option>
                                @endforeach
                            </select>
                        </ul>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Brand</h4>
                        <div class="fw-brand-check">
                            @foreach($brands as $brandfilter)
                            <div class="bc-item">
                                <div class="form-check">
                                    <input class="brand form-check-input" type="checkbox" value="{{$brandfilter->id}}"
                                        id="brand">
                                    <label class="form-check-label" for="flexCheckDefault">
                                        {{$brandfilter->brandName}}
                                    </label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Price</h4>
                        <div class="filter-range-wrap">
                            <div class="range-slider">
                                <div class="price-input">
                                    <input type="text" id="minamount" class='minamount'>
                                    <input type="text" id="maxamount" class='maxamount'>
                                </div>
                            </div>
                            <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                data-min="33" data-max="98">
                                <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                            </div>
                        </div>
                        <a href="#" class="filter-btn" id='filter'>Filter</a>
                    </div>
                    <div class="filter-widget">
                        <h4 class="fw-title">Tags</h4>
                        <div class="fw-tags">
                            <a href="#">Towel</a>
                            <a href="#">Shoes</a>
                            <a href="#">Coat</a>
                            <a href="#">Dresses</a>
                            <a href="#">Trousers</a>
                            <a href="#">Men's hats</a>
                            <a href="#">Backpack</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-8 col-lg-9">
                    <div class="shop_grid_product_area">
                        <div id="productData">
                            <div class="row">
                                @foreach($products as $products)
                                <div class="product-card">
                                    @if($products->specialproduct)
                                    <!-- Single gallery Item -->

                                    <div class="badge">{{$products->specialproduct->discountoffer."% OFF"}}</div>
                                    <div class="product-tumb">
                                        <img src="{{asset('/storage/'.$products->photo)}}" alt=""
                                            style="width:100%; height:100%;">
                                    </div>
                                    <div class="product-details">
                                        <span class="product-catagory">{{$products->brand->brandName}}</span>
                                        <h4><a href="">{{$products->name}}</a></h4>
                                        @if($products->description==null)
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus
                                            nostrum!</p>
                                        @else
                                        <p>{{$products->description}}</p>
                                        @endif
                                        <div class="product-bottom-details">
                                            <div class="product-price">
                                                <small>{{"$".$products->price}}</small>{{"$".$products->specialproduct->discountprice}}
                                            </div>
                                            <div class="product-links">
                                                <a href=""><i class="fa fa-heart"></i></a>
                                                <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                                                <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                                                    @csrf
                                                    <input type="hidden"
                                                        value='{{$products->specialproduct->discountprice}}'
                                                        name='price'>
                                                    <input type="hidden" value="{{Auth::id()}}" name='id'>
                                                    @if (session()->has('message') &&
                                                    session()->get('productId')===$singlegallery->id)
                                                    <div class="floating-message">
                                                        {{ session()->get('message')}}
                                                    </div>
                                                    @endif
                                                    <a href=""><button type='submit' data-id="{{$products->id}}"
                                                            value='{{$products->id}}' name='productId'
                                                            data-user-id="{{Auth::id()}}"><i
                                                                class="fa fa-shopping-cart"></i></button></a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @elseif($l = $latestproducts->firstWhere('id', $products->id))
                                    <div class="badge">{{"Latest"}}</div>
                                    <div class="product-tumb">
                                        <img src="{{asset('/storage/'.$products->photo)}}" alt=""
                                            style="width:100%; height:100%;">
                                    </div>
                                    <div class="product-details">
                                        <span class="product-catagory">{{$products->brand->brandName}}</span>
                                        <h4><a href="">{{$products->name}}</a></h4>
                                        @if($products->description==null)
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus
                                            nostrum!</p>
                                        @else
                                        <p>{{$products->description}}</p>
                                        @endif
                                        <div class="product-bottom-details">
                                            <div class="product-price">{{"$".$products->price}}</div>
                                            <div class="product-links">
                                                <a href=""><i class="fa fa-heart"></i></a>
                                                <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                                                <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                                                    @csrf
                                                    <input type="hidden" value='{{$products->price}}' name='price'>
                                                    <input type="hidden" value="{{Auth::id()}}" name='id'>
                                                    @if (session()->has('message') &&
                                                    session()->get('productId')===$singlegallery->id)
                                                    <div class="floating-message">
                                                        {{ session()->get('message')}}
                                                    </div>
                                                    @endif
                                                    <a href=""><button type='submit' data-id="{{$products->id}}"
                                                            value='{{$products->id}}' name='productId'
                                                            data-user-id="{{Auth::id()}}"><i
                                                                class="fa fa-shopping-cart"></i></button></a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                    @else
                                    <div class="product-tumb">
                                        <img src="{{asset('/storage/'.$products->photo)}}" alt=""
                                            style="width:100%; height:100%;">
                                    </div>
                                    <div class="product-details">
                                        <span class="product-catagory">{{$products->brand->brandName}}</span>
                                        <h4><a href="">{{$products->name}}</a></h4>
                                        @if($products->description==null)
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus
                                            nostrum!</p>
                                        @else
                                        <p>{{$products->description}}</p>
                                        @endif
                                        <div class="product-bottom-details">
                                            <div class="product-price">{{"$".$products->price}}</div>
                                            <div class="product-links">
                                                <a href=""><i class="fa fa-heart"></i></a>
                                                <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                                                <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                                                    @csrf
                                                    <input type="hidden" value='{{$products->price}}' name='price'>
                                                    <input type="hidden" value="{{Auth::id()}}" name='id'>
                                                    @if (session()->has('message') &&
                                                    session()->get('productId')===$singlegallery->id)
                                                    <div class="floating-message">
                                                        {{ session()->get('message')}}
                                                    </div>
                                                    @endif
                                                    <a href=""><button type='submit' data-id="{{$products->id}}"
                                                            value='{{$products->id}}' name='productId'
                                                            data-user-id="{{Auth::id()}}"><i
                                                                class="fa fa-shopping-cart"></i></button></a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="loading-more">
                        <i class="icon_loading"></i>
                        <a href="#">
                            Loading More
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->
    <!-- quick view model start -->
    <div class="modal fade" id="quickview" tabindex="-1" role="dialog" aria-labelledby="quickview" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close btn" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-body">
                    <div class="quickview_body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="quickview_pro_img" style="margin-top: 1.5rem">
                                        <img class='product-img' src="" alt="">
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
                                        <h4><strong>Price:</strong> <span class="product-price"></span></h4>
                                        <!-- <h5 class="price"><span class='product-price'></span></h5> -->
                                        <p class="des">this is good product</p>
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
                                    </div>

                                    <div class="share_wf mt-15">
                                        <p><strong>Share With Friend</strong></p>
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
    <!-- Product Shop Section End -->

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
                            <li>Email: askblaze12@gmail.com</li>
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


    <script>
    $(document).ready(function() {
        $("#category").on('change', function() {
            var category = $(this).val();
            $.ajax({
                type: 'GET',
                dataType: 'html',
                url: '{{url('/data')}}',
                data: {
                    'category': category
                },
                success: function(data) {
                    $("#productData").html(data);
                }
            });
        });
        var globalBrands = [];
        $('#filter').click(function() {
            var minamount = $('.minamount').val();
            var maxamount = $('.maxamount').val();
            var category = $('.category').val();

            alert(minamount + maxamount + category);
            $.ajax({
                type: 'GET',
                dataType: 'html',
                url: '/priceFilter',
                data: {
                    'minamount': minamount,
                    'maxamount': maxamount,
                    'category': category,
                    'globalBrands': globalBrands
                },
                success: function(data) {
                    $("#productData").html(data);
                    console.log(data);
                }
            });
        });
        $('.brand').change(function() {
            var category = $('.category').val();
            var brands = [];
            $('.brand:checked').each(function() {
                brands.push(this.value);
            });
            globalBrands = brands;
            alert(brands + category);
            $.ajax({
                type: 'GET',
                dataType: 'html',
                url: '/boxFilter',
                data: {
                    'brands': brands,
                    'category': category
                },
                success: function(data) {
                    $("#productData").html(data);
                }
            });
        });
        $('.productdatamodal').click(function() {
            var productid = $(this).data('id');
            $.ajax({
                url: '/get-product/' + productid,
                type: 'GET',
                success: function(data) {
                    $('#quickview').find('.product-name').text(data.name);
                    $('#quickview').find('.product-price').text(data.price);
                    $('#quickview').find('.product-img').attr('src', data.photo);
                }
            });
        });
    });
    </script>
    <script src="{{asset('home/js/department.js')}}"></script>
</body>

</html>

@endsection