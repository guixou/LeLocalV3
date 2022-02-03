'use strict';


document.addEventListener('DOMContentLoaded', function () {
    console.log("page charger")

    let slide = new Array(
        "public/images/slider/slider-1.jpeg",
        "public/images/slider/slider-2.jpeg",
        "public/images/slider/slider-3.jpeg",
        "public/images/slider/slider-4.jpeg",
        "public/images/slider/slider-5.jpeg",
        "public/images/slider/slider-6.jpeg",
        "public/images/slider/slider-7.jpeg",
        "public/images/slider/slider-8.jpeg",
        "public/images/slider/slider-9.jpeg",
        "public/images/slider/slider-10.jpeg",
        "public/images/slider/slider-11.jpeg",
        "public/images/slider/slider-12.jpeg",
        "public/images/slider/slider-13.jpeg",
        "public/images/slider/slider-14.jpeg",
        "public/images/slider/slider-15.jpeg",
        );
    let numero = 2;
    let nextNumero = 3;
    let backNumero = 1
    const next = document.getElementById("sliderSuivant");
    const back = document.getElementById("sliderPrecedent");

    next.addEventListener('click', function(event) {
        ChangeSlide(+1);
    });

    back.addEventListener('click', function(event) {
        ChangeSlide(-1);
    });

    function ChangeSlide(sens) {
        numero = numero + sens;
        nextNumero = nextNumero + sens;
        backNumero = backNumero + sens;

        if (numero < 0)
            numero = slide.length - 1;
        if (numero > slide.length - 1)
            numero = 0;

        if (nextNumero < 0)
            nextNumero = slide.length - 1;
        if (nextNumero > slide.length - 1)
            nextNumero = 0;

        if (backNumero < 0)
            backNumero = slide.length - 1;
        if (backNumero > slide.length - 1)
            backNumero = 0;
    
        document.getElementById("slide").src = slide[numero];
        document.getElementById("nextSlide").src = slide[nextNumero];
        document.getElementById("backSlide").src = slide[backNumero];
    }
});
    
