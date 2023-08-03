@extends('admin.main')

@section('contents')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"
    integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('/admin/css/format.css')}}">


<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
    integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<input type="hidden" class='view' value='category'>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<!-- category section start -->
<div class="container-fluid pt-4 px-4" style="width:50vw; margin-left:1vw;">
    <div class="card bg-secondary w-100">
        <div class="card-body">
            <!-- @if(Session::has('msg'))
            <div class="alert alert-success" role="alert">
                {{Session::get('msg')}}
                <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif
            @if(Session::has('delmsg'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('delmsg')}}
                <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif -->


            <h1 class='text-white'>Add Category</h1>
            <form action="{{route('category')}}" method='post'>
                @csrf
                <div class="mb-3">
                    <label for="category" class="form-label text-white">Category Name</label>
                    <input type="text" name='category' class="form-control" id="category">
                    @error('category')
                    <br>
                    <div class="alert alert-danger alerting">
                        {{$message}}
                        <button type="button" class="close btnclose" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @enderror
                    <label for="belongstodepartment" class="form-label text-white">DepartmentName</label>
                    <select class="form-select" aria-label="Default select example" name='department_id'>
                        @foreach($departments as $departmentid)
                        <option value="{{$departmentid->id}}">{{$departmentid->departmentName}}</option>
                        @endforeach
                    </select>
                </div>
                <button type='submit' class='btn btn-danger'>Submit </button>
            </form>
        </div>
    </div>
</div>
<!-- category section end -->

<!-- table starts -->
<div class="container-fluid pt-4 px-4" style="width:70vw; margin-left:1vw;">
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4" style="text-align:center">Category Table</h6>
            <div id="filter">
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
                <form action="{{route('editcategory2')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <div class="form-group">
                        <label for="categoryid" class="col-form-label">Category ID</label>
                        <input type="readonly" class="form-control categoryid" id="categoryid" name="categoryid"
                            readonly>
                    </div>
                    <div class="form-group">
                        <label for="categoryname" class="col-form-label">Category Name:</label>
                        <input type="text" class="form-control" id="categoryname" name="categoryname">
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
<!-- table end -->
@if(Session::has('mssg'))
<script>
toastr.success("Category Edited Successfully!");
</script>
@endif
@if(Session::has('msg'))
<script>
toastr.success("New Category Added Successfully!");
</script>
@endif
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


@endsection