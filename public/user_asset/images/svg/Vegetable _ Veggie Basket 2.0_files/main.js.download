// browser detect js
$(document).ready(function ($) {
  
  var currentBrowser =
  bowser.name.toLowerCase() + bowser.version.split(".").join("-");
  $("body").addClass(currentBrowser);

  if (window.innerWidth < 992) {
    $('.nav-item .linked').click('on', function() {
      $(this).siblings('ul.nav-item').toggleClass('dropdown');
    });
  }

  // ----==== side nav-bar
  $('.linked-dropdown').click('on', function() {
    $(this).parent('li').toggleClass('active');
  });
  
});
