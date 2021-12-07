function change(el, e){
    e.preventDefault();
    if(document.getElementById("itempageB").style.visibility == "visible"){
      document.getElementById("itempageB").style.visibility = "hidden";
      document.getElementById("itempageB").style.position = "absolute";
    }
    console.log(document.getElementsByClassName("active")[0].id);
    if(document.getElementsByClassName("active")[0].id == "Home" || (document.getElementsByClassName("active")[0].id == "My account")|| (document.getElementsByClassName("active")[0].id == "My basket")|| (document.getElementsByClassName("active")[0].id == "All available items")|| (document.getElementsByClassName("active")[0].id == "Notifications")){
      document.getElementsByClassName(document.getElementsByClassName("active")[0].id)[0].style.visibility = "hidden";
    document.getElementsByClassName(document.getElementsByClassName("active")[0].id)[0].style.position = "absolute";
    }
    document.getElementsByClassName("active")[0].className = "";
    el.className = "active";
    console.log(el.id)
    if(el.id == "Home" || el.id =="My account" || el.id =="My basket"|| el.id =="All available items"|| el.id =="Notifications"){
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

  document.getElementsByClassName("mainpic")[0].src = el.src;
<<<<<<< HEAD
}

<<<<<<< Updated upstream
function addItem(el, e){
   document.getElementsByClassName("unselected")[0].src = document.getElementsByClassName("mainpic")[0].src;
   document.getElementsByClassName("unselected")[0].className = "selected";
}

function wishlist(el, e){
  document.getElementsByClassName("unselectedW")[0].src = document.getElementsByClassName("mainpic")[0].src;
  document.getElementsByClassName("unselectedW")[0].className = "selectedW";
}


function addbasquet(el, e){
  while(document.getElementsByClassName("selectedW").length != 0){
    document.getElementsByClassName("unselected")[0].src = document.getElementsByClassName("selectedW")[0].src;
   document.getElementsByClassName("unselected")[0].className = "selected";
   document.getElementsByClassName("selectedW")[0].className = "unselectedW";
  }
=======
function timer(){

  // Set the date we're counting down to
  var countDownDate = new Date("Jan 5, 2022 15:37:25").getTime();

    // Update the count down every 1 second
    var x = setInterval(function() {

    // Get today's date and time
    var now = new Date().getTime();

    // Find the distance between now and the count down date
    var distance = countDownDate - now;

    // Time calculations for days, hours, minutes and seconds
    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

    // Display the result in the element with id="demo"
    document.getElementById("demo").innerHTML = days + "d " + hours + "h "
    + minutes + "m " + seconds + "s ";

    // If the count down is finished, write some text 
    if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
    }
    }, 1000);
>>>>>>> Stashed changes
=======
>>>>>>> parent of 0ddb686 (wishlist and basquet working)
}