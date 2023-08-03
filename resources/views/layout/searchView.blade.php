@extends('layout.header')


@section('contents')
<div class="container">
<div class="col-12">
    <div class="shop_grid_product_area p-5">
        <div id="productData">
            <div class="row">
            @foreach($product as $productsArray)
        <div class="product-card">
            @if($productsArray->specialproduct)
            <div class="badge">{{$productsArray->specialproduct->discountoffer."% OFF"}}</div>
            <div class="product-tumb">
                <img src="{{asset('/storage/'.$productsArray->photo)}}" alt="" style="width:100%; height:100%;">
            </div>
            <div class="product-details">
                <span class="product-catagory">{{$productsArray->brand->brandName}}</span>
                <h4><a href="">{{$productsArray->name}}</a></h4>
                @if($productsArray->description==null)
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                @else
                <p>{{$productsArray->description}}</p>
                @endif
                <div class="product-bottom-details">
                    <div class="product-price">
                        <small>{{"$".$productsArray->price}}</small>{{"$".$productsArray->specialproduct->discountprice}}</div>
                    <div class="product-links">
                        <a href=""><i class="fa fa-heart"></i></a>
                        <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                        <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                            @csrf
                            <input type="hidden" value='{{$productsArray->specialproduct->discountprice}}' name='price'>
                            <input type="hidden" value="{{Auth::id()}}" name='id'>
                            @if (session()->has('message') &&
                            session()->get('productId')===$singlegallery->id)
                            <div class="floating-message">
                                {{ session()->get('message')}}
                            </div>
                            @endif
                            <a href=""><button type='submit' data-id="{{$productsArray->id}}" value='{{$productsArray->id}}' name='productId'
                                    data-user-id="{{Auth::id()}}"><i class="fa fa-shopping-cart"></i></button></a>
                        </form>
                    </div>
                </div>
            </div>
            @elseif($l = $latestproducts->firstWhere('id', $productsArray->id))
            <div class="badge">{{"Latest"}}</div>
            <div class="product-tumb">
                <img src="{{asset('/storage/'.$productsArray->photo)}}" alt="" style="width:100%; height:100%;">
            </div>
            <div class="product-details">
                <span class="product-catagory">{{$productsArray->brand->brandName}}</span>
                <h4><a href="">{{$productsArray->name}}</a></h4>
                @if($productsArray->description==null)
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                @else
                <p>{{$productsArray->description}}</p>
                @endif
                <div class="product-bottom-details">
                    <div class="product-price">{{"$".$productsArray->price}}</div>
                    <div class="product-links">
                        <a href=""><i class="fa fa-heart"></i></a>
                        <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                        <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                            @csrf
                            <input type="hidden" value='{{$productsArray->price}}' name='price'>
                            <input type="hidden" value="{{Auth::id()}}" name='id'>
                            @if (session()->has('message') &&
                            session()->get('productId')===$singlegallery->id)
                            <div class="floating-message">
                                {{ session()->get('message')}}
                            </div>
                            @endif
                            <a href=""><button type='submit' data-id="{{$productsArray->id}}" value='{{$productsArray->id}}' name='productId'
                                    data-user-id="{{Auth::id()}}"><i class="fa fa-shopping-cart"></i></button></a>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="product-tumb">
                <img src="{{asset('/storage/'.$productsArray->photo)}}" alt="" style="width:100%; height:100%;">
            </div>
            <div class="product-details">
                <span class="product-catagory">{{$productsArray->brand->brandName}}</span>
                <h4><a href="">{{$productsArray->name}}</a></h4>
                @if($productsArray->description==null)
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                @else
                <p>{{$productsArray->description}}</p>
                @endif
                <div class="product-bottom-details">
                    <div class="product-price">{{"$".$productsArray->price}}</div>
                    <div class="product-links">
                        <a href=""><i class="fa fa-heart"></i></a>
                        <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                        <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                            @csrf
                            <input type="hidden" value='{{$productsArray->price}}' name='price'>
                            <input type="hidden" value="{{Auth::id()}}" name='id'>
                            @if (session()->has('message') &&
                            session()->get('productId')===$singlegallery->id)
                            <div class="floating-message">
                                {{ session()->get('message')}}
                            </div>
                            @endif
                            <a href=""><button type='submit' data-id="{{$productsArray->id}}" value='{{$productsArray->id}}' name='productId'
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
<div class="container">
<div class="col-12">
    <div class="shop_grid_product_area p-5">
        <div id="productData">
            <div class="row">
            @foreach($productrelate as $productsArray)
        <div class="product-card">
            @if($productsArray->specialproduct)
            <div class="badge">{{$productsArray->specialproduct->discountoffer."% OFF"}}</div>
            <div class="product-tumb">
                <img src="{{asset('/storage/'.$productsArray->photo)}}" alt="" style="width:100%; height:100%;">
            </div>
            <div class="product-details">
                <span class="product-catagory">{{$productsArray->brand->brandName}}</span>
                <h4><a href="">{{$productsArray->name}}</a></h4>
                @if($productsArray->description==null)
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                @else
                <p>{{$productsArray->description}}</p>
                @endif
                <div class="product-bottom-details">
                    <div class="product-price">
                        <small>{{"$".$productsArray->price}}</small>{{"$".$productsArray->specialproduct->discountprice}}</div>
                    <div class="product-links">
                        <a href=""><i class="fa fa-heart"></i></a>
                        <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                        <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                            @csrf
                            <input type="hidden" value='{{$productsArray->specialproduct->discountprice}}' name='price'>
                            <input type="hidden" value="{{Auth::id()}}" name='id'>
                            @if (session()->has('message') &&
                            session()->get('productId')===$singlegallery->id)
                            <div class="floating-message">
                                {{ session()->get('message')}}
                            </div>
                            @endif
                            <a href=""><button type='submit' data-id="{{$productsArray->id}}" value='{{$productsArray->id}}' name='productId'
                                    data-user-id="{{Auth::id()}}"><i class="fa fa-shopping-cart"></i></button></a>
                        </form>
                    </div>
                </div>
            </div>
            @elseif($l = $latestproducts->firstWhere('id', $productsArray->id))
            <div class="badge">{{"Latest"}}</div>
            <div class="product-tumb">
                <img src="{{asset('/storage/'.$productsArray->photo)}}" alt="" style="width:100%; height:100%;">
            </div>
            <div class="product-details">
                <span class="product-catagory">{{$productsArray->brand->brandName}}</span>
                <h4><a href="">{{$productsArray->name}}</a></h4>
                @if($productsArray->description==null)
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                @else
                <p>{{$productsArray->description}}</p>
                @endif
                <div class="product-bottom-details">
                    <div class="product-price">{{"$".$productsArray->price}}</div>
                    <div class="product-links">
                        <a href=""><i class="fa fa-heart"></i></a>
                        <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                        <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                            @csrf
                            <input type="hidden" value='{{$productsArray->price}}' name='price'>
                            <input type="hidden" value="{{Auth::id()}}" name='id'>
                            @if (session()->has('message') &&
                            session()->get('productId')===$singlegallery->id)
                            <div class="floating-message">
                                {{ session()->get('message')}}
                            </div>
                            @endif
                            <a href=""><button type='submit' data-id="{{$productsArray->id}}" value='{{$productsArray->id}}' name='productId'
                                    data-user-id="{{Auth::id()}}"><i class="fa fa-shopping-cart"></i></button></a>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="product-tumb">
                <img src="{{asset('/storage/'.$productsArray->photo)}}" alt="" style="width:100%; height:100%;">
            </div>
            <div class="product-details">
                <span class="product-catagory">{{$productsArray->brand->brandName}}</span>
                <h4><a href="">{{$productsArray->name}}</a></h4>
                @if($productsArray->description==null)
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                @else
                <p>{{$productsArray->description}}</p>
                @endif
                <div class="product-bottom-details">
                    <div class="product-price">{{"$".$productsArray->price}}</div>
                    <div class="product-links">
                        <a href=""><i class="fa fa-heart"></i></a>
                        <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                        <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                            @csrf
                            <input type="hidden" value='{{$productsArray->price}}' name='price'>
                            <input type="hidden" value="{{Auth::id()}}" name='id'>
                            @if (session()->has('message') &&
                            session()->get('productId')===$singlegallery->id)
                            <div class="floating-message">
                                {{ session()->get('message')}}
                            </div>
                            @endif
                            <a href=""><button type='submit' data-id="{{$productsArray->id}}" value='{{$productsArray->id}}' name='productId'
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