

$('.star-submit').bind('click', function() {
    if(this.innerHTML == "<i class=\"fa fa-star\" style=\"color: gold\;\"></i>"){
        this.innerHTML = "<i class=\"far fa-star\" style=\"color: silver\"></i>";
    }else{
        this.innerHTML = "<i class=\"fa fa-star\" style=\"color: gold\;\"></i>";
    }
});