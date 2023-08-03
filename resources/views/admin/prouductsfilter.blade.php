<div class="table-responsive">
    <table class="table">
        <thead class="tabulous">
            <tr>
                <th scope="col">SNo.</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Category</th>
                <th scope="col">Color</th>
                <th scope="col">Size</th>
                <th scope="col">Quantity</th>
                <th scope="col">Brand</th>
                <th scope="col">Photo.</th>
                <th colspan='2'>Action</th>
            </tr>
        </thead>
        @foreach($products as $products)
        <tr>
            <td scope="row" class="productsid">{{$products->id}}</td>
            <td class="productsname">{{$products->name}}</td>
            <td class="productsprice">{{$products->price}}</td>
            <td>{{$products->category->categories}}</td>
            <td class="productscolor">{{$products->color}}</td>
            <td class="productssize">{{$products->size}}</td>
            <td class="productsqty">{{$products->quantity}}</td>
            <td>{{$products->brand->brandName}}</td>
            <td class="productimage"><img height='70vh' width='70vh' src="{{asset('/storage/'.$products->photo)}}"
                    alt=""></td>
            <td><button type="button" class="btn-primary editproducts changebtn" data-toggle="modal"
                    data-target="#exampleModal" data-whatever="@mdo" style="background-color:#5bc0de;">Edit</button>
            </td>
            <td class="description d-none">{{$products->description}}</td>
            <td><a href="{{route('productdelete',$products->id)}}"><button class="btn-primary changebtn"
                        style="background-color:#d9534f;">Delete</button></a></td>
        </tr>
        @endforeach
    </table>
</div>
<script>
$(document).ready(function() {
        var pid = document.getElementById('pid');
        var pname = document.getElementById('pname');
        var pprice = document.getElementById('pprice');
        var pcolor = document.getElementById('pcolor');
        var pdescription = document.getElementById('pdescription');
        var proimage = document.getElementById('proimg');
        var button = document.getElementById("savebtn");


        pname.addEventListener("input", validateFields);
        pprice.addEventListener("input", validateFields);
        pcolor.addEventListener("input", validateFields);
        pdescription.addEventListener("input", validateFields);
        proimage.addEventListener("change", validateFields);

        function validateFields() {
        console.log('validating data');
        if (!pname.value.trim() || typeof proimage.files[0] === 'undefined' || !pprice.value.trim() || !pcolor.value.trim() || !pdescription.value.trim()) {
            console.log("Button disabled");
            button.disabled = true;
        } else {
            console.log("button enabled");
            button.disabled = false;
        }
    }

    $('.editproducts').click(function() {
        var prid = $(this).closest('tr').find('.productsid').text();
        var name = $(this).closest('tr').find('.productsname').text();
        var price = $(this).closest('tr').find('.productsprice').text();
        var color = $(this).closest('tr').find('.productscolor').text();
        var description = $(this).closest('tr').find('.description').text();
        var image = $(this).closest('tr').find('.productimage img').attr('src');



        pid.value = prid;
        pname.value = name;
        pprice.value = price;
        pcolor.value = color;
        pdescription.value = description;

        validateFields();

    });
});
</script>
@if(Session::has('edited'))
<script>
toastr.success("Products edited successfully!");
</script>
@endif
@if(Session::has('delmg'))
<script>
toastr.success("Products deleted successfully!");
</script>
@endif