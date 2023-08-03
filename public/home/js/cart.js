$(document).ready(function() {
    function updateTotal(){
        var getAllPrice=[];
        $('.pricing').each(function(){
            getAllPrice.push(parseFloat($(this).text().replace('$','')));
        });
        var total = getAllPrice.reduce(function(acc, current) {
            return acc + current;
        }, 0);
        $("#subtotal").text("$" + total);
        $("#updatetotalhidden").val(total);
    }
    var observer = new MutationObserver(function(mutations) {
        updateTotal();
    });

    $('.pricing').each(function(){
        observer.observe(this, {
            characterData: true,
            childList: true,
            subtree: true
        });
    });
    updateTotal();

    var radioButtons=document.getElementsByName("customRadio");
    for(var i=0;i<radioButtons.length;i++){
        radioButtons[i].addEventListener("click",function(){
            var selectedRadio=document.querySelector('input[name="customRadio"]:checked').value;
            var show = document.getElementById("show");
            show.textContent="$"+selectedRadio;
            var show1=document.getElementById("show").textContent;
            var show2=parseFloat(show1.replace("$",""));
            var subtotal=document.getElementById("subtotal").textContent;
            var subtotal1=parseFloat(subtotal.replace("$",""));
            var total=document.getElementById("total");
            var total1=subtotal1+show2;
            total.textContent = "$"+total1;
        });
    }
    $(".click").click(function(){
        var token = $('meta[name="csrf-token"]').attr('content');
        $.ajaxSetup({
            headers: {
               'X-CSRF-TOKEN': token
            }
         });
        var subtotal=$("#subtotal").text();
        var subtotal1=parseFloat(subtotal.replace("$", ""));
        var shipping=$("#show").text();
        var shipping1=parseFloat(shipping.replace("$", ""));
        var shippinghidden=document.getElementById("shippinghidden");
        shippinghidden.value=shipping1;
        var total=$("#total").text();
        var total1=parseFloat(total.replace("$", ""));
        var totalhidden=document.getElementById("totalhidden");
        totalhidden.value=total1;
        $.ajax({
            type:'POST',
            url:'/sendship',
            dataType:'html',
            data:{
                'subtotal':subtotal1,
                'shipping':shipping1,
                'total':total1
            },
            success:function(){
                console.log('nfkds');
            }
        });
    });

});