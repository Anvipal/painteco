/**
 * File site.js.
 *
 * Theme site enhancements for a better user experience.
 *
 */
( function( $ ) {

    var breakpoint = 768;

    /**
     * Product carousel
     */
    function productCarousel() {
        // Enable carousel only for desktops
        if ( $(document).width() < breakpoint) {
            return false;
        }

        // Main page carousel
        $('.paint-products-item-cnt').slick({
            infinite: true,
            slidesToShow: 4,
            slidesToScroll: 1,
            speed: 'fast',
            arrows: true,
            appendArrows: $('.paint-products-item-nav'),
            prevArrow: $('.paint-products-item-nav-prev'),
            nextArrow: $('.paint-products-item-nav-next'),
            responsive: [
                {
                    breakpoint: 1200,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                        centerMode: true,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                        centerMode: true,
                    }
                },
                {
                    breakpoint: 768,
                    settings: 'unslick'
                }
            ]
        });
    }

    // Product carousel
    productCarousel();
    $( window ).resize(function() { productCarousel(); });

    $('.front-gallery-slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 1,
        speed: 'fast',
        arrows: true,
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 3
                }
            },{
                breakpoint: 992,
                settings: {
                    slidesToShow: 2
                }
            },{
                breakpoint: 768,
                settings: {
                    slidesToShow: 1
                }
            }
        ]
    });


    // Instantiate MixItUp:
    $('#paint-products-list').mixItUp({
        callbacks: {
            onMixStart: function(previousState, state) {
                if (".cat-" !== state.activeFilter.substring(0, 5)) {
                    return;
                }

                $('.product-overall-description div').hide();
                $('.product-overall-description ' + state.activeFilter).show();


                var selector = state.activeFilter.substring(5);
                if (selector !== '') {
                    $('.products-list-paint-options-items li').removeClass('active');
                    $('.products-list-paint-options-items .' + selector).addClass('active');

                    location.hash = '#' + state.activeFilter.substring(1);
                }
            }
        }
    });
    $('.paint-options-items a').click( function (e) {
        //e.preventDefault();
    });
    $('.products-list-paint-options-items a').click( function (e) {
        e.preventDefault();
    });

    $('#paint-products-list').mixItUp('filter', '.' + location.hash.slice(1));


    // Default flower background
    var flower = $('.flower');
    var flowerBg = $('.flower').css('background-image');

    // Show flower popup window
    $('.leaf > a').mouseover( function(e) {
        e.preventDefault();
        if ($(window).width()>=768) {
            flower.css('background-image', 'url('+ $(this).parents('.leaf').data('bg') +'), ' + flowerBg);
        }
    });

    // Show flower popup window
    $('.leaf > a').click( function(e) {
        e.preventDefault();
        $(this).next('.popup-info').fadeIn();
    });

    // Hide flower popup window
    $('.leaf-close').click( function(e) {
        e.preventDefault();
        $(this).parents('.popup-info').fadeOut('fast');
        flower.css('background-image', flowerBg);
    });

    // Reset flower BG on exit
    $('.flower').mouseleave( function(e) {
        flower.css('background-image', flowerBg);
    });


    // Slick carousel for gallery
    $('.testimonial-slider-items').slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: false,
        appendArrows: $('.team-slider-nav'),
        prevArrow: $('.team-slider-nav .prev'),
        nextArrow: $('.team-slider-nav .next'),
        autoplay: true,
        autoplaySpeed: 7000,
        adaptiveHeight: true
    });

    //Enable Fancybox
    $('.fancybox').fancybox();
    $('.fancybox-video').fancybox({
        arrows : false
    });

    // Color Picker
    ColorPicker.init();

    // Smooth scrolling to anchor on the same page
    // https://css-tricks.com/snippets/jquery/smooth-scrolling/
    $('a[href*="#"]:not([href="#"])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                return false;
            }
        }
    });


    LanguageSwitch.cfg.target = '.lang-switch';
    LanguageSwitch.init();
} )( jQuery );