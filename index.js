function change(el, e){
    e.preventDefault();
    if(document.getElementById("itempageB").style.visibility == "visible"){
      document.getElementById("itempageB").style.visibility = "hidden";
      document.getElementById("itempageB").style.position = "absolute";
    }
    console.log(document.getElementsByClassName("active")[0].id);
    if(document.getElementsByClassName("active")[0].id == "Home"){
      document.getElementsByClassName(document.getElementsByClassName("active")[0].id)[0].style.visibility = "hidden";
    document.getElementsByClassName(document.getElementsByClassName("active")[0].id)[0].style.position = "absolute";
    }
    document.getElementsByClassName("active")[0].className = "";
    el.className = "active";
    console.log(el.id)
    if(el.id == "Home"){
      document.getElementsByClassName(el.id)[0].style.visibility = "visible";
      document.getElementsByClassName(el.id)[0].style.position = "relative";
    }
}

var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
  showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  slides[slideIndex-1].style.display = "block";
}


function gotoitem(el, e){
  e.preventDefault();
  document.getElementById("itempageB").style.visibility = "visible";
  document.getElementById("itempageB").style.position = "relative";
  document.getElementsByClassName("active")[0].className = "";
  document.getElementById("Home").className = "active";
  console.log(document.getElementsByClassName("Home")[0])
  document.getElementsByClassName("Home")[0].style.visibility = "hidden";

  document.getElementsByClassName("Home")[0].style.position = "absolute";
  console.log(document.getElementsByClassName("Home")[0].visibility)
}