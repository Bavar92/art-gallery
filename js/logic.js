$ = jQuery;


$(document).ready(function () {
    var width = document.body.clientWidth;

    $("#menuOpen").click(function (e) {
        $(this).toggleClass("opened");
    });
    if (width <= 1024) {
        $("#mainMenu .menu-item-has-children > a").append("<span></span>");
        $("#mainMenu .menu-item-has-children span").click(function () {
            $(this).parent().next().slideToggle(300);
            $(this).toggleClass("active");
            return false;
        });
    }

    if (width >= 1025) {
        var c, currentScrollTop = 0,
            navbar = $('header');

        $(window).scroll(function () {
            var a = $(window).scrollTop();
            var b = navbar.height();

            currentScrollTop = a;

            if (c < currentScrollTop && a > b + b) {
                navbar.addClass("scrollUp");
            } else if (c > currentScrollTop && !(a <= b)) {
                navbar.removeClass("scrollUp");
            }
            c = currentScrollTop;
        });
    }


    //WPCF7
    $(this).on('click', '.wpcf7-not-valid-tip', function () {
        $(this).prev().trigger('focus');
        $(this).fadeOut(500, function () {
            $(this).remove();
        });
    });

    $(window).bind("resize", function () {

    });

    if (!$(".woocommerce-checkout")[0]) {
        // $('select').selectric({
        //     disableOnMobile: false
        // });
        $(".wpcf7-form select option:first-of-type").attr('selected', 'true').attr('disabled', 'disabled').attr('value', '0');
    }

    $('p').each(function () {
        var $this = $(this);
        if ($this.html().replace(/\s|&nbsp;/g, '').length == 0)
            $this.remove();
    });

    var acc = $('.right .learnMore');
    acc.click(function () {
        if ($(this).hasClass('opened')) {
            acc.removeClass('opened').text('Докладніше');
            $('.right .fullInfo').stop().slideUp();
        }
        else {
            $('.right .fullInfo').stop().slideUp();
            $(this).prev().stop().slideDown(500);
            acc.removeClass('opened');
            $(this).addClass('opened').text('Повернути');
        }
    });


});

$(window).on('load', function () {
    $('.events.grid').masonry({
        columnWidth: 592,
        gutter: 32,
        percentPosition: true,
        isFitWidth: false,
        itemSelector: '.grid-item'
    });
    if ($(".homeSlider").length > 0) {
        var swiper = new Swiper('.homeSlider', {
            direction: 'vertical',
            slidesPerView: 3,
            spaceBetween: 24,
            mousewheel: true,
            pagination: {
                el: '.swiper-pagination',
                type: 'progressbar',

                clickable: true
            }
        });
    }
});

