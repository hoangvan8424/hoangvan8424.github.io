document.addEventListener("DOMContentLoaded", function () {
    let button = document.getElementById("push");
    // let background = document.querySelector(".background");
    let container = document.querySelector(".st-container");
    let menu = document.querySelectorAll('.menu');
    let content = document.querySelector('.content');
    let main = document.querySelector('.main');
    let background = document.querySelector('.background');
    let buttonSlideAlong = document.getElementById('slide-along');

    // Push
    button.onclick = function() {
        container.classList.add('move-left');
        menu[0].classList.add('d-menu');
        background.classList.add('display');
    };

    background.onclick = function() {
        container.classList.remove('move-left');
        menu[0].classList.remove('d-menu');
        background.classList.remove('display');
        menu[2].classList.remove('d-menu-3');
        content.classList.remove('move-left');
        menu[3].classList.remove('d-menu-4');
        container.classList.remove('move');
    };


    // Slide on top
    let buttonSlideOnTop = document.getElementById("slide-on-top");
    buttonSlideOnTop.onclick = function () {
        container.classList.add('move');
        background.classList.add('display');
        menu[2].classList.add('d-menu-3');
    };

    // Reveal
    let buttonReveal = document.getElementById('reveal');
    buttonReveal.onclick = function () {
        background.classList.add('display');
        content.classList.add('move-left');
        menu[1].classList.add('d-menu-2');
    };

    // Slide Along
    buttonSlideAlong.onclick = function () {
        background.classList.add('display');
        content.classList.add('move-left');
        menu[3].classList.add('d-menu-4');
    };

}, false);

