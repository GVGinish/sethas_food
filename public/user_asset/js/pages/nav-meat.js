// ========= header-nav-js ==========
function openNav() {
  
  document.getElementById('mySidenav').style.width = '320px';
  document.getElementById('meat_head').style.marginLeft = '0px';
}
function closeNav() {
  
  document.getElementById('mySidenav').style.width = '0';
  document.getElementById('meat_head').style.marginLeft= '0';
  document.body.style.backgroundColor = 'transparent';
}
$(document).ready(function() { 
    //   ========= header-scroll ===========
  $(window).on('scroll', function() {
      if($(window).scrollTop() > 250) {
          $('.header_main').addClass('header_active');
      } else {
          //remove the background property so it comes transparent again (defined in your css)
      $('.header_main').removeClass('header_active');
      }
  });
  //   ========= header-scroll-ends ===========
});