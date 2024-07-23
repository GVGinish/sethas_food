// ===== Scroll to Top ==== 
$(window).scroll(function() {
	if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
			$('#return-to-top').fadeIn(200);    // Fade in the arrow
	} else {
			$('#return-to-top').fadeOut(200);   // Else fade out the arrow
	}
});
$('#return-to-top').click(function() {      // When arrow is clicked
	$('body,html').animate({
			scrollTop : 0                       // Scroll to top of body
	}, 500);
});

// scroll to shop by product section
$(document).ready(function () {
  $("#scroll-to-shop-by-product").click(function () {
    // When scroll button is clicked
    var middleSectionOffset = $("#scroll-section").offset().top; // Get the offset of the middle section from the top
    $("html, body").animate(
      {
        scrollTop: middleSectionOffset, // Scroll to the middle section
      },
      500
    );
  });

  $(window).scroll(function () {
    if ($(this).scrollTop() >= 50) {
      // If page is scrolled more than 50px
      $(".scroll-btn--wrapper").fadeIn(200); // Fade in the scroll button
    } else {
      $(".scroll-btn--wrapper").fadeOut(200); // Else fade out the scroll button
    }
  });
});