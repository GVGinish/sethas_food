$(document).ready(function(){new Swiper('.grocery_banner--container',{loop:true,pagination:{el:'.grocery_pagination',clickable:true},breakpoints:{992:{slidesPerView:1},768:{slidesPerView:2},320:{slidesPerView:1}},autoplay:{delay:3000,}});new Swiper('.featured_product--container',{slidesPerView:4,spaceBetween:30,loop:true,freeMode:true,breakpoints:{1680:{slidesPerView:4,spaceBetween:37},1366:{slidesPerView:4},992:{slidesPerView:3},768:{slidesPerView:2},320:{slidesPerView:1}},autoplay:{delay:3000,}});new Swiper('.customer-review-swiper',{loop:true,pagination:{el:'.grocery_pagination',clickable:true},breakpoints:{992:{slidesPerView:3,centeredSlides:true,},768:{slidesPerView:2},320:{slidesPerView:1}},autoplay:{delay:3000,}});$('.scroll_text').click(function(){$("html, body").animate({scrollTop:"0"},1500);});});