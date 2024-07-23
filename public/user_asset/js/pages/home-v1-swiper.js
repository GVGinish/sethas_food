$(document).ready(function() {

    // -- banner --

    new Swiper('.home_banner_container', {
        pagination: {
            el: '.home_banner_pagination',
            clickable: true,
            renderBullet: function(index, className) {
                return '<span class="' + className + '">' + (index + 1) + '</span>';
            },
        },
        autoplay: {
            speed: 3000
        }
    });

    // -- famous-brands --

    new Swiper('.famous_brands_container', {
        loop: true,
        cssMode: true,
        mousewheel: true,
        keyboard: true,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        autoplay: {
            speed: 3000
        }
    });

    // -- happy-customers --

    var customersGallery = new Swiper('.customers_gallery-thumbs', {
        spaceBetween: 0,
        slidesPerView: 3,
        loop: true,
        freeMode: true,
        loopedSlides: 3,
        watchSlidesVisibility: true,
        watchSlidesProgress: true,
        centeredSlides: true,
        breakpoints: {
            1200: {
                freeMode: false,
                direction: 'vertical',
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
            },
            375: {
                slidesPerView: 3,
            },
            320: {
                slidesPerView: 1,
            }

        }
    });
    var customersGallerytop = new Swiper('.customers_gallery-top', {
        spaceBetween: 10,
        loop: true,
        loopedSlides: 5,
        thumbs: {
            swiper: customersGallery,
        },
        autoplay: {
            speed: 3000
        }
    });

});