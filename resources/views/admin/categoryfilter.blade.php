<div class="table-responsive">
                    <table class="table">
                        <thead class="tabulous">
                            <tr>
                                <th scope="col">Sno.</th>
                                <th scope="col">Category</th>
                                <th scope="col">Department</th>
                                <th scope="col" colspan='2'>Action</th>
                            </tr>
                        </thead>
                        @if(isset($category))
                        @foreach($category as $category)
                        <tr>
                            <td scope="row" class="catid">{{$category->id}}</td>
                            <td class="catt">{{$category->categories}}</td>
                            <td>{{$category->departments->departmentName}}</td>
                            <!-- <td><a href="{{route('editcategory',$category->id)}}"><i class="fas fa-edit"></i></a></td> -->
                            <td><button type="button" class="btn-primary editcategory changebtn"
                                    style="background-color:#5bc0de;" data-toggle="modal" data-target="#exampleModal"
                                    data-whatever="@mdo">Edit</button></button></td>
                            <td><a href="{{route('delete',$category->id)}}" class="margins"><button
                                        class="btn-primary changebtn"
                                        style="background-color:#d9534f;">Delete</button></a></td>
                        </tr>
                        @endforeach
                        @endif
                    </table>
                </div>
@if(Session::has('delmsg'))
<script>
toastr.error("Category Deleted Successfully!");
</script>
@endif

@if(Session::has('edited'))
<script>
toastr.success("Category edited successfully!");
</script>
@endif


<script>
$(document).ready(function() {
    var catname = document.getElementById('categoryname');
    var button = document.getElementById('savebtn');
    catname.addEventListener("input", validateFields);

    function validateFields() {
        console.log('validating data');
        if (!catname.value.trim()) {
            console.log("Button disabled");
            button.disabled = true;
        } else {
            console.log("button enabled");
            button.disabled = false;
        }
    }

    $('.editcategory').click(function() {
        var categoryid = $(this).closest('tr').find('.catid').text();
        var catt = $(this).closest('tr').find('.catt').text();
        var catid = document.getElementById('categoryid');
        catid.value = categoryid;
        catname.value = catt;
        validateFields();
    });
});
</script>