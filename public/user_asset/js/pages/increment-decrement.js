$(document).ready(function() {
  const minus = $('.quantity__minus');
  const plus = $('.quantity__plus');
  const input = $('.quantity__input');
  plus.click(function(e) {
    console.log('hii');
    e.preventDefault();
    var value = $(this).siblings('.quantity__input').val();
    value++;
    $(this).siblings('.quantity__input').val(value);
  });
  minus.click(function(e) {
    e.preventDefault();
    var value = $(this).siblings('.quantity__input').val();
    value--;
    $(this).siblings('.quantity__input').val(value);
  })
});
