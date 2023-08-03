$(document).ready(function(){
    $('.search').on('input',function(){
        var searchItem=$(this).val();
        // alert(searchItem);  
        if(searchItem==''){
            $('#search-results').html('');
        }
        else{
            $.ajax({
            url:'/getsearch',
                type:'GET',
                dataType: 'json',
                data:{
                    searchItem:searchItem
                },
                success:function(data){
                    console.log(data);
                    var result='';
                    for(let i=0;i<data.length;i++){
                        result+='<span class="searches" data-id="'+data[i].id+'">'+data[i].name+'</span>'+'<br>';
                    }
                    $('#search-results').html(result);
                }
            });
        }
    }); 
    $(document).on('click','.searches', function(){
       var id=$(this).data('id');
       window.location.href='/searchresults?id='+id;
    });
});