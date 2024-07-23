(function ($) {
  $(function () {

  var agSwiper = $('.default_blog--container');

  if (agSwiper.length > 0) {

    var sliderView = 1;
    var ww = $(window).width();
    if (ww >= 1700) sliderView = 2;
    if (ww <= 1700) sliderView = 2;
    if (ww <= 1560) sliderView = 2;
    if (ww <= 1400) sliderView = 2;
    if (ww <= 1060) sliderView = 2;
    if (ww <= 800) sliderView = 2;
    if (ww <= 560) sliderView = 1;
    if (ww <= 400) sliderView = 1;

    var swiper = new Swiper('.default_blog--container', {
      slidesPerView: sliderView,
      clickable: true,
      direction: "horizontal",
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
      spaceBetween: 20,
      loop: true,
      loopedSlides: 16,
      speed: 700,
      autoplay: true,
      autoplayDisableOnInteraction: true,
      centeredSlides: true,
      on: {
        init: function() {
          checkArrow();
        },
        resize: function () {
          checkArrow();
        }
      }
    });

    $(window).resize(function () {
      var ww = $(window).width();
      if (ww >= 1700) swiper.params.slidesPerView = 2;
      if (ww <= 1700) swiper.params.slidesPerView = 2;
      if (ww <= 1560) swiper.params.slidesPerView = 2;
      if (ww <= 1400) swiper.params.slidesPerView = 2;
      if (ww <= 1060) swiper.params.slidesPerView = 2;
      if (ww <= 800) swiper.params.slidesPerView = 2;
      if (ww <= 560) swiper.params.slidesPerView = 1;
      if (ww <= 400) swiper.params.slidesPerView = 1;
    });

    $(window).trigger('resize');

    var mySwiper = document.querySelector('.default_blog--container').swiper;

    // agSwiper.mouseenter(function () {
    //   mySwiper.autoplay.stop();
    //   console.log('slider stopped');
    // });

    // agSwiper.mouseleave(function () {
    //   mySwiper.autoplay.start();
    //   console.log('slider started again');
    // });
    function checkArrow() {
      var swiperPrev = document.querySelector('.swiper-button-prev');
      var swiperNext = document.querySelector('.swiper-button-next');
      if ( window.innerWidth < 1024  ) {
        console.log('Success', window.innerWidth);
        swiperPrev.style.display = 'block';
        swiperNext.style.display = 'block';
      } else {
        swiperPrev.style.display = 'none';
        swiperNext.style.display = 'none';
      }
    }
  }

  });
})(jQuery);