$(document).ready(function() {
    $('.menu-header-item a').click(function(event) {
        event.preventDefault();

        $(".navbar-burger").toggleClass("is-active");
        $('.navbar-menu').toggleClass('is-active');


        $(this).addClass('active');

        $('.menu-header-item a.active').removeClass('active');
        let section = $(this).attr('href');
        let position = $(section).offset().top - 100;
        $('html, body').stop().animate(
            {scrollTop: position},
            600, function () {
                location.hash = $(section);
            });
        return false;

    });

    $('.cart a').click(function(event) {
        event.preventDefault();
        let section = $(this).attr('href');
        let position = $(section).offset().top - 100;
        $('html, body').stop().animate(
            {scrollTop: position},
            600, function () {
                location.hash = $(section);
            });
        return false;

    });


    var header = $('#header');
    var origOffsetY = header.offset().top + 20;
    var status = true;
    $(window).scroll(function () {
        var scrollDistance = $(window).scrollTop();

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

        $('.page-section').each(function(i) {
            if (($(this).position().top) - 110 <= scrollDistance) {
                $('.menu-header-item a.active').removeClass('active');
                $('.menu-header-item a').eq(i).addClass('active');
            }
        });

    }).scroll();

    $('#back-to-top').click(function (event) {
        event.preventDefault();
        $("html, body").animate({scrollTop: 0}, 1000);
        $('.menu-header a').first().addClass('active');
    });

    $(".navbar-burger").click(function() {

        $(".navbar-burger").toggleClass("is-active");
        $(".navbar-menu").toggleClass("is-active");

    });
});

