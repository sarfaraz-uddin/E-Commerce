<link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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

<div class="product-slider owl-carousel"> @forelse($goods as $n)
    <div class="single_gallery_item wow fadeInUpBig" data-wow-delay="0.4s">
        <!-- Product Image -->
        <div class="product-img">
            <img src="{{asset('/storage/'.$n->photo)}}" alt="">
            <div class="product-quicview">
                <a href="#" data-toggle="modal" data-target="#quickview"><i class="ti-plus"></i></a>
            </div>
        </div>
        <!-- Product Description -->
        <div class="product-description">
            <h4 class="product-price">{{$n->price}}</h4>
            <p>{{$n->name}}</p>
            <!-- Add to Cart -->
            <a href="#" class="add-to-cart-btn">ADD TO CART</a>
        </div>
    </div>
    @empty
        <p>Oops!Look like no such items here.</p>
        <a href="#" class='add-to-cart-btn'>Check In shop</a>
    @endforelse
</div>

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