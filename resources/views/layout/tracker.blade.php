@extends('layout.header')


@section('contents')
<link rel="stylesheet" href="{{asset('/home/css/tracker.css')}}">
<div class="card">
            <div class="title">Purchase Reciept</div>
            <div class="info">
                <div class="row">
                    <div class="col-7">
                        <span id="heading">Date</span><br>
                        @if(isset($gettrackdetails))
                        @foreach($gettrackdetails as $track)
                        <span id="details">{{$track->order->created_at}}</span>
                    </div>
                    <div class="col-5 pull-right">
                        <span id="heading">Order No.</span><br>
                        <span id="details">
                        {{$track->orderId}}</span>
                        @endforeach
                        @endif
                    </div>
                </div>      
            </div>      
            <div class="pricing">
                @if(isset($products))
                <div class="row">
                    <div class="col-6">
                        <span>Name</span><span style="margin-left:22vw;">Quantity</span>
                    </div>
                    <div class="col-3">
                        <span>Image</span>
                    </div>
                    <div class="col-3">
                        <span>Price</span>
                    </div>
                </div>
                @foreach($products as $p)
                <div class="row">
                    <div class="col-6">
                        <span>{{$p['name']}}<span style="margin:0 12vw;">X</span><span>{{$p['qty']}}</span></span>
                    </div>
                    <div class="col-3">
                        <img src="{{asset('/storage/'.$p['img'])}}" height="100vh" width="100vw" alt="">
                    </div>
                    <div class="col-3">
                        <span>{{"$".$p['price']}}</span>
                    </div>
                </div>
                <br>
                @endforeach
                @endif
                <!-- <div class="row">
                    <div class="col-9">
                        <span id="name">BEATS Solo 3 Wireless Headphones</span>  
                    </div>
                    <div class="col-3">
                        <span id="price">&pound;299.99</span>
                    </div>
                </div> -->
                <!-- <div class="row">
                    <div class="col-9">
                        <span id="name">Shipping</span>
                    </div>
                    <div class="col-3">
                        <span id="price">&pound;33.00</span>
                    </div>
                </div> -->
            </div>
            <div class="total">
                <div class="row">
                    <div class="col-9"></div>
                    @isset($ord)
                    @foreach($ord->take(1) as $or)
                    <div class="col-3"><big>{{"Total: $".$or->total}}</big></div>
                    @endforeach
                    @endif
                </div>
            </div>
            <div class="tracking">
                <div class="title">Tracking Order</div>
            </div>
            <div class="progress-track">
                <ul id="progressbar">
                    @if(isset($getData))
                    @if($getData=="processing")
                    <li class="step0 active" id="step1">Processing</li>
                    <li class="step0 text-center" id="step2">Shipped</li>
                    <li class="step0 text-right" id="step3">Picked from the warehouse</li>
                    <li class="step0 text-right" id="step4">Delivered</li> 
                    @elseif($getData=="shipping")
                    <li class="step0 active " id="step1">Processing</li>
                    <li class="step0 active text-center" id="step2">Shipped</li>
                    <li class="step0 text-right" id="step3">Picked from the warehouse</li>
                    <li class="step0 text-right" id="step4">Delivered</li> 
                    @elseif($getData=="Picked from warehouse")
                    <li class="step0 active" id="step1">Processing</li>
                    <li class="step0 active text-center" id="step2">Shipped</li>
                    <li class="step0 active text-right" id="step3">Picked from the warehouse</li>
                    <li class="step0 text-right" id="step4">Delivered</li> 
                    @elseif($getData=="Delivered")
                    <li class="step0 active" id="step1">Processing</li>
                    <li class="step0 active text-center" id="step2">Shipped</li>
                    <li class="step0 active text-right" id="step3">Picked from the warehouse</li>
                    <li class="step0 active text-right" id="step4">Delivered</li> 
                    @endif
                    @endif
                    <!-- <li class="step0 active " id="step1">Ordered</li>
                    <li class="step0 active text-center" id="step2">Shipped</li>
                    <li class="step0 active text-right" id="step3">On the way</li>
                    <li class="step0 text-right" id="step4">Delivered</li> -->
                    @if(isset($order))
                    @foreach($order as $acceptreject)
                        @if($acceptreject->acceptreject==='0')
                        {!! "Sorry! Your order has been rejected." !!}
                        @elseif($acceptreject->acceptreject=='1')
                            {!!"Your order has been accepted. When Processed you can track your order"!!}
                        @elseif($acceptreject->acceptreject===null)
                            {!!"Your order is being looked after."!!}
                        @endif
                    @endforeach
                    @endif
                </ul>
            </div>
            

            <div class="footer">
                <div class="row">
                    <div class="col-2"><img class="img-fluid" src="https://i.imgur.com/YBWc55P.png"></div>
                    <div class="col-10">Want any help? Please &nbsp;<a> contact us</a></div>
                </div>
                
               
            </div>
        </div>

@endsection





