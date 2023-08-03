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
                <th scope="col">View Products</th>
                <th scope="col">Status</th>
                <th scope="col">Sale</th>
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
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary viewing changebtn" data-toggle="modal"
                    data-target="#exampleModalCenter" style="width:3vw !important;height:4.5vh !important;">
                    <i class="fas fa-eye idgive"></i>
                </button>
            </td>
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
            <td>
                <form action="{{route('deldelivertrack')}}" method="post">
                    @csrf
                    <button type="submit" name="getid" value="{{$delivertrack->id}}" class="changebtn btn-primary"
                        style="background-color:#d9534f; margin-top:-0.5px;;">Delete</button>
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
<script>
window.assetUrl = "{{ asset('/storage/') }}";
</script>
<script src="{{asset('/admin/js/deliverytracking.js')}}">