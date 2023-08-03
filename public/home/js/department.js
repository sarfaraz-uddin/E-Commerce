$(document).ready(function() {
    var clickelements=document.querySelectorAll('.clickit');
    for(var i=0;i<clickelements.length;i++) {
        clickelements[i].style.cursor='pointer';
    }
    $('.deptgo').click(function(){
        departmentId=$(this).val();
        window.location = "/departmentView/" + departmentId;
    });
    $('.clickit').click(function(){
        departmentId=this.dataset.value;
        window.location = "/departmentView/" + departmentId;
    });
});