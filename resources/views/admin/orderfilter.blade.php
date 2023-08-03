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
</div>
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