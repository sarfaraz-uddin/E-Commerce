@extends('admin.main')

@section('contents')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet">
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<input type="hidden" value="order" class="view">


<div class="container-fluid pt-4 px-4" style="width:80vw;">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h3 class="mb-4" style="text-align:center">Orders Table</h3>
            <div class="filter">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="tabulous">
                            <th scope="col">SNo.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Town/City/Country</th>
                            <th scope="col">Province</th>
                            <th scope="col">Date of Placed</th>
                            <th scope="col">Email</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Workflow</th>
                            <th scope="col">Total</th>
                            <th scope="col" colspan='3'>Action</th>
                        </thead>
                        @if(isset($order))
                        @foreach($order as $orders)
                        <tr>
                            <td scope="row" class='orderid'>{{$orders->id}}</td>
                            <td>{{$orders->firstName}}{{" ".$orders->lastName}}</td>
                            <td>{{$orders->street1}}{{"/".$orders->town}}{{"/".$orders->country}}</td>
                            <td>{{" ".$orders->province}}</td>
                            <td>{{$orders->created_at}}</td>
                            <td>{{$orders->email}}</td>
                            <td>{{$orders->phone}}</td>
                            @if($orders->acceptreject==null)
                            <td class="approve" data-id="{{$orders->id}}"><i class="fas fa-check tick" data-value="1"
                                    style="color:green !important;"></i>{{" "}}<i class="fas fa-times tick"
                                    data-value="0" style="color:red !important;"></i>
                            </td>
                            @elseif($orders->acceptreject==0)
                            <td>Rejected</td>
                            @elseif($orders->acceptreject==1)
                            <td>Accepted</td>
                            @endif
                            <td>{{$orders->total}}</td>
                        <td><a href="#" data-toggle="modal" class="modal-trigger viewing"
                                    data-target="#productModal" id="viewing"><button class="changebtn"
                                        style="width:3vw !important;height:4.5vh !important; background:#2D8FEB!important;"><i
                                            class="fas fa-eye idgive" style="color:white !important;"></i></button>
                                </a></td>
                            <td><a href="#" data-toggle="modal" class="modal-tracker addingorder"
                                    data-target="#trackModal"><button class="changebtn btn btn-success"
                                        style="width:3vw !important;height:4.5vh !important;"><i
                                            class="fas fa-plus-circle" style="color:white !important;"></i></button>
                                </a>
                            </td>
                            <td>
                                <form action="{{route('delorders')}}" method="POST">
                                    @csrf
                                    <button type="submit" value="{{$orders->id}}" name="getid"
                                        class="changebtn btn-primary" style="background-color:#d9534f;">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                    <div class="modal fade" id="productModal" tabindex="-1" role="dialog"
                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    @if(isset($orders))
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        {{$orders->firstName}}{{" ".$orders->lastName." "}}Products List</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    @endif
                                </div>
                                <div class="modal-body">
                                    <table class='table inserting'>
                                        <thead>
                                            <tr>
                                                <th>ProductId</th>
                                                <th>Name</th>
                                                <th>Quantity</th>
                                                <th>Total Price</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                                <div class="modal-footer">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal" id="trackModal">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Track List</h5>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>
                                <div class="modal-body">
                                    <table class='table addingorder'>
                                        <thead>
                                            <tr>
                                                <th>OrderID</th>
                                                <th>UserID</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="oid"></td>
                                                <td class='userid'></td>
                                                <td class="fullNamee"></td>
                                                <td class="address"></td>
                                                <td class="phone"></td>
                                                <td class="email"></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="orderproducts table" style="border-style:none !important;">
                                    </table>

                                    <label>DeliverBoy</label>
                                    <select name="deliverman" id="deliverman" class="deliverman">
                                        @foreach($deliverman as $del)
                                        @if($del->status==1)
                                        <option value="{{$del->id}}">{{$del->name}}</option>
                                        @else
                                        <option value="">Not available</option>
                                        @endif
                                        @endforeach
                                    </select>
                                    <br><button class="btn btn-primary addnow">Add Now</button>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<!-- table end -->

<script>
$(document).ready(function() {
    $('.modal-trigger').click(function() {
        $('#productModal').modal('show');
    });
    $('.modal-tracker').click(function() {
        $('#trackModal').modal('show');
    });
});
</script>
<script>
$(document).ready(function() {
    var token = $('meta[name="csrf-token"]').attr('content');
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': token
        }
    });
    $(".addingorder").click(function() {
        var orderid = $(this).closest('tr').find('.orderid').text();
        $.ajax({
            url: '/addingorder',
            type: 'GET',
            data: {
                orderid: orderid,
            },
            success: function(order) {
                console.log(order);
                for (var key in order) {
                    const addingorder = document.querySelector('.addingorder');
                    addingorder.innerHTML = "";
                    $('.oid').text(order[key].id);
                    $('.userid').text(order[key].userid);
                    $('.fullNamee').text(order[key].firstName + " " + order[key].lastName);
                    $('.address').text(order[key].town + "," + order[key].province + "," +
                        order[key].country);
                    $('.phone').text(order[key].phone);
                    $('.email').text(order[key].email);

                    const productObj = JSON.parse(order[key].products);
                    const orderproducts = document.querySelector('.orderproducts');
                    orderproducts.innerHTML = "";
                    let row = orderproducts.insertRow();

                    let cell1 = row.insertCell();
                    cell1.innerHTML = "ProductID";

                    let cell2 = row.insertCell();
                    cell2.innerHTML = "Name";

                    let cell3 = row.insertCell();
                    cell3.innerHTML = "Quantity";

                    let cell4 = row.insertCell();
                    cell4.innerHTML = "Total Price";

                    let cell5 = row.insertCell();
                    cell5.innerHTML = "Image";
                    for (let key in productObj) {
                        window.assetUrl = "{{ asset('/storage/') }}";
                        let row = orderproducts.insertRow();

                        let cell1 = row.insertCell();
                        cell1.innerHTML = productObj[key].id;

                        let cell2 = row.insertCell();
                        cell2.innerHTML = productObj[key].name;

                        let cell3 = row.insertCell();
                        cell3.innerHTML = productObj[key].qty;

                        let cell4 = row.insertCell();
                        cell4.innerHTML = productObj[key].price;

                        let imageUrl = window.assetUrl + '/' + productObj[key].img;
                        let cell5 = row.insertCell();
                        let img = document.createElement('img');
                        img.src = imageUrl;
                        img.width = 100;
                        cell5.appendChild(img);
                    }
                }
            }
        });
    });
    $(".idgive").click(function() {
        var orderid = $(this).closest('tr').find('.orderid').text();
        $.ajax({
            url: '/giveorderid',
            type: 'GET',
            data: {
                orderid: orderid,
            },
            success: function(pr) {
                var body = $('.modal-body');
                window.assetUrl = "{{ asset('/storage/') }}";
                const table = document.querySelector('.inserting');
                table.innerHTML = "";
                let row = table.insertRow();

                let cell1 = row.insertCell();
                cell1.innerHTML = "SNo.";

                let cell2 = row.insertCell();
                cell2.innerHTML = "Name";

                let cell3 = row.insertCell();
                cell3.innerHTML = "Quantity";

                let cell4 = row.insertCell();
                cell4.innerHTML = "Price";

                let cell5 = row.insertCell();
                cell5.innerHTML = "Image";
                for (let key in pr) {
                    let row = table.insertRow();

                    let cell1 = row.insertCell();
                    cell1.innerHTML = pr[key].id;

                    let cell2 = row.insertCell();
                    cell2.innerHTML = pr[key].name;

                    let cell3 = row.insertCell();
                    cell3.innerHTML = pr[key].qty;

                    let cell4 = row.insertCell();
                    cell4.innerHTML = "$" + pr[key].price;

                    let imageUrl = window.assetUrl + '/' + pr[key].img;
                    let cell5 = row.insertCell();
                    let img = document.createElement('img');
                    img.src = imageUrl;
                    img.width = 100;
                    cell5.appendChild(img);
                }
            }
        });
    });
});
</script>
<script src="{{asset('/admin/js/order.js')}}"></script>
<script src="{{asset('/admin/js/main.js')}}"></script>


@endsection