"use strict";
document.addEventListener("DOMContentLoaded", function () {
    //bien de click
    var button = document.getElementsByClassName('tam-giac');
    var ds = document.getElementsByClassName('danh-sach');
    for (var i = 0; i < button.length; i++) {
        button[i].onclick = function() {

            if(this.classList[1] === 'mau-trang')
            {
                this.classList.remove('mau-trang');
                var display = this.getAttribute('data-display');
                var contentDisplay = document.getElementById(display);
                contentDisplay.classList.remove('display');
            }
            else {
                for (var k = 0; k < button.length; k++) {
                    button[k].classList.remove('mau-trang');
                }
                this.classList.toggle('mau-trang');

                //
                var display = this.getAttribute('data-display');
                var contentDisplay = document.getElementById(display);
                for(var i = 0; i < ds.length; i++) {
                    ds[i].classList.remove('display');
                }
                contentDisplay.classList.add('display');
                // console.log(contentDisplay);
            }

        }


    }
}, false);