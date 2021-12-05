function change(el, e){
    e.preventDefault();
    document.getElementsByClassName("active")[0].className = "";
    el.className = "active";
}