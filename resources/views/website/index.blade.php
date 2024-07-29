
@extends('website.layout')

      @section('link')
      <link rel="stylesheet" href="{{ asset('user_asset/css/vendor/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/vendor/swiper.min.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/vendor/aos.min.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/main.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/layouts/default-nav.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/layouts/veg-nav.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/layouts/veg-footer.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/themes/common.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/themes/button.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/pages/vegetable.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/fonts/veggie-fonts.css')}}">
      @endsection

    @section('content')
      <div class="vegetable_page--wrapper">
         <header class="vegetable_header">
            <nav class="navbar navbar_veg--header navbar-expand-lg">
               <a class="navbar-brand" href="{{ route('index')}}">
               <img data-src="{{ asset('user_asset/images/vegetable/veg-logo.png') }}" alt="logo" class="lazyload" width="164" height="165">
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon">
               <img data-src="{{ asset('user_asset/images/svg/menu-black.svg')}}" alt="menu-icon" class="lazyload hamburger_menu" width="30" height="30">
               <img data-src="{{ asset('user_asset/images/svg/plus.svg')}}" alt="menu-icon" class="lazyload cross_image" width="26" height="26">
               </span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <ul class="navbar-nav veg_navbar--nav">
                     <li class="nav-item active ">
                        <a class="nav-link linked" href="{{ route('index')}}">HOME </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('about_us')}}" >ABOUT US</a>
                     </li>
                     <li class="nav-item sub-menu">
                        <a class="nav-link linked" href="#">Products <span>&#9660;</span></a>
                        <ul class="nav-item">
                           <li><a class="nav-link" href="{{ route('Products',['id'=>'Chips'])}}">Chips</a></li>
                           <li><a class="nav-link" href="{{ route('Products',['id'=>'Fried'])}}">Fried</a></li>
                           <li><a class="nav-link" href="{{ route('Products',['id'=>'Mixture'])}}">Mixture</a></li>
                           <li><a class="nav-link" href="{{ route('Products',['id'=>'Sweets'])}}">Sweet</a></li>
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('Products',['id'=>'All'])}}">SHOP</a>
                  
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact')}}">Contact Us</a>
                     </li>
                     <ul>
                        <li class="nav-item sub-menu aa">
                           <a href="{{ route('website_login_page')}}">
                           <img data-src="{{ asset('user_asset/images/svg/profile-Title.png') }}" alt="user" class="lazyload" width="20" height="20">
                           <span style="color: #000;">&#9660;</span>
                           </a>
                           <ul class="nav-item">
                              <li><a class="nav-link" href="{{ route('website_login_page')}}"><img src="{{ asset('user_asset/images/svg/log.png') }}"> Login</a></li>
                              <li><a class="nav-link" href="{{ route('register')}}"><img src="{{ asset('user_asset/images/svg/register.png') }}"> Register</a></li>
                              @auth
                                 <li><a class="nav-link" href="{{ route('Profile') }}"><img src="{{ asset('user_asset/images/svg/profile.png') }}"> Profile</a></li>
                                 <li><a class="nav-link" href="{{ route('Order') }}"><img src="{{ asset('user_asset/images/svg/12121.png') }}"> My Order</a></li>
                              @endauth
                           </ul>
                        </li>
                     </ul>
                  </ul>
                  <div class="icons_menu--btns">
                     <!-- <a href="javascript:void(0)" class="search_link" data-toggle="modal" data-target="#vegetableSearchModal">
                     <span class="veggie-search icon"></span>
                     </a> -->
                     @auth
                     <a href="{{ route('Cart')}}" class="cart_link">
                     <span class="veggie-cart icon"></span>
                     <span class="cart_count">
                     <span>{{ App\models\CartModel::where('user_id',Auth::user()->user_id)->where('status','New')->count() }}</span>
                     </span>
                     </a>
                     @endauth
                  </div>
               </div>
            </nav>
         </header>
         <section class="vegetable_banner--wrapper">
            <div class="container-fluid">
               <div class="vegetable_custom--container">
                  <div class="row">
                     <div class="col-lg-6 veg_banner_left--col">
                        <div class="healty_living--title">
                           <span class="green_quality--title quality_title1 fry">Chips</span>
                           <span class="green_quality--title fry chips">PACKETS OF <br>Crispiness</span>
                        </div>
                        <p>Planning a tea snack or party is a lot easier with Sithas range of chips, fries and candies now available online.
                        </p>
                        <div class="green_quality_facts--wrapper">
                           <div class="green_quality--facts">
                              <div class="green_quality--imgs">
                                 <img data-src="{{ asset('user_asset/images/vegetable/healthy-icons.png') }}" alt="green-icons" class="ls-is-cached lazyloaded" width="145" height="134" src="{{ asset('user_asset/images/vegetable/healthy-icons.png') }}">
                              </div>
                           </div>
                           <a style="margin-left: 1.5rem;" href="{{ route('Products',['id' => 'Chips'])}}" class="veg_btn btn22 mixturestyleone mix-btn">
                           shop now
                           <img data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="24" height="20" src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">
                           </a>
                        </div>
                        <div class="banner_side--fruits" data-aos="fade-right">
                           <img src="{{ asset('user_asset/images/vegetable/veg-banner-fruit.png') }}" alt="fruits">
                        </div>
                     </div>
                     <div class="col-lg-6 veg_banner_right--col">
                        <span class="vegetable_bg--text">Snacks</span>
                        <div class="banner_veg--img">
                           <img data-src="{{ asset('user_asset/images/vegetable/1.png') }}" alt="vegetable" class="lazyload" width="1083" height="1085">
                        </div>
                        <div class="banner_orange--wrapper" data-aos="fade-left">
                           <img src="{{ asset('user_asset/images/vegetable/banner-orange.png') }}" alt="orange">
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="banner_social--media">
               <a href="https://www.facebook.com/" target="_blank" class="banner_social--icons">
               <img data-src="{{ asset('user_asset/images/svg/veg-fb.svg')}}" alt="fb" class="lazyload" width="32" height="32">
               </a>
               <a href="https://www.instagram.com" target="_blank" class="banner_social--icons">
               <img data-src="{{ asset('user_asset/images/svg/instagram.svg')}}" alt="insta" class="lazyload" width="32" height="32">
               </a>
               <a href="https://www.twitter.com" target="_blank" class="banner_social--icons">
               <img data-src="{{ asset('user_asset/images/svg/veg-twitter.svg')}}" alt="twitter" class="lazyload" width="32" height="32">
               </a>
               <a href="https://www.whatsapp.com" target="_blank" class="banner_social--icons">
               <img data-src="{{ asset('user_asset/images/svg/whatsapp.svg')}}" alt="whatsapp" class="lazyload" width="32" height="32">
               </a>
            </div>
            <div class="banner_ecllipse--fruits">
               <img data-src="{{ asset('user_asset/images/vegetable/sidenuts.png') }}" alt="nuts" class="lazyload" width="330" height="486">
            </div>
         </section>
         <section class="green_quality--wrapper">
            <div class="container-fluid">
               <div class="row fried-reverse">
                  <div class="col-lg-6 green_quality--col1">
                     <div class="green_quality--img">
                        <img data-src="{{ asset('user_asset/images/vegetable/green-quality.png') }}" alt="vegetables" class="lazyload" width="1018" height="697">
                     </div>
                  </div>
                  <div class="col-lg-6 green_quality--col2">
                     <span class="green_quality--title quality_title1 fry">FRIED</span>
                     <span class="green_quality--title fry">PACKETS OF <br>HAPPINESS</span>
                     <p class="mixturestyleone1 fry">Enjoy variety of vacuum fried snacks from huge variety of traditional snacks to cherish your taste buds.</p>
                     <div class="green_quality_facts--wrapper">
                        <div class="green_quality--facts">
                           <div class="green_quality--imgs">
                              <img data-src="{{ asset('user_asset/images/vegetable/green-quality-icon.png') }}" alt="green-icons" class="lazyload" width="145" height="133">
                           </div>
                        </div>
                        <a href="{{ route('Products',['id' => 'Fried'])}}" class="veg_btn veg_btn2">
                        shop now
                        <img data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class="lazyload" width="24" height="20">
                        </a>
                     </div>
                     <div class="full_orange--wrapper" data-aos="fade-left">
                        <img src="{{ asset('user_asset/images/vegetable/orange-full.png') }}" alt="orange">
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="healthy_fruits--wrapper">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-6 ">
                     <span class="green_quality--title qlty quality_title1 fry">Mixture</span>
                     <span class="green_quality--title qlty mix">PACKETS OF <br>HAPPINESS</span>
                     <p class="mixturestyleone fry">Enjoy combination of various ingredients such as peanuts, cashews, and lentils, and is often flavored with spices.</p>
                     <div class="green_quality_facts--wrapper">
                        <div class="green_quality--facts">
                           <div class="green_quality--imgs">
                              <img data-src="{{ asset('user_asset/images/vegetable/healthy-icons.png') }}" alt="green-icons" class="lazyload mixturestyleone" width="145" height="134">
                           </div>
                        </div>
                        <a href="{{ route('Products',['id' => 'Mixture'])}}" class="veg_btn btn22 mixturestyleone mix-btn">
                        shop now
                        <img data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class="lazyload" width="24" height="20">
                        </a>
                     </div>
                  </div>
                  <div class="col-lg-6 healthy_fruits--col2">
                     <div class="healthy_fruits--img">
                        <img data-src="{{ asset('user_asset/images/vegetable/3.png') }}" alt="vegetables" class="lazyload" width="970" height="869">
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="organic_vegetables--wrapper">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-6 organic_vegetables--col1 order-2 order-lg-1">
                     <div class="organic_veg--img" data-aos="fade-right">
                        <img data-src="{{ asset('user_asset/images/vegetable/oraganic-veg-1.png') }}" alt="vegetable" class="lazyload" width="626" height="752">
                     </div>
                     <div class="organic_vegetables--img">
                        <img data-src="{{ asset('user_asset/images/vegetable/4.png') }}" alt="vegetables" class="lazyload" width="725" height="561">
                     </div>
                  </div>
                  <div class="col-lg-6 organic_vegetables--col2 order-1 order-lg-2" >
                     <span class="green_quality--title organic_title1" style="margin-left: -0.5rem;">SWEETS</span>
                     <span class="green_quality--title organic_title2 sweet-packet " style="margin-left: -0.5rem;">PACKETS OF<br>TEMPTS</span>
                     <p>Sithas beyond Snacks brings to you the highest quality Sweet, prepared using the best Products.</p>
                     <div class="green_quality_facts--wrapper">
                        <div class="green_quality--facts">
                           <div class="green_quality--imgs">
                              <img data-src="{{ asset('user_asset/images/vegetable/organic-veg-icons.png') }}" alt="green-icons" class="lazyload" width="145" height="133">
                           </div>
                        </div>
                        <a href="{{ route('Products',['id' => 'Sweets'])}}" class="veg_btn">
                        shop now
                        <img data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class="lazyload" width="24" height="20">
                        </a>
                     </div>
                     <div class="full_orange--wrapper" data-aos="fade-left">
                        <img src="{{ asset('user_asset/images/vegetable/organic-veg3.png') }}" alt="vegetable">
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="new_arrivals--wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="new_arrivals_title--wrapper">
                            <div class="new_arrival--title our-pro-title">
                                <span class="green_quality--title new_arrival--title1 our-pro">OUR</span>
                                <span class="green_quality--title new_arrival--title2 our-pro">PRODUCTS</span>
                            </div>
                            <ul class="nav nav_arrival" id="pills-tab" role="tablist">
                                @php
                                    $categories = App\Models\CategoryModel::all();
                                @endphp
                                @foreach ($categories as $index => $category)
                                    <li class="nav-item">
                                        <a class="nav-link {{ $index === 0 ? 'active' : '' }}"
                                           id="pill-{{ $category->category }}"
                                           data-toggle="pill"
                                           href="#tab-{{ $category->category_id }}"
                                           role="tab"
                                           aria-controls="tab-{{ $category->category_id }}"
                                           aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
                                            {{ strtoupper($category->category) }}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="tab-content" id="pills-tabContent">
                            @foreach ($categories as $index => $category)
                                <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                     id="tab-{{ $category->category_id }}"
                                     role="tabpanel"
                                     aria-labelledby="pill-{{ $category->category }}">
                                    <div class="row row_arrival">
                                        @php
                                            $cat_products = App\Models\ProductModel::where('category_id', $category->category_id)->get();
                                        @endphp
                                        @foreach ($cat_products as $cat_pro)
                                            <div class="col-sm-6 col-lg-4 col-xl-2 arrival_col p-0">
                                                <div class="swiper-slide">
                                                <a href="{{ route('product_details',(['id'=>$cat_pro->product_id])) }}">
                                                    <div class="slider_arrival--wrapper">
                                                        <div class="arrival_items--img">
                                                            <img data-src="{{ asset($cat_pro->image) }}"
                                                                 alt="arrival"
                                                                 class="arrival_img lazyload"
                                                                 width="268"
                                                                 height="327">
                                                            <div class="cart_and_like--wrapper">
                                                                <a href="cart-page-v2.html" class="cart_wrapper">
                                                                    <img data-src="{{ asset('user_asset/images/svg/veg-bag.svg')}}"
                                                                         alt="bag"
                                                                         class="lazyload"
                                                                         width="20"
                                                                         height="24">
                                                                </a>
                                                                <a href="{{ route('wishlist')}}" class="like_wrapper">
                                                                    <img data-src="{{ asset('user_asset/images/svg/arrival-like.svg')}}"
                                                                         alt="heart"
                                                                         class="lazyload"
                                                                         width="23"
                                                                         height="20">
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="new_arrival--details">
                                                            <span class="new_item--price">₹ {{ $cat_pro->retail }} ({{ $cat_pro->weight }})</span>
                                                            <span class="new_item--title">{{ $cat_pro->product_name }}</span>
                                                        </div>
                                                    </div>
                                                </a>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
         </section>
         <section class="fresh_fruits--wrapper">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-6">
                     <div class="fresh_fruits--img taste-img-mob">
                        <img data-src="{{ asset('user_asset/images/vegetable/fresh-fruits1.png') }}" alt="fruits" class="lazyload" width="994" height="874">
                     </div>
                  </div>
                  <div class="col-lg-6">
                     <div class="fresh_fruits_inner--wrapper">
                        <span class="green_quality--title fresh_fruits--title1 ">THE TASTE</span>
                        <span class="green_quality--title fresh_fruits--title2 taste-title">HANDED OVER BY<BR>GENERATIONS</span>
                        <p>Sithas food products aims at bringing you the best traditional tastes of Kerala. Our FSSAI approved packaged products are made following the best hygiene practices without compromising on freshness, taste and quality. Our range of food products promises to bring Kerala iconic delicacies to the rest of the world following world-class quality standards."
                        </p>
                     </div>
                     <a href="{{ route('Products',['id' => 'Chips'])}}" class="veg_btn">
                     shop now
                     <img data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class="lazyload" width="24" height="20">
                     </a>
                     <div class="fruit_sideimg--wrapper">
                        <img src="{{ asset('user_asset/images/vegetable/fresh-fruits4.png') }}" alt="vegetables" data-aos="fade-left">
                     </div>
                  </div>
               </div>
            </div>
      </div>
      </section>
      <section class="how_it_works--wrapper">
         <div class="container aa ">
            <div class="row">
               <div class="col-12 category_content_wrapper">
                  <ul class="how_it_works--list">
                     <li class="work_list">
                        <span class="new_item--title snacks traditional-mob">TRADITIONAL SNACKS</span>
                        <div class="work_list--img aos-init aos-animate" data-aos="zoom-in">
                           <img src="{{ asset('user_asset/images/grocery/how-it-works2_1.png') }}" alt="works">
                        </div>
                        <span class="work_list--text">We have tried our best to retain and preserve the tastes passed down by generations for coming generations to compiling the traditional tastes of Kerala snacks from various corners of the state.</span>
                     </li>
                     <li class="work_list">
                        <span class="new_item--title snacks traditional-mob">QUALITY</span>
                        <div class="work_list--img aos-init aos-animate" data-aos="zoom-in" data-aos-delay="200">
                           <img src="{{ asset('user_asset/images/grocery/how-it-works2_2.png') }}" alt="works">
                        </div>
                        <span class="work_list--text">Our products and services qualify various quality checks and inspections. We attribute special emphasis to the needs and requirements of our clients.</span>
                     </li>
                     <li class="work_list workliststyle">
                        <span class="new_item--title snacks traditional-mob">CHEMICAL FREE PRODUCTS</span>
                        <div class="work_list--img aos-init aos-animate" data-aos="zoom-in" data-aos-delay="400">
                           <img src="{{ asset('user_asset/images/grocery/how-it-works2_3.png') }}" alt="works">
                        </div>
                        <span class="work_list--text">We are well aware of the side effects of blind use of chemical contents in the human body. We build our products from organic materials with careful and quality scientific inspection.</span>
                     </li>
                  </ul>
               </div>
            </div>
         </div>
      </section>
      <section class="new_arrivals--wrapper">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <div class="new_arrivals_title--wrapper">
                     <div class="new_arrival--title">
                        <span class="green_quality--title new_arrival--title1 ">OUR</span>
                        <span class="green_quality--title new_arrival--title2 crispy-title-mob">FRESH AND CRISPY</span>
                     </div>
                  </div>
               </div>
               <div class="col-12">
                  <!--CHIPS-->
                  <div class="tab-content" id="pills-tabContent">
                     <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">


                        <div class="row row_arrival">
                            @php $all_product = App\Models\ProductModel::orderBy('id', 'DESC')->limit(12)->get(); @endphp
                                                    @foreach ($all_product as $all_pro)
                           <div class="col-sm-6 col-lg-4 col-xl-3 arrival_col p-0">
                            <a href="{{ route('product_details',(['id'=>$cat_pro->product_id])) }}">
                            <div class="swiper-slide">
                                 <div class="slider_arrival--wrapper">
                                    <div class="arrival_items--img">
                                       <img data-src="{{ asset($all_pro->image) }}" alt="arrival" class="arrival_img lazyload" width="268" height="327">
                                       <div class="cart_and_like--wrapper">
                                          <a href="cart-page-v2.html" class="cart_wrapper">
                                          <img data-src="{{ asset('user_asset/images/svg/veg-bag.svg')}}" alt="bag" class="lazyload" width="20" height="24">
                                          </a>
                                          <a href="{{ route('wishlist')}}" class="like_wrapper">
                                          <img data-src="{{ asset('user_asset/images/svg/arrival-like.svg')}}" alt="heart" class="lazyload" width="23" height="20">
                                          </a>
                                       </div>
                                    </div>
                                    <div class="new_arrival--details">
                                       <span class="new_item--price">₹  {{ $all_pro->retail }} ({{ $all_pro->weight }})</span>
                                       <span class="new_item--title">{{ $all_pro->product_name }}</span>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </a>
                        @endforeach

                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
         </div>
      </section>
@endsection


      @section('script')
      <script src="{{ asset('user_asset/js/vendor/jquery-3.5.1.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/bootstrap.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/bowser.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/lazysizes.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/swiper.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/aos.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/aos.init.js')}}"></script>
      <script src="{{ asset('user_asset/js/pages/vegetables-swiper.js')}}"></script>
      <script src="{{ asset('user_asset/js/main.js')}}"></script>
      @endsection
