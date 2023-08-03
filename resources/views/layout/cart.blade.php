@extends('layout.header')

@section('contents')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


<meta name="csrf-token" content="{{ csrf_token() }}">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('ms'))
    <div class="alert alert-danger alert-dismissible ">
        {{session('ms')}}
    </div>
@endif
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{route('main')}}"><i class="fa fa-home"></i> Home</a>
                    <span>Cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Section Begin -->

<!-- ****** Cart Area Start ****** -->
<form action="{{route('test')}}" method='POST'>
    @csrf
    <input type="hidden" id="updatetotalhidden" name='updatetotalhidden'>
    <input type="hidden" id="totalhidden" name='totalhidden'>
    <input type="hidden" id="shippinghidden" name="shippinghidden">
    <div class="cart_area section_padding_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table clearfix">
                        <table class="table table-responsive">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($productData))
                                @foreach($productData as $cartincart)
                                <tr>
                                    <td class="cart_product_img d-flex align-items-center">
                                        <a href="#"><img src="{{asset('/storage/'.$cartincart->photo)}}"
                                                alt="Product"></a>
                                        <h6>{{$cartincart->name}}</h6>
                                        <input type="hidden" value="{{$cartincart->id}}" name='productid[]'>
                                    </td>
                                    @if(!$cartincart->specialproduct)
                                    <td class="price"><span class='productprice'
                                            data-price='{{$cartincart->price}}'>{{'$'.$cartincart->price}}</span>
                                    </td>
                                    @else
                                    @if($cartincart->specialproduct->discountprice)
                                    <td class="price"><span class='productprice'
                                            data-price='{{$cartincart->specialproduct->discountprice}}'>{{'$'.$cartincart->specialproduct->discountprice}}</span>
                                        @else
                                    <td class="price"><span class='productprice'
                                            data-price='{{$cartincart->price}}'>{{'$'.$cartincart->price}}</span>
                                        @endif
                                        @endif
                                    <td class="qty">
                                        <div class="quantity">

                                            <span id='minus-{{$cartincart->id}}' class="qty-minus minus"
                                                onclick="var effect = document.getElementById('qty-{{$cartincart->id}}'); var qty = effect.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) effect.value--;return false;"><i
                                                    class="fa fa-minus" aria-hidden="true"></i></span>
                                            <input type="hidden" name="pricetoalter[]" class='pricetoalter'>
                                            @foreach($product_qty as $key=>$value)
                                            @if($key == $cartincart->id)
                                            <input type="number" class="qty-text qtyqty" id="qty-{{$cartincart->id}}"
                                                step="1" min="1" max="99" name="quantity[]" value='{{$value}}'>
                                            @endif
                                            @endforeach
                                            <span class="qty-plus plus"
                                                onclick="var effect = document.getElementById('qty-{{$cartincart->id}}'); var qty = effect.value; if( !isNaN( qty )) effect.value++;return false;"><i
                                                    class="fa fa-plus" aria-hidden="true"></i></span>
                                        </div>
                                    </td>
                                    @if(isset($pricesent))
                                    @foreach($pricesent as $key=>$value)
                                    @if($key==$cartincart->id)
                                    <td class="total_price"><span class='pricing'>{{'$'.$value}}</span>
                                    </td>
                                    @endif
                                    @endforeach
                                    @endif
                                </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>

                    <div class="cart-footer d-flex mt-30">
                        <div class="back-to-shop w-50">
                            <a href="{{route('shop')}}">Continue shooping</a>
                        </div>
                        <div class="update-checkout w-50 text-right">


                        </div>
                    </div>

                </div>
            </div>

            <div class="row">

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="shipping-method-area mt-70">
                        <div class="cart-page-heading">
                            <h5>Shipping method</h5>
                            <p>Select the one you want</p>
                        </div>

                        <div class="custom-control custom-radio mb-30">
                            <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input click"
                                value="4.99">
                            <label class="custom-control-label d-flex align-items-center justify-content-between"
                                for="customRadio1"><span class="nextday">Next day
                                    delivery</span><span>$4.99</span></label>
                        </div>

                        <div class="custom-control custom-radio mb-30">
                            <input type="radio" id="customRadio2" name="customRadio" class="custom-control-input click"
                                value="1.99">
                            <label class="custom-control-label d-flex align-items-center justify-content-between"
                                for="customRadio2"><span class="standard">Standard
                                    delivery</span><span>$1.99</span></label>
                        </div>

                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadio3" name="customRadio" class="custom-control-input click"
                                value="0">
                            <label class="custom-control-label d-flex align-items-center justify-content-between"
                                for="customRadio3"><span>Personal Pickup</span><span>Free</span></label>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-lg-4">
                    <div class="cart-total-area mt-70">
                        <div class="cart-page-heading">
                            <h5>Cart total</h5>
                            <p>Final info</p>
                        </div>

                        <ul class="cart-total-chart">
                            <li><span>Subtotal</span> <span class='subtotal' id='subtotal'></span></li>
                            <li><span>Shipping</span> <span id='show'></span></li>
                            <li><span><strong>Total</strong></span> <span id="total"><strong></strong></span></li>
                        </ul>
                        <div class="but" style="display:flex;">
                            <button type='submit' class='btn' style="background:#dc1e3a;margin:2em!important;">Update cart</button>
</form>
<form action="{{route('clearevery')}}" method='post'>
    @csrf
    <button type='submit' value='{{Auth::user()->id}}' name='od' class='btn' style="background:#dc1e3a; margin:2em 0!important;">clear
        cart</button>
    </div>
</form>
<a href="{{route('checkout')}}" class="btn karl-checkout-btn" id="gotoorder">Proceed to checkout</a>
</div>
</div>
</div>
</div>
</div>
<!-- ****** Cart Area End ****** -->


<!-- <button type='submit' id="gotoorder">Proceed to checkout</button> -->

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

<script>
$(document).ready(function() {
    $('#subtotal').on('change', function() {
        alert('fdsf');
    });
});
</script>
<script>
$(document).ready(function() {

    $('.minus,.plus').click(function() {
        var self = this;
        var productprice = $(this).closest('tr').find('.productprice').data("price");
        var quantity = $(this).closest('tr').find('.qtyqty').val();
        // alert(productprice+quantity);
        $.ajax({
            url: '/incDecprice',
            data: {
                'productprice': productprice,
                'quantity': quantity,
            },
            success: function(data) {
                $(self).closest('tr').find('.pricing').text('$' + data);
                $(self).closest('tr').find('.pricetoalter').val(data);

                // let shipping=document.getElementById('show');
                // let subtotal=parseFloat(data);
                // shipping=document.getElementById('show').textContent;
                // shipping=parseFloat(shipping.replace("$",""));
                // let total=document.getElementById('total');
                // let total1=subtotal+shipping;
                // let stringtotal=total1.toString();
                // total.textContent="$"+stringtotal;
                // let totalhidden=document.getElementById('totalhidden');
                // totalhidden.value=total.textContent;
            }
        });
    });
});

// $(document).ready(function() {
//     $('.minus').click(function() {
//         var productprice = $('.productprice').data('price');
//         var qty = $('.qtyqty').val();
//         $.ajax({
//             url: '/incDecprice',
//             data: {
//                 'productprice': productprice,
//                 'quantity': qty
//             },
//             success: function(data) {
//                 $('.clearfix').find('.changingprice').text("$"+data);
//             }
//         });
//     });
//     $('.plus').click(function() {
//         var productprice = $('.productprice').data('price');
//         var qty = $('.qtyqty').val();
//         $.ajax({
//             url: '/incDecprice',
//             data: {
//                 'productprice': productprice,
//                 'quantity': qty
//             },
//             success: function(data) {
//                 $('.clearfix').find('.changingprice').text("$"+data);
//             }
//         });
//     });
// });
</script>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script>
var subtotalobserver = new MutationObserver(function(mutations) {
    var tot = document.getElementById("total");
    var shipp = document.getElementById("show").textContent;
    var shippp = parseFloat(shipp.replace("$", ""));
    var sub = document.getElementById("subtotal").textContent;
    var subb = parseFloat(sub.replace("$", ""));
    var totaling = subb + shippp;
    var totalhidden = document.getElementById("totalhidden");
    totalhidden.value = totaling;
    totaling = "" + totaling;
    tot.textContent = "$" + totaling;
    // subtotal1=parseFloat(subtotal1.replace("$",""));
    // shipp=parseFloat(shipp.replace("$",""));
    // alert(subtotal1);
    // alert(shipp);
});

var subtotal1 = document.getElementById('subtotal');
subtotalobserver.observe(subtotal1, {
    childList: true,
    subtree: true,
    characterData: true
});
</script>

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
<script src="{{asset('home/js/cart.js')}}"></script>
@if(Session::has('msg'))
<script>
toastr.success("Cart has been Cleared Successfully!");
</script>
@endif
@if(Session::has('update'))
<script>
    toastr.success("Cart has been Updated Successfully!");
</script>
@endif
@endsection