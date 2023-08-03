// const { identity } = require("lodash");

$('#password').focusin(function(){
    $('form').addClass('up')
});
$('#password').focusout(function(){
    $('form').removeClass('up')
});

//panda eye move
$(document).on("mousemove",function(event){
    var dw=$(document).width()/15;
    var dh=$(document).height()/15;
    var x=event.pageX/dw;
    var y=event.pageY/dh;
    $('.eye-ball').css({
        width:x,
        height:y
    });
});
//validation
$('.btn').click(function(){
    $('form').addClass('wrong-entry');
    setTimeout(function(){
        $('form').removeClass('wrong-entry');
    },3000);
});

function myFunction(){
    var show=document.getElementById('password');
    if(show.type=='password'){
        show.type='text';
    }
    else{
        show.type='password';
    }
};