$(document).ready(function() {
  new Swiper('.our-teams-swiper-container', {
    loop: true,
    spaceBetween: 30,
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
    autoplay: true,
    speed: 2000,
    autoplay: {
      delay: 3000,
    }
  });
});