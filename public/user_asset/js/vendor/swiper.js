$(document).ready(function () {

  // Swiper: Widget-Slider
  
  new Swiper(".widget_viewed", {
    loop: true,
    paginationClickable: true,
    spaceBetween: 10,
    breakpoints: {
      480: {
        slidesPerView: 1
      }
    },
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
    autoplay: {
      delay: 3000,
    },
  });

});
