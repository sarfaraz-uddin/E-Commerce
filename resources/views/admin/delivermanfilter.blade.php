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

                        @foreach($delivermansearched as $delivers)
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