@extends('admin.main')

@section('contents')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('/admin/css/format.css')}}">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-7X9tKGcEylxqDhB1iKiQlL24phPPTFZv/0nQWjk1r6rMCac9LjY6xbxDW6dDOKGw1N6IGnGd5H+6qpzsFTgfw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- form start -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<input type="hidden" name="deliverman12" value="deliverman" class="view">

<div class="container-fluid pt-4 px-4" style="width:30vw; margin-left:2vw;">
    <div class="card bg-secondary w-100">
        <div class="card-body">
            <!-- @if(Session::has('msg'))
            <div class="alert alert-success " role="alert">
                {{Session::get('msg')}}
                <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(Session::has('delmg'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('delmg')}}
                <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif -->
            <h1 class="mb-4" style="text-align:center">Add DeliverMan</h1>
            <form action="{{route('deliver-man')}}" method='post' enctype='multipart/form-data'>
                @csrf
                <div class="mb-3">

                    <label for="name" class="form-label">Name</label>
                    <input class="form-control" type="text" id="name" name="name">
                    @error('name')
                    <br>
                    <div class="alert alert-danger alerting">
                        {{$message}}
                        <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror

                    <label for="phone" class="form-label">Phone</label>
                    <input class="form-control" type="text" id="phone" name="phone">
                    @error('phone')
                    <br>
                    <div class="alert alert-danger alerting">
                        {{$message}}
                        <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror

                    <label for="address" class="form-label">Address</label>
                    <input class="form-control" type="text" id="address" name="address">
                    @error('address')
                    <br>
                    <div class="alert alert-danger alerting">
                        {{$message}}
                        <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror

                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control">
                    @error('image')
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

<div class="container-fluid pt-4 px-4" style="width:80vw;">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4" style="text-align: center;">Delivery Man Table</h6>
            <div id="filter">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="tabulous">
                            <th>Sno.</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th colspan='2'>Action</th>
                        </thead>

                        @foreach($deliverman as $delivers)
                        <tr>
                            <td class="delivermanid">{{$delivers->id}}</td>
                            <td class="delivermanname">{{$delivers->name}}</td>
                            <td class="delivermanphone">{{$delivers->phone}}</td>
                            <td class="delivermanaddress">{{$delivers->address}}</td>
                            @if($delivers->status=='0')
                            <td class="status" data-id="1">Inactive</td>
                            @else
                            <td class="status" data-id="0">Active</td>
                            @endif
                            <td><button type="button" class="changebtn btn-primary editdeliverman" data-toggle="modal"
                                    data-target="#exampleModal" data-whatever="@mdo"
                                    style="background-color:#5bc0de;">Edit</button></button></td>
                            <td>
                                <form action="{{route('deldeliverboy')}}" method="POST" style="margin-left:-3vw;">
                                    @csrf
                                    <button type="submit" value="{{$delivers->id}}" class="changebtn btn-primary"
                                        name="getid" style="background-color:#d9534f;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Departments</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('editdeliverman')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <label for="delivermanid" class="col-form-label">Deliverman ID</label>
                        <input type="readonly" class="form-control brandid" id="delid" name="delivermanid" readonly>
                    </div>
                    <div class="form-group">
                        <label for="delivermanname" class="col-form-label">Name:</label>
                        <input type="text" class="form-control" id="delname" name="delivermanname">
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-form-label">Phone:</label>
                        <input type="text" class="form-control" id="delphone" name="phone">
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-form-label">Address:</label>
                        <input type="text" class="form-control" id="deladdress" name="address">
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" id="imgs" class="form-control">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" id="savebtn">Save changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    var delname = document.getElementById('delname');
    var deladdress = document.getElementById('deladdress');
    var delphone = document.getElementById('delphone');
    var imgs=document.getElementById('imgs');
    var button = document.getElementById("savebtn");


    delname.addEventListener("input", validateFields);
    deladdress.addEventListener('input', validateFields);
    delphone.addEventListener("input", validateFields);
    imgs.addEventListener("change", validateFields);


    function validateFields() {
        console.log('validating data');
        if (!delname.value.trim() || typeof imgs.files[0] === 'undefined' || !deladdress.value.trim() || !delphone.value.trim()) {
            console.log("Button disabled");
            button.disabled = true;
        } else {
            console.log("button enabled");
            button.disabled = false;
        }
    }

    $('.editdeliverman').click(function() {
        var delivermanid = $(this).closest('tr').find('.delivermanid').text();
        var name = $(this).closest('tr').find('.delivermanname').text();
        var phone = $(this).closest('tr').find('.delivermanphone').text();
        var address = $(this).closest('tr').find('.delivermanaddress').text();
        var id = document.getElementById('delid');
        id.value = delivermanid;
        delname.value = name;
        delphone.value = phone;
        deladdress.value = address;

        validateFields();
    });
    $('.status').click(function() {
        var status = $(this).data('id');
        var id = $(this).closest('tr').find('.delivermanid').text();
        $.ajax({
            type: "post",
            url: 'statuss',
            data: {
                id: id,
                status: status,
            },
            success: function() {
                location.reload();
            }
        });
    });
});
</script>
@if(Session::has('msg'))
<script>
toastr.success("DeliveryMan Data Added Successfully!");
</script>
@endif
@if(Session::has('delmg'))
<script>
toastr.error("DeliveryMan Deleted Successfully!");
</script>
@endif
@if(Session::has('edited'))
<script>
toastr.success("DeliveryMan edited successfully!");
</script>
@endif
@endsection