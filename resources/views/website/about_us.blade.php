@extends('website.layout2')
@section('link')
      <link rel="shortcut icon" href="{{ asset('user_asset/images/vegetable/veg-logo.png') }}') }}" type="image/x-icon">
      <link rel="stylesheet"  href="{{ asset('user_asset/css/layouts/grocery-nav-banner.css') }}">
      <link rel="stylesheet"  href="{{ asset('user_asset/css/layouts/grocery-footer.css') }}">
      <link rel="stylesheet"  href="{{ asset('user_asset/css/fonts/grocery-fonts.css') }}">
      <link rel="stylesheet"  href="{{ asset('user_asset/css/vendor/bootstrap.min.css') }}">
      <link rel="stylesheet"  href="{{ asset('user_asset/css/vendor/swiper.min.css') }}">
      <link rel="stylesheet"  href="{{ asset('user_asset/css/vendor/aos.min.css') }}">
      <link rel="stylesheet"  href="{{ asset('user_asset/css/pages/grocery.css') }}">
      <link rel="stylesheet"  href="{{ asset('user_asset/css/main.css') }}">
      <link rel="stylesheet"  href="{{ asset('user_asset/css/layouts/default-nav.css') }}">
      <link rel="stylesheet"  href="{{ asset('user_asset/css/layouts/default-footer.css') }}">
      <link rel="stylesheet"  href="{{ asset('user_asset/css/themes/common.css') }}">
      <link rel="stylesheet"  href="{{ asset('user_asset/css/components/common-banner.css') }}">
      <link rel="stylesheet"  href="{{ asset('user_asset/css/pages/about-us.css') }}">
@endsection
@section('content')
         <section class="common_banner--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h1 class="banner_title">About Us</h1>
                     <nav class="breadcum_wrapper">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                           <li class="breadcrumb-item active">About Us</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </section>
         <section class="about_us--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <div class="about_us_info--wrapper">
                        <h2 class="about_us--title">About Us</h2>
                        <p class="about-para">We at Sithas foods Manufacture and Supply premium quality products sought after by consumers while providing the highest levels of service to its retail customers. Following a path of exceeded expectations and consistent, high-quality products, Sithas has forged the strength of its reputation through numerous years of development and innovation. Headquartered in Cochin, Kerala, which is often referred to as God's own country, we have over the years established a solid network across the world that enables us to deliver the best quality food products to our customers.</p>
                        <p class="about-para">Sithas is responsible for supplying best quality products to the market. Our strength and publicity are through customer satisfaction. Make a healthy food available to all citizens at affordable prices by not compromising its quality. Our company fully understands the importance of maintaining good relationship with our customers for fulfilling their goals and achieving success in the global marketplace.
                        </p>
                        <p class="about-para">Since its inception, the company has been focusing on providing the finest quality food Products. Our services comply with international standards and we are highly committed to quality service, timely delivery, competitive pricing and total customer satisfaction. The company employ highly skilled and experienced work force in all the departments which include procurement management, packaging etc. What keeps us going is our ability to adapt to global challenges, in depth product knowledge, adherence to the highest standards, worldwide network, innovation, customer centric approach and a growing consumer base.
                        </p>
                        </p>
                        <div class="about_us_icons--wrapper">
                           <div class="about_us--icons">
                              <img src="{{ asset('user_asset/images/svg/about-icon1.svg') }}" alt="icon" data-aos="zoom-in">
                              <span class="icon_text">8 years</span>
                           </div>
                           <div class="about_us--icons">
                              <img src="{{ asset('user_asset/images/svg/about-icon 3.png') }}" alt="icon" data-aos="zoom-in" data-aos-delay="200">
                              <span class="icon_text">65 products</span>
                           </div>
                           <div class="about_us--icons">
                              <img src="{{ asset('user_asset/images/svg/about-icon1 (2).png') }}" alt="icon" data-aos="zoom-in" data-aos-delay="400">
                              <span class="icon_text">2500 shops</span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="about_us_img--wrapper">
                        <div class="about_img1--wrapper" data-aos="fade-down">
                           <img src="{{ asset('user_asset/images/about-us/about1.png') }}" alt="about1">
                        </div>
                        <div class="about_img2--wrapper" data-aos="fade-right" data-aos-delay="200">
                           <img src="{{ asset('user_asset/images/about-us/about2.png') }}" alt="about2">
                        </div>
                        <div class="about_img3--wrapper" data-aos="fade-left" data-aos-delay="400">
                           <img src="{{ asset('user_asset/images/about-us/about3.png') }}" alt="about3">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!--about 2 start-->
         <section class="policy_wrapper about2">
            <ul class="policy_list--wrapper">
               <li class="policy_list">
                  <div class="policy_icon">
                     <img data-src="{{ asset('user_asset/images/svg/fresh-icon.png') }}" alt="policy-img" class=" lazyloaded" width="55" height="55" src="{{ asset('user_asset/images/svg/fresh-icon.png') }}">
                  </div>
                  <span class="policy_heading">Fresh Products</span>
               </li>
               <li class="policy_list">
                  <div class="policy_icon">
                     <img data-src="{{ asset('user_asset/images/svg/policy-img1.png') }}" alt="policy-img" class=" lazyloaded" width="66" height="45" src="{{ asset('user_asset/images/svg/policy-img1.png') }}">
                  </div>
                  <span class="policy_heading">Safe Shipping</span>
               </li>
               <li class="policy_list">
                  <div class="policy_icon">
                     <img data-src="{{ asset('user_asset/images/svg/policy-img3.svg') }}" alt="policy-img" class=" lazyloaded" width="43" height="50" src="{{ asset('user_asset/images/svg/policy-img3.svg') }}">
                  </div>
                  <span class="policy_heading">Secure Payment</span>
               </li>
               <li class="policy_list">
                  <div class="policy_icon">
                     <img data-src="{{ asset('user_asset/images/svg/policy-img2.svg') }}" alt="policy-img" class=" lazyloaded" width="46" height="46" src="{{ asset('user_asset/images/svg/policy-img2.svg') }}">
                  </div>
                  <span class="policy_heading">Support Customer</span>
               </li>
            </ul>
         </section>
         <!--sbout 2 end-->
         <section class="ads_wrapper">
            <div class="ads_sideimg2--wrapper aos-init aos-animate" data-aos="fade-left" data-aos-delay="600">
               <img data-src="{{ asset('user_asset/images/vegetable/fresh-fruits4.png') }}" alt="ads" class=" ls-is-cached lazyloaded" width="392" height="541" src="{{ asset('user_asset/images/vegetable/fresh-fruits4.png') }}">
            </div>
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <div class="ads_left--wrapper aos-init aos-animate" data-aos="fade-right">
                        <a href="#">
                        <img data-src="{{ asset('user_asset/images/grocery/ads-img1.png') }}" alt="ads" class=" lazyloaded" width="540" height="568" src="{{ asset('user_asset/images/grocery/ads-img1.png') }}">
                        </a>
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="ads_right--wrapper aos-init aos-animate" data-aos="fade-left" data-aos-delay="200">
                        <div class="ads_top--img">
                           <a href="#">
                           <img data-src="{{ asset('user_asset/images/grocery/ads-img2 (1).png') }}" alt="ads" class=" lazyloaded" width="538" height="284" src="{{ asset('user_asset/images/grocery/ads-img2 (1).png') }}">
                           </a>
                        </div>
                        <div class="ads_bottom--img">
                           <a href="#">
                           <img data-src="{{ asset('user_asset/images/grocery/ads-img3.png') }}" alt="ads" class=" lazyloaded" width="538" height="259" src="{{ asset('user_asset/images/grocery/ads-img3.png') }}">
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
    @endsection
    @section('script')
      <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}">

      </script>
      <script src="{{ asset('user_asset/js/vendor/jquery-3.5.1.min.js') }}"></script>
      <script src="{{ asset('user_asset/js/vendor/jquery-3.5.1.min.js') }}"></script>
      <script src="{{ asset('user_asset/js/vendor/bootstrap.min.js') }}"></script>
      <script src="{{ asset('user_asset/js/vendor/bowser.min.js') }}"></script>
      <script src="{{ asset('user_asset/js/vendor/lazysizes.min.js') }}"></script>
      <script src="{{ asset('user_asset/js/vendor/swiper.min.js') }}"></script>
      <script src="{{ asset('user_asset/js/vendor/aos.min.js') }}"></script>
      <script src="{{ asset('user_asset/js/pages/about-us.js') }}"></script>
      <script src="{{ asset('user_asset/js/vendor/aos.init.js') }}"></script>
      <script src="{{ asset('user_asset/js/pages/grocery-slider.js') }}"></script>
      <script src="{{ asset('user_asset/js/main.js') }}"></script>
@endsection