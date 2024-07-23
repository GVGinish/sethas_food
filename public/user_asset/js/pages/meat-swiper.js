$(document).ready(function () {

  // -- banner --

  new Swiper('.meat_banner--container', {
    loop: true,
    spaceBetween: 10,
    slidesPerView: 1,
    centeredSlides: true,
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    autoplay: {
      delay: 3000,
    },
    on: {
      init: updSwiperNumericPagination,
      slideChange: updSwiperNumericPagination
    }
  });

  // -- raw-meat-production --

  new Swiper('.raw_meat_container', {
    loop: true,
    loopFillGroupWithBlank: true,
    breakpoints: {
      1200: {
        slidesPerView: 4
      },
      992: {
        slidesPerView: 3
      },
      576: {
        slidesPerView: 2
      },
      320: {
        slidesPerView: 1
      }
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    autoplay: {
      delay: 3000,
    },
  });


  // -- raw-meat-production --

  new Swiper('.brands_slider_container', {
    loop: true,
    loopFillGroupWithBlank: true,
    breakpoints: {
      1200: {
        slidesPerView: 5
      },
      992: {
        slidesPerView: 4
      },
      576: {
        slidesPerView: 3
      },
      320: {
        slidesPerView: 2
      }
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    autoplay: {
      delay: 3000,
    },
    speed: 2000,
  });

});

// -- numeric-pagination --

function updSwiperNumericPagination() {
  this.el.querySelector( '.swiper-counter' )
    .innerHTML = '<span class="count">'+ (this.realIndex + 1) +'</span>/<span class="total">'+ this.el.slidesQuantity +'</span>';
}

document.addEventListener( 'DOMContentLoaded', function () {
  document.querySelectorAll( '.meat_banner--container' ).forEach( function( node ) {
    node.slidesQuantity = node.querySelectorAll( '.swiper-slide' ).length;
  });
});
