@extends('admin.main')

@section('contents')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- form start -->
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h1 class="mb-4" style="text-align:center">Add Deal Detail</h1>
            <form action="{{route('deals')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">DealTitle</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="dealTitle" tabindex='1'>
                    <label for="exampleInputEmail1" class="form-label">DealDescription</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                        name="dealDescription" tabindex='2'>
                    <label for="exampleInputEmail1" class="form-label">DealPrice</label>
                    <input type="text" class="form-control" id="brand" aria-describedby="emailHelp" name="dealPrice"
                        tabindex='3'>
                    <label for="formFile" class="form-label">DealBackgroundImage</label>
                    <input class="form-control bg-dark" type="file" id="formFile" name="dealBackgroundImage"
                        tabindex='4'>
                    <label for="exampleInputEmail1" class="form-label">EndDate</label>
                    <input type="datetime-local" class="form-control" id="categoryid" aria-describedby="emailHelp" name="endDate"
                        tabindex='5' step="1"><br>
                    <label for="exampleInputEmail1" class="form-label">Product</label>
                    <input type="text" class="form-control" id="categoryid" aria-describedby="emailHelp" name="product"
                        tabindex='6'><br>
                </div>
                <button type="submit" class="btn btn-primary" tabindex='7'>Add</button>
            </form>
        </div>
    </div>
</div>
<!-- form end -->
<!-- table starts -->
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h3 class="mb-4" style="text-align:center">Deals Table</h3>
            <div class="table-responsive">
                <table class="table table-success table-striped table-hover">
                    <thead>
                        <tr>
                            <th scope="col">SNo.</th>
                            <th scope="col">DealTitle</th>
                            <th scope="col">DealDescription</th>
                            <th scope="col">DealPrice</th>
                            <th scope="col">DealBackgroundImage</th>
                            <th scope="col">EndDate</th>
                            <th scope="col">Product_ID</th>
                            <th scope="col" colspan='2'>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($deal as $dealtable)
                        <tr>
                            <th scope="row">{{$dealtable->id}}</th>
                            <td>{{$dealtable->dealTitle}}</td>
                            <td>{{$dealtable->dealDescription}}</td>d
                            <td>{{$dealtable->dealPrice}}</td>
                            <td>{{$dealtable->endDate}}</td>
                            <td><img height='70vh' width='70vh'
                                    src="{{asset('/storage/'.$dealtable->dealBackgroundImage)}}" alt=""></td>
                            <td><a href=""><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                            @if($dealtable->toshow==true)
                            <td><input type="radio" name="toshow" value="{{$dealtable->id}}" class='toshow' selected>
                                Show this</td>
                            @else
                            <td><input type="radio" name="toshow" value="{{$dealtable->id}}" class='toshow'> Show this
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- table end -->
<script src="{{asset('home/js/deal.js')}}"></script>
@if(Session::has('msg'))
<script>    
    toastr.success("New Deals Added!");
</script>
@endif
@endsection