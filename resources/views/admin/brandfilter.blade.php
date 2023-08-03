<div class="table-responsive">
    <table class="table">
        <thead class="tabulous">
            <th>Sno.</th>
            <th>Brand</th>
            <th colspan='2'>Action</th>
        </thead>
        @if(isset($brandsearched))
        @foreach($brandsearched as $brands)
        <tr>
            <td class="brandid">{{$brands->id}}</td>
            <td class="brandname">{{$brands->brandName}}</td>
            <td><button type="button" class="btn-primary editbrands changebtn" data-toggle="modal"
                    data-target="#exampleModal" data-whatever="@mdo"
                    style="background-color:#5bc0de;">Edit</button></button></td>
            <td><a href="{{route('deletebrand',$brands->id)}}" class="margins"><button class="btn-primary changebtn"
                        style="background-color:#d9534f;">Delete</button></a></td>
        </tr>
        @endforeach
        @endif
    </table>
</div>
<script>
$(document).ready(function() {
    var brname = document.getElementById('brandname');
    var button = document.getElementById("savebtn");

    brname.addEventListener("input", validateFields);

    function validateFields() {
        console.log('validating data');
        if (!brname.value.trim()) {
            console.log("Button disabled");
            button.disabled = true;
        } else {
            console.log("button enabled");
            button.disabled = false;
        }
    }
    $('.editbrands').click(function() {
        var brandid = $(this).closest('tr').find('.brandid').text();
        var brandname = $(this).closest('tr').find('.brandname').text();
        var brid = document.getElementById('brandid');
        brid.value = brandid;
        brname.value = brandname;
        validateFields();
    });
});
</script>
@if(Session::has('msg'))
<script>
toastr.success("Brand Name Added Successfully!");
</script>
@endif
@if(Session::has('delmsg'))
<script>
toastr.error("Brand Deleted Successfully!");
</script>
@endif
@if(Session::has('editmsg'))
<script>
toastr.success("Brand edited successfully!");
</script>
@endif