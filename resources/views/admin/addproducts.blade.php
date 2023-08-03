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


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<!-- form start -->
<div class="container-fluid pt-4 px-4" style="margin-left:1vw; width:60vw;">
    <div class="col-sm-12">

        <div class="bg-secondary rounded h-100 p-4">
            @if(Session::has('msg'))
            <div class="alert alert-success alert-dismissible">
                {{Session::get('msg')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"
                    style='border:none;background:none'>
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(Session::has('delmg'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('delmg')}}
            </div>
            @endif
            <h1 class="mb-4" style="text-align:center">Add Products</h1>
            <form action="{{route('products')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="mb-3">
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <label for="exampleInputEmail1" class="col-sm-2 col-form-label">Name</label>
                            </div>
                            <div class="row">
                                <div class="col-11">
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" name="name">
                                    @error('name')
                                    <br>
                                    <div class="alert alert-danger alerting">
                                        {{$message}}
                                        <button type="button" class="close btnclose" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label space">Price</label>
                            <div class="col-11">
                                <input type="text" class="form-control" id="exampleInputEmail2"
                                    aria-describedby="emailHelp" name="price">
                                @error('price')
                                <br>
                                <div class="alert alert-danger alerting">
                                    {{$message}}
                                    <button type="button" class="close btnclose" data-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="row">
                                <label for="exampleInputEmail1" class="form-label">Brand</label>
                            </div>
                            <div class="row">
                                <div class="col-11">
                                    <select name="brand" id="brand">
                                        @foreach($brand as $brand)
                                        <option value="{{$brand->id}}">{{$brand->brandName}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <label for="exampleInputEmail1" class="form-label">Color</label>
                            <div class="col-11">
                                <input type="text" class="form-control" id="color" aria-describedby="emailHelp"
                                    name="color">
                                @error('color')
                                <br>
                                <div class="alert alert-danger alerting">
                                    {{$message}}
                                    <button type="button" class="close btnclose" data-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <label for="exampleInputEmail1" class="form-label">CategoryID</label>
                    <select name="categoryid" id="categoryid" class='form-select'>
                        @foreach($category as $select)
                        <option value="{{$select->id}}">{{$select->categories}}</option>
                        @endforeach
                    </select>
                    <!-- <input type="text" class="form-control" id="categoryid" aria-describedby="emailHelp"
                        name="categoryid"> -->
                    <label for="exampleInputEmail1" class="form-label">Quantity</label>
                    <input type="text" class="form-control" id="categoryid" aria-describedby="emailHelp"
                        name="quantity">
                    @error('quantity')
                    <br>
                    <div class="alert alert-danger alerting">
                        {{$message}}
                        <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror
                    <label for="exampleInputEmail1" class="form-label">Size</label>
                    <input type="text" class="form-control" id="categoryid" aria-describedby="emailHelp"
                        name="size"><br>
                    @error('size')
                    <br>
                    <div class="alert alert-danger alerting">
                        {{$message}}
                        <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror
                    <!-- <label for="specialproducts" class="form-label">SpecialProduct</label>
                    <select class="form-select" aria-label="Default select example" name='choices'>
                        <option selected>Special Product</option>
                        <option value="1">Yes</option>
                        <option value="2">No</option>
                    </select>  -->
                    <label for="formFile" class="form-label">Photo</label>
                    <input class="form-control bg-dark" type="file" id="formFile" name="image">
                    @error('image')
                    <br>
                    <div class="alert alert-danger alerting">
                        {{$message}}
                        <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror
                    <label for="description" class="form-label">Description</label>
                    <input class="form-control" type="text" name="description">
                    @error('description')
                    <br>
                    <div class="alert alert-danger alerting">
                        {{$message}}
                        <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror

                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>
</div>

<!-- form end -->
@if(Session::has('msg'))
<script>
toastr.success("Products Added Successfully!");
</script>
@endif
@if(Session::has('delmg'))
<script>
toastr.error("Product Deleted Successfully!");
</script>
@endif
@endsection