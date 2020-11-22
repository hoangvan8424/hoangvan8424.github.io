$(document).ready(function() {
    $('.menu-header a').click(function(event) {
        event.preventDefault();

        $('.menu-header a').removeClass('active');
        let section = $(this).attr('href');
        let position = $(section).offset().top;
        $('html, body').animate({scrollTop: position},1400,'easeInOutSine');
    });

    var header = $('#header');
    var origOffsetY = header.offset().top + 100;
    var status = true;
    $(window).scroll(function () {
        if($(window).scrollTop() >= origOffsetY) {
            if(status === true) {
                header.addClass('header-fix');
                status = false;
            }
        }
        else {
            if(status === false) {
                header.removeClass('header-fix');
                status = true;
            }
        }
    });

    $('#back-to-top').click(function (event) {
        event.preventDefault();
        $("html, body").animate({scrollTop: 0}, 1000);
        $('.menu-header a').first().addClass('active');
    });
});