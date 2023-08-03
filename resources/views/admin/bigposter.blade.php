@extends('admin.main')


@section('contents')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
           <!-- form start -->
           <div class="container-fluid pt-4 px-4">
                <div class="card bg-secondary w-100">
                    <div class="card-body">
                    @if(Session::has('msg'))
                    <div class="alert alert-success" role="alert">
                        {{Session::get('msg')}}
                        <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                        <h1 class="mb-4" style="text-align:center">Add Poster Details</h1>
                        <form action="{{route('bigposter')}}" method='post' enctype='multipart/form-data'>
                            @csrf
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">For</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="for">
                                <label for="exampleInputEmail1" class="form-label">Offer</label>
                                <input type="text" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="offer">
                                <label for="exampleInputEmail1" class="form-label">Description</label>
                                <input type="text" class="form-control" id="brand" aria-describedby="emailHelp"
                                    name="description">
                                <label for="exampleInputEmail1" class="form-label">Offerprice</label>
                                <input type="text" class="form-control" id="color" aria-describedby="emailHelp"
                                    name="offerprice">
                                <label for="formFile" class="form-label">Photo</label>
                                <input class="form-control bg-dark" type="file" id="formFile" name="posterimg">
                            </div>
                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- form end -->
     @if(Session::has('msg'))
    <script>    
            toastr.success("Big Poster Added Successfully!");
    </script>
    @endif
@endsection