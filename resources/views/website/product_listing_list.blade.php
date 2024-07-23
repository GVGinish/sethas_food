@extends('website.layout2')
@section('link')
      <link rel="stylesheet" href="{{ asset('user_asset/css/vendor/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/vendor/aos.min.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/main.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/layouts/default-nav.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/layouts/default-footer.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/components/common-banner.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/components/product-listing-sidebar.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/themes/common.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/themes/button.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/pages/product-listing-grid.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/pages/product-listing-list.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/fonts/dairy-fonts.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/pages/vegetable.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/fonts/veggie-fonts.css')}}">
@endsection
      @section('content')

         <section class="common_banner--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h1 class="banner_title">Product Listing</h1>
                     <nav class="breadcum_wrapper">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                           <li class="breadcrumb-item active">Product Listing</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </section>
         <section class="product_listing_grid--wrapper product_listing_list--wrapper">
            <div class="container">
               <div class="row main_row">
                  <div class="col-lg-3">
                     <div class="product_widget--wrapper">
                        <aside class="product_widgets">
                           <h1 class="product_widgets--title">Categories</h1>
                           <ul class="product_widgets_list--wrapper">
                              <li class="product_widgets--list">
                                 <label class="widget_label">All
                                 <input type="checkbox">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                              <li class="product_widgets--list">
                                 <label class="widget_label">Fruits
                                 <input type="checkbox" checked="checked">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                              <li class="product_widgets--list">
                                 <label class="widget_label">Vegetables
                                 <input type="checkbox">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                           </ul>
                        </aside>
                        <aside class="product_widgets">
                           <h1 class="product_widgets--title">Seasonal</h1>
                           <ul class="product_widgets_list--wrapper">
                              <li class="product_widgets--list">
                                 <label class="widget_label">Winter
                                 <input type="checkbox">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                              <li class="product_widgets--list">
                                 <label class="widget_label">Summer
                                 <input type="checkbox" checked="checked">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                              <li class="product_widgets--list">
                                 <label class="widget_label">Spring
                                 <input type="checkbox">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                              <li class="product_widgets--list">
                                 <label class="widget_label">Autuam
                                 <input type="checkbox">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                           </ul>
                        </aside>
                        <aside class="product_widgets">
                           <h1 class="product_widgets--title">Price</h1>
                           <ul class="product_widgets_list--wrapper">
                              <li class="product_widgets--list">
                                 <label class="widget_label">$100 to $200 <span class="total_items">(1740)</span>
                                 <input type="checkbox">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                              <li class="product_widgets--list">
                                 <label class="widget_label">$200 to $300 <span class="total_items">(1874)</span>
                                 <input type="checkbox" checked="checked">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                              <li class="product_widgets--list">
                                 <label class="widget_label">$300 to $400 <span class="total_items">(2736)</span>
                                 <input type="checkbox">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                           </ul>
                        </aside>
                        <aside class="product_widgets">
                           <h1 class="product_widgets--title">Discount</h1>
                           <ul class="product_widgets_list--wrapper">
                              <li class="product_widgets--list">
                                 <label class="widget_label">15% - 20%
                                 <input type="checkbox" checked="checked">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                              <li class="product_widgets--list">
                                 <label class="widget_label">12% - 25%
                                 <input type="checkbox">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                              <li class="product_widgets--list">
                                 <label class="widget_label">50% - 70%
                                 <input type="checkbox">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                           </ul>
                        </aside>
                        <aside class="product_widgets">
                           <h1 class="product_widgets--title">Pack Price</h1>
                           <ul class="product_widgets_list--wrapper">
                              <li class="product_widgets--list">
                                 <label class="widget_label">1 pac
                                 <input type="checkbox">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                              <li class="product_widgets--list">
                                 <label class="widget_label">Combo 2 items
                                 <input type="checkbox" checked="checked">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                              <li class="product_widgets--list">
                                 <label class="widget_label">30 grm
                                 <input type="checkbox">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                              <li class="product_widgets--list">
                                 <label class="widget_label">100 grm
                                 <input type="checkbox">
                                 <span class="checkmark"></span>
                                 </label>
                              </li>
                           </ul>
                        </aside>
                     </div>
                  </div>
                  <div class="col-lg-9">
                     <div class="product_grid--wrapper">
                        <div class="row inner_row">
                            <div class="container">
                                <div class="row">

                                   <div class="col-12">
                                      <!--CHIPS-->
                                      <div class="tab-content" id="pills-tabContent">
                                         <div class="tab-pane fade show active" id="pills-all" role="tabpanel" aria-labelledby="pills-all-tab">


                                            <div class="row row_arrival">

                                            @foreach ($all_pro as $all)
                                            <a href="{{ route('product_details',['id' => $all->product_id] ) }}">
                                               <div class="col-sm-6 col-lg-4 col-xl-3 arrival_col p-0">
                                                  <div class="swiper-slide">
                                                     <div class="slider_arrival--wrapper" style="background-color:#ffff;paddding:20px;">
                                                        <div class="arrival_items--img">
                                                           <img data-src="{{ asset($all->image) }}" alt="arrival" class="arrival_img lazyload" width="268" height="327">
                                                           <div class="cart_and_like--wrapper">
                                                              <a href="cart-page-v2.html" class="cart_wrapper">
                                                              <img data-src="{{ asset('user_asset/images/svg/veg-bag.svg')}}" alt="bag" class="lazyload" width="20" height="24">
                                                              </a>
                                                              <a href="{{ route('wishlist')}}" class="cart_wrapper">
                                                              <img data-src="{{ asset('user_asset/images/svg/arrival-like.svg')}}" alt="heart" class="lazyload" width="23" height="20">
                                                              </a>
                                                           </div>
                                                        </div>
                                                        <div class="new_arrival--details">
                                                           <span class="new_item--price">₹  {{ $all->retail }} ({{ $all->weight }})</span>
                                                           <span class="new_item--title">{{ $all->product_name }}</span>
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
      <script src="{{ asset('user_asset/js/vendor/aos.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/aos.init.js')}}"></script>
      <script src="{{ asset('user_asset/js/pages/increment-decrement.js')}}"></script>
      <script src="{{ asset('user_asset/js/main.js')}}"></script>
      <script src="{{ asset('user_asset/js/pages/vegetables-swiper.js')}}"></script>


      @endsection
