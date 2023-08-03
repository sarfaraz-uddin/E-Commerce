<div class="row" id='tbody'>
    @foreach($goods as $goods)
    <div class="product-card">
            @if($goods->specialproduct)
            <div class="badge">{{$goods->specialproduct->discountoffer."% OFF"}}</div>
            <div class="product-tumb">
                <img src="{{asset('/storage/'.$goods->photo)}}" alt="" style="width:100%; height:100%;">
            </div>
            <div class="product-details">
                <span class="product-catagory">{{$goods->brand->brandName}}</span>
                <h4><a href="">{{$goods->name}}</a></h4>
                @if($goods->description==null)
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                @else
                <p>{{$goods->description}}</p>
                @endif
                <div class="product-bottom-details">
                    <div class="product-price">
                        <small>{{"$".$goods->price}}</small>{{"$".$goods->specialproduct->discountprice}}</div>
                    <div class="product-links">
                        <a href=""><i class="fa fa-heart"></i></a>
                        <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                        <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                            @csrf
                            <input type="hidden" value='{{$goods->specialproduct->discountprice}}' name='price'>
                            <input type="hidden" value="{{Auth::id()}}" name='id'>
                            @if (session()->has('message') &&
                            session()->get('productId')===$singlegallery->id)
                            <div class="floating-message">
                                {{ session()->get('message')}}
                            </div>
                            @endif
                            <a href=""><button type='submit' data-id="{{$goods->id}}" value='{{$goods->id}}' name='productId'
                                    data-user-id="{{Auth::id()}}"><i class="fa fa-shopping-cart"></i></button></a>
                        </form>
                    </div>
                </div>
            </div>
            @elseif($l = $latestproducts->firstWhere('id', $goods->id))
            <div class="badge">{{"Latest"}}</div>
            <div class="product-tumb">
                <img src="{{asset('/storage/'.$goods->photo)}}" alt="" style="width:100%; height:100%;">
            </div>
            <div class="product-details">
                <span class="product-catagory">{{$goods->brand->brandName}}</span>
                <h4><a href="">{{$goods->name}}</a></h4>
                @if($goods->description==null)
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                @else
                <p>{{$goods->description}}</p>
                @endif
                <div class="product-bottom-details">
                    <div class="product-price">{{"$".$goods->price}}</div>
                    <div class="product-links">
                        <a href=""><i class="fa fa-heart"></i></a>
                        <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                        <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                            @csrf
                            <input type="hidden" value='{{$goods->price}}' name='price'>
                            <input type="hidden" value="{{Auth::id()}}" name='id'>
                            @if (session()->has('message') &&
                            session()->get('productId')===$singlegallery->id)
                            <div class="floating-message">
                                {{ session()->get('message')}}
                            </div>
                            @endif
                            <a href=""><button type='submit' data-id="{{$goods->id}}" value='{{$goods->id}}' name='productId'
                                    data-user-id="{{Auth::id()}}"><i class="fa fa-shopping-cart"></i></button></a>
                        </form>
                    </div>
                </div>
            </div>
            @else
            <div class="product-tumb">
                <img src="{{asset('/storage/'.$goods->photo)}}" alt="" style="width:100%; height:100%;">
            </div>
            <div class="product-details">
                <span class="product-catagory">{{$goods->brand->brandName}}</span>
                <h4><a href="">{{$goods->name}}</a></h4>
                @if($goods->description==null)
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vero, possimus nostrum!</p>
                @else
                <p>{{$goods->description}}</p>
                @endif
                <div class="product-bottom-details">
                    <div class="product-price">{{"$".$goods->price}}</div>
                    <div class="product-links">
                        <a href=""><i class="fa fa-heart"></i></a>
                        <!-- <a href=""><i class="fa fa-shopping-cart"></i></a> -->
                        <form action="{{route('add-cart')}}" method='POST' class='nomargin'>
                            @csrf
                            <input type="hidden" value='{{$goods->price}}' name='price'>
                            <input type="hidden" value="{{Auth::id()}}" name='id'>
                            @if (session()->has('message') &&
                            session()->get('productId')===$singlegallery->id)
                            <div class="floating-message">
                                {{ session()->get('message')}}
                            </div>
                            @endif
                            <a href=""><button type='submit' data-id="{{$goods->id}}" value='{{$goods->id}}' name='productId'
                                    data-user-id="{{Auth::id()}}"><i class="fa fa-shopping-cart"></i></button></a>
                        </form>
                    </div>
                </div>
            </div>
            @endif
        </div>
    @endforeach
</div>

