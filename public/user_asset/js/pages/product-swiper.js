$(document).ready(function () {

  var galleryThumbs = new Swiper('.gallery-thumbs', {
    spaceBetween: 10,
    slidesPerView: 4,
    loop: true,
    freeMode: true,
    loopedSlides: 4,
    watchSlidesVisibility: true,
    watchSlidesProgress: true,
    breakpoints: {
      1600: {
        slidesPerView: 4,
        spaceBetween: 20,
      }
    },
  });
  var galleryTop = new Swiper('.gallery-top', {
    spaceBetween: 10,
    loop: true,
    loopedSlides: 5, 
    thumbs: {
      swiper: galleryThumbs,
    },
  });

});