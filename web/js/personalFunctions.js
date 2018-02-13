function toogleShowHide(divID) {
    var x = document.getElementById(divID);
    if (x.style.display == "block") {
        x.style.display = "none";
    } else {
        x.style.display = "block";
    }
}