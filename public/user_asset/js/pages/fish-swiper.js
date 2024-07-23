$(document).ready(function () {

  // == banner ==
  var fishBannerSlider = new Swiper('.fish_banner--container', {
    loop: true,
    autoplay: {
      speed: 3000,
      disableOnInteraction: false
    },
    pagination: {
      el: '.banner_pagination',
      clickable: true,
      renderBullet: function (index, className) {
        return '<span class="' + className + '">' + (index + 1) + '</span>';
      },
    },
  });

  fishBannerSlider.el.addEventListener("mouseenter", function () {
    fishBannerSlider.autoplay.stop();
  });

  // Resume autoplay on mouseleave
  fishBannerSlider.el.addEventListener("mouseleave", function () {
    fishBannerSlider.autoplay.start();
  });

  new Swiper('.customer_review_container', {
    loop: true,
    autoplay: {
      speed: 3000
    },
    slidesPerView: 3,
    direction: "vertical",
  });

  // == shop-products ==

  new Swiper('.shop_products--container', {
    loop: true,
    slidesPerView: 2,
    spaceBetween: 30,
    breakpoints: {
      480: {
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
      speed: 3000
    }
  });

 

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
    autoplay: {
      delay: 2000,
    },
    speed: 1000,
  });

  //   ========= header-scroll ===========
    $(window).on('scroll', function() {
      if($(window).scrollTop() > 250) {
          $('.fish_header--wrapper').addClass('header_active');
      } else {
          //remove the background property so it comes transparent again (defined in your css)
      $('.fish_header--wrapper').removeClass('header_active');
      }
  });
  //   ========= header-scroll-ends ===========
});

// Function to update Swiper slides based on active tab
function updateSwiperSlides(activeTab) {
  // Get the index of the active tab
  var activeIndex = activeTab.getAttribute('data-index');

  // Get the corresponding swiper slide
  var swiperSlide = document.querySelectorAll('.swiper-slide')[activeIndex];

  // Get the content of the active tab and update the swiper slide content
  var tabContent = activeTab.querySelector('.fish_product--wrapper').innerHTML;
  swiperSlide.innerHTML = tabContent;
}

document.querySelectorAll('.product_list').forEach(function(item) {
  item.addEventListener('click', function() {
      // Remove active class from all li items
      document.querySelectorAll('.product_list').forEach(function(li) {
          li.classList.remove('active');
      });
      // Add active class to the clicked li item
      this.classList.add('active');
        // Update Swiper slides based on the clicked tab
        updateSwiperSlides(this);
  });
});

const listItems = document.querySelectorAll('.product_list');

// Add click event listener to each list item
listItems.forEach(item => {
  item.addEventListener('click', function() {
    // Remove 'active' class from all list items
    listItems.forEach(li => {
      li.classList.remove('active');
    });

    // Add 'active' class to the clicked list item
    this.classList.add('active');

    // Get the corresponding div based on the 'rel' attribute of the clicked list item
    const targetId = this.querySelector('a').getAttribute('rel');
    const targetDiv = document.getElementById(targetId);

    // Hide all swiper slides
    const allSlides = document.querySelectorAll('.swiper-slide');
    allSlides.forEach(slide => {
      slide.classList.remove('transition'); // Remove transition class from all slides
      slide.style.transition = '0.5s ease-in-out'; // Hide slides
    });

    // Add transition class to the target swiper slide after a short delay
    setTimeout(() => {
      targetDiv.classList.add('transition');
    }, 50);

    // Show the target swiper slide
    targetDiv.style.opacity = '1';
  });
});
