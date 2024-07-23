function openNav() {
  document.getElementById("fertilizerSidenav").style.width = "320px";
  document.getElementById("close-it").style.marginLeft = "0px";
}
function closeNav() {
  document.getElementById("fertilizerSidenav").style.width = "0";
  document.getElementById("close-it").style.marginLeft = "0";
  document.body.style.backgroundColor = "transparent";
}

$(document).ready(function () {

  //   ==== header-scroll ==== //
  $(window).on("scroll", function () {
    if ($(window).scrollTop() > 250) {
      $(".fertilizer_header").addClass("header_active");
    } else {
      $(".fertilizer_header").removeClass("header_active");
    }
  });

  // --banner--

  new Swiper(".fertilizer_container", {
    loop: true,
    slidesPerView: 1,
    centeredSlides: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
      delay: 3000,
    },
    on: {
      init: updSwiperNumericPagination,
      slideChange: updSwiperNumericPagination,
    },
  });

  var counted = 0;
  $(window).scroll(function () {
    var oTop = $("#counter").offset().top - window.innerHeight;
    if (counted == 0 && $(window).scrollTop() > oTop) {
      $(".count").each(function () {
        var $this = $(this),
          countTo = $this.attr("data-count");
        $({
          countNum: $this.text(),
        }).animate(
          {
            countNum: countTo,
          },

          {
            duration: 2000,
            easing: "swing",
            step: function () {
              $this.text(Math.floor(this.countNum));
            },
            complete: function () {
              $this.text(this.countNum);
            },
          }
        );
      });
      counted = 1;
    }
  });

  // -- testimonial --
  var testimonialAuthors = new Swiper(".testimonial_authors", {
    slidesPerView: 4,
    direction: "vertical",
    loop: true,
    freeMode: true,
    loopedSlides: 1,
    autoplay: {
      speed: 3000,
    },
  });

  new Swiper(".testimonial_author--details", {
    effect: "fade",
    slidesPerView: 2,
    autoplay: {
      speed: 3000
    }
  });
});

/* -- our team -- */

new Swiper(".our_team_section", {
  loop: true,
  autoplay: {
    delay: 2500,
    disableOnInteraction: false,
  },
  slidesPerView: 1,
  breakpoints: {
    768: {
      slidesPerView: 3,
    }
  }
});

// -- numeric-pagination --

function updSwiperNumericPagination() {
  this.el.querySelector(".swiper-counter").innerHTML =
    '<span class="count">' +
    (this.realIndex + 1) +
    '</span>/<span class="total">' +
    this.el.slidesQuantity +
    "</span>";
}

document.addEventListener("DOMContentLoaded", function () {
  document.querySelectorAll(".fertilizer_container").forEach(function (node) {
    node.slidesQuantity = node.querySelectorAll(".swiper-slide").length;
  });
});

/* -- header search modal -- */
document.addEventListener('DOMContentLoaded', function () {
  var searchIcon = document.getElementById('searchIcon');
  var searchModal = document.getElementById('searchModal');
  var closeButton = document.getElementById('closeButton');

  searchIcon.addEventListener('click', function (event) {
    event.preventDefault();
    searchModal.style.display = 'block';
  });

  closeButton.addEventListener('click', function () {
    searchModal.style.display = 'none';
  });

  // Close modal when clicking outside
  window.addEventListener('click', function (event) {
    if (event.target === searchModal) {
      searchModal.style.display = 'none';
    }
  });
});

/* -- footer -- */
var inputField = document.getElementById("footer_input_field");

inputField.addEventListener("focus", function () {
  document.querySelector(
    ".fertilizer_footer--form .input-group"
  ).style.borderBottom = "1px solid #ffffff";
  changeColor("#ff0000");
});

inputField.addEventListener("blur", function () {
  document.querySelector(
    ".fertilizer_footer--form .input-group"
  ).style.borderBottom = "1px solid #90957B";
});
