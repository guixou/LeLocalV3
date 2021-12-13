'use strict';


console.log("collabSlider charger")

var slide = new Array("public/images/training-image-01.jpg", "public/images/training-image-02.jpg", "public/images/training-image-03.jpg", "public/images/training-image-04.jpg");
var numero = 0;

function ChangeSlide(sens) {
    document.getElementById("collabSlide").src = slide[sens-1];
    document.getElementById("li1").classList.remove("actif");
    document.getElementById("li2").classList.remove("actif");
    document.getElementById("li3").classList.remove("actif");
    document.getElementById("li4").classList.remove("actif");
    document.getElementById("li"+sens).classList.add("actif");
}
