@extends('admin.main')

@section('contents')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<input type="hidden" value="deliverytracking" class="view">


<!-- table starts -->
<style>
.sales {
    cursor: pointer;
}
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"
    integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous">
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"
    integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous">
</script>

<div class="container-fluid pt-4 px-4" style="width:80vw;">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h3 class="mb-4" style="text-align:center">Delivery Tracks</h3>
            <div id="filter">
            <div class="table-responsive">
                <table class="table">
                    <thead class="tabulous">
                        <tr>
                            <th scope="col">SNo.</th>
                            <th scope="col">Name of Recipient</th>
                            <th scope="col">Street</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Date/Time</th>
                            <th scope="col">Status</th>
                            <th scope="col">Sale</th>
                            <th scope="col">Total</th>
                            <th scope="col">View Products</th>
                            <th scope="col" colspan='5'>Action</th>
                        </tr>
                    </thead>
                        @foreach($delivertrack as $delivertrack)
                        <tr>
                            <td scope="row" class='id'>{{$delivertrack->id}}</td>
                            <td>{{$delivertrack->nameRecipient}}</td>
                            <td>{{$delivertrack->street}}</td>
                            <td>{{$delivertrack->phone}}</td>
                            <td>{{$delivertrack->email}}</td>
                            <td>{{$delivertrack->created_at}}</td>
                            <td>
                                <select name="status" id="status" class="status">
                                    <option value="processing">Processing</option>
                                    <option value="shipping">Shipping</option>
                                    <option value="Picked from warehouse">Picked form warehouse</option>
                                    <option value="Delivered">Delivered</option>
                                </select>
                            </td>
                            <td>
                                @if($delivertrack->getAttribute('paid/unpaid')==='1')
                                <p class="sales">Paid</p>
                                @elseif($delivertrack->getAttribute('paid/unpaid')==='0')
                                <p class="sales">Unpaid</p>
                                @endif
                            </td>
                            <td>{{$delivertrack->total}}</td>
                            <td>
                                <!-- Button trigger modal --> 
                                <button type="button" class="btn btn-primary viewing changebtn" data-toggle="modal"
                                    data-target="#exampleModalCenter" style="background-color:#7D8C9B; border:none; margin-top:-0.5px;"> View
                                </button>
                            </td>
                            <td>
                                <form action="{{route('deldelivertrack')}}" method="post">
                                    @csrf
                                    <button type="submit" name="getid" value="{{$delivertrack->id}}" class="changebtn btn-primary" style="background-color:#d9534f; margin-top:-0.5px;;">Delete</button>
                                </form>
                            </td>
                            <td><input type="hidden" value="{{$delivertrack->total}}" name="total" class="delivertotal"></td>
                            <td><input type="hidden" value="{{$delivertrack->subtotal}}" name="subtotal" class="subtotal"></td>
                            <td><input type="hidden" name="userid" class="userid" value="{{$delivertrack->userid}}"></td>
                            <td><input type="hidden" name="orderid" class="orderid" value="{{$delivertrack->orderId}}"></td>
                        </tr>
                    @endforeach
                </table>
            </div>
</div>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="trackproducts"></table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!-- table end -->
<script>
window.assetUrl = "{{ asset('/storage/') }}";
</script>
<script src="{{asset('/admin/js/deliverytracking.js')}}">
@endsection