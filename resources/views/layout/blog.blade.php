@extends('layout.header')

@section('contents')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Blog</title>
    <link rel="stylesheet" href="home/css/blogPage.css" type="text/css">
</head>
<body>


 <div class="container">
    <div class="Intro">
        <div class="header ">
            <h1>Our Blog</h1>
            <p>Product reviews are typically written by customers who have used the product and want to share their experience with others.A product review can include details such as the product's quality, performance, usability, durability, and any issues or limitations that the reviewer encountered while using it.</p>
        </div>
    </div>
    
        <div class="row">
            <div class="card col">
                <img src="img/blog-img.jpg">
                <h4>Our Blog</h4>
                <p>Product reviews are typically written by customers who have used the product and want to share their experience with others.A product review can include details such as the product's quality, performance, usability, durability, and any issues or limitations that the reviewer encountered while using it.</p>
            </div>
            <div class="card col">
                <img src="img/blog2-img.jpg">
                <h4>About Gifts</h4>
                <p>Valentine's Day is a popular holiday that celebrates love and romance, and it's a great opportunity for e-commerce websites to offer a variety of gifts and products that cater to this occasion. Here are some ideas for Valentine's Day gifts that e-commerce websites can offer:</p>
            </div>
            <div class="card col">
                <img src="img/blog3-img.jpg">
                <h4>About Update</h4>
                <p>Keeping up with updates and trends in the industry is essential for e-commerce businesses to stay competitive and relevant in the market. Here are some tips on how e-commerce websites can stay updated with industry news:</p>
            </div>
    </div>
 </div>


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

</body>
</html>
@endsection
