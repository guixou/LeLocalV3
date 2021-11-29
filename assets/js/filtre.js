'use strict';

document.addEventListener('DOMContentLoaded', function () {

    document.getElementById("filtre1").addEventListener('click', function(e){
        filtre(1)
    });

    document.getElementById("filtre2").addEventListener('click', function(e){
        filtre(2)
    });

    document.getElementById("filtre3").addEventListener('click', function(e){
        filtre(3)
    });

    document.getElementById("filtre4").addEventListener('click', function(e){
        filtre(4)
    });

    document.getElementById("filtre5").addEventListener('click', function(e){
        filtre(5)
    });

    

    function filtre(number) {
        const tableproduct1 = document.querySelectorAll(".product1");
        const tableproduct2 = document.querySelectorAll(".product2");
        const tableproduct3 = document.querySelectorAll(".product3");
        const tableproduct4 = document.querySelectorAll(".product4");
        const tableproduct5 = document.querySelectorAll(".product5");

        switch (number){
            case 1:
                console.log("filtre1");
                for (let i = 0; i < tableproduct1.length; i++) {
                    tableproduct1[i].classList.toggle("shophidden");
                };
                filtre1.classList.toggle("filtreActif");
                break;
            case 2:
                console.log("filtre2");
                for (let i = 0; i < tableproduct2.length; i++) {
                    tableproduct2[i].classList.toggle("shophidden");
                };
                filtre2.classList.toggle("filtreActif");
                break;
            case 3:
                console.log("filtre3");
                for (let i = 0; i < tableproduct3.length; i++) {
                    tableproduct3[i].classList.toggle("shophidden");
                };
                filtre3.classList.toggle("filtreActif");
                break;
            case 4:
                console.log("filtre4");
                for (let i = 0; i < tableproduct4.length; i++) {
                    tableproduct4[i].classList.toggle("shophidden");
                };
                filtre4.classList.toggle("filtreActif");
                break;
            case 5:
                console.log("filtre5");
                for (let i = 0; i < tableproduct5.length; i++) {
                    tableproduct5[i].classList.toggle("shophidden");
                };
                filtre5.classList.toggle("filtreActif");
                break;
            default:
                console.log("cpt")
    
        }
    }

});