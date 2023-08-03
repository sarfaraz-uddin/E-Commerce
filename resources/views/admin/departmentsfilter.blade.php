
<div class="table-responsive">
    <div id="filter">
        <table class="table">
            <thead class="tabulous">
                <th>Sno.</th>
                <th>Department Name</th>
                <th>Department Image</th>
                <th colspan='2'>Action</th>
            </thead>

            @if(isset($departsearched))
            @foreach($departsearched as $departt)
            <tr>
                <td class="departid">{{$departt->id}}</td>
                <td class="dname">{{$departt->departmentName}}</td>
                <td class="dimage"><img src="{{asset('/storage/'.$departt->departmentImage)}}" alt="" height="50vh"
                        width="50vw"></td>
                <td><button type="button" class="btn btn-primary editdepart changebtn" data-toggle="modal"
                        data-target="#exampleModal" data-whatever="@mdo" style="background-color:#5bc0de; border:none;">Edit</button></button></td>
                <form action="{{route('deldepartments')}}" method="POST" class="margins">
                    @csrf
                    <td><button type="submit" value="{{$departt->id}}" class="del changebtn" name="idpass" style="background-color:#d9534f; color:white; margin-left:-120px;">Delete</button></td>
                </form>

            </tr>
            @endforeach
            @endif
    </div>
    </table>
</div>

<script>
    $(document).ready(function() {
    var departmentname = document.getElementById('departmentname');
    var departmentimage = document.getElementById('imag');
    var button = document.getElementById("savebtn");
    
    departmentname.addEventListener("input", validateFields);
    departmentimage.addEventListener("change", validateFields);
    
    function validateFields() {
        console.log('validating data');
        console.log(departmentimage.files[0]);
        if (!departmentname.value.trim() || typeof departmentimage.files[0] === 'undefined') {
            console.log("Button disabled");
            button.disabled = true;
        } else {
            console.log("button enabled");
            button.disabled = false;
        }
    }

    $('.editdepart').click(function() {
        var departid = $(this).closest('tr').find('.departid').text();
        var dname = $(this).closest('tr').find('.dname').text();
        var departmentid = document.getElementById('departmentid');
        
        departmentid.value = departid;
        departmentname.value = dname;
        validateFields();
    });
});

</script>


</script>
@if(Session::has('success'))
<script>
toastr.success("Department created successfully!");
</script>
@endif
@if(Session::has('deldept'))
<script>
toastr.error("Department deleted successfully!");
</script>
@endif
@if(Session::has('edited'))
<script>
toastr.success("Department edited successfully!");
</script>
@endif