$(document).ready(function () {
  
  new Swiper('.blog_details_v2', {
    loop: true,
    paginationClickable: true,
    spaceBetween: 30,
    slidesPerView: 3,
    breakpoints: {
      992: {
        slidesPerView: 3
      },
      768: {
        slidesPerView: 2
      },
      320: {
        slidesPerView: 1
      }
    },
    pagination: {
      el: '.swiper-pagination',
      type: 'progressbar',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    autoplay: {
      delay: 3000,
    },
    on: {
      init:        updSwiperNumericPagination,
      slideChange: updSwiperNumericPagination
    }
  });

});

// -- numeric-pagination --

function updSwiperNumericPagination() {
  this.el.querySelector( '.swiper-counter' )
    .innerHTML = '<span class="count">'+ (this.realIndex + 1) +'</span>/<span class="total">'+ this.el.slidesQuantity +'</span>';
}

document.addEventListener( 'DOMContentLoaded', function () {
  document.querySelectorAll( '.blog_details_v2' ).forEach( function( node ) {
    node.slidesQuantity = node.querySelectorAll( '.swiper-slide' ).length;
  });
});
