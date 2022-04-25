var clicked = false;

function like() {
    clicked = !clicked;

    var like = document.getElementById("like");

    if (clicked == true) {
        var span = like.getElementsByClassName("fa-heart-o");
        span[0].style.color = "red";
        span[0].className = "fa fa-heart";
    }
    else {
        var span = like.getElementsByClassName("fa fa-heart");
        span[0].style.color = "black";
        span[0].className = "fa fa-heart-o";
    }
}