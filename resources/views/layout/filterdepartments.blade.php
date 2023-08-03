@extends('layout.header')


@section('contents')

<div class="container">
<div class="col-12">
    <div class="shop_grid_product_area p-5">
        <div id="productData">
            <div class="row">
            @foreach($productsArray as $pf)
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
        </div>
    </div>
</div>
</div>

<script src="{{asset('home/js/department.js')}}"></script>
@endsection