@extends('admin.main')

@section('contents')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="{{asset('/admin/css/format.css')}}">


<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- form start -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<div class="container-fluid pt-4 px-4" style="margin-left:1vw; width:50vw;">
    <div class="col-12">

        <div class="bg-secondary rounded h-100 p-4">
            @if(Session::has('msg'))
            <div class="alert alert-success" role="alert">
                {{Session::get('msg')}}
            </div>
            @endif
            @if(Session::has('delmg'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('delmg')}}
            </div>
            @endif
            <h1 class="mb-4" style="text-align:center">Add Special Products</h1>
            <form action="{{route('special-products')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="mb-3">

                    <label for="Description" class="form-label">Description</label>
                    <input class="form-control" type="text" id="description" name="description">
                    @error('description')
                    <br>
                    <div class="alert alert-danger alerting">
                        {{$message}}
                        <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror

                    <label for="discountif" class="form-label">DiscountOffer(%)</label>
                    <input class="form-control" type="text" id="discountPercent" name="discountoffer">

                    <label for="discountprice" class="form-label">DiscountPrice</label>
                    <input class="form-control" type="text" id="discountPrice" name="discountprice">
                    @error('discountprice')
                    <br>
                    <div class="alert alert-danger alerting">
                        {{$message}}
                        <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror

                    <label for="products" class="form-label">ProductName</label>
                    <select name="productId" id="productId">
                        @foreach($products as $producting)
                        <option value="{{$producting->id}}" data-price="{{$producting->price}}">{{$producting->name}}
                        </option>
                        @endforeach
                    </select>

                    <label for="price" class="form-label">Price</label>
                    <input type="text" name='productprice' id='originalPrice' class='form-control' readonly>

                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>
<!-- form end -->

<script src="{{asset('admin/js/specialproducts.js')}}"></script>
@if(Session::has('msg'))
<script>
toastr.success("Special Products added Successfully!");
</script>
@endif
@if(Session::has('delmg'))
<script>
toastr.success("Special Products Deleted!");
</script>
@endif
@endsection