@extends('website.layout2')
@section('link')
      <link rel="stylesheet" href="{{ asset('user_asset/css/vendor/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/vendor/aos.min.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/main.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/layouts/default-nav.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/layouts/default-footer.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/components/common-banner.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/themes/common.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/themes/button.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/pages/empty-cart.css')}}">
      @endsection

@section('content')

         <section class="common_banner--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h1 class="banner_title">Empty Cart</h1>
                     <nav class="breadcum_wrapper">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                           <li class="breadcrumb-item active">Empty Cart</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </section>
         <section class="empty_cart--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-12 empty_cart" data-aos="fade-up">
                     <img data-src="{{ asset('user_asset/images/cart/empty-bg.png')}}" alt="empty-cart" class="lazyload" width="1285" height="586">
                     <h2 class="cart_heading">Your bag is currently empty.</h2>
                     <h4 class="cart_subheading">Looks like you haven’t added anything to your BAG yet</h4>
                     <div class="back_to_shop--wrapper">
                        <a href="{{route('Products',['id'=>'All'])}}" class="btn green_btn">BACK TO SHOP</a>
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
      <script src="{{ asset('user_asset/js/main.js')}}"></script>
      @endsection

