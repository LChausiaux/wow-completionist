window.onscroll = function() {scrollFunction()};

let scrollFunction = () => {
    if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        document.getElementById("navbar").style.height = "60px";
    } else {
        document.getElementById("navbar").style.height = "80px";
    }
}
