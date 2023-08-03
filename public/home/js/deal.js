$(document).ready(function(){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).on('click','input[name="toshow"]',function(){
        var selectedValue=$(this).val();
        alert(selectedValue);
        $.ajax({
            url:'/dealshow',
            type:'POST',
            data:{
                selectedValue: selectedValue
            },
            success:function(data){
                console.log(data);
            }
        });
    });
});