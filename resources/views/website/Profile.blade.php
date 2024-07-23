@extends('website.layout2')
@section('link')
      <link rel="stylesheet" href="{{ asset('user_asset/css/vendor/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/vendor/swiper.min.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/vendor/aos.min.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/main.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/layouts/default-nav.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/layouts/default-footer.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/themes/common.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/components/common-banner.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/pages/about-us.css')}}">
      @endsection

      @section('content')

         <section class="common_banner--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h1 class="banner_title">My Account</h1>
                     <nav class="breadcum_wrapper">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="">Home</a></li>
                           <li class="breadcrumb-item active">Profile</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </section>
         <section class="my_account--wrapper profile1">
            <div class="container">
               <div class="account_container--wrapper" data-aos="fade-up">
                  <div class="row">
                     <div class="col-lg-12 account_cols">
                        <div class="account_details--wrapper">
                           <h1 class="title profiletitle">PROFILE <img src="{{ asset('user_asset/images/svg/profile-Title.png')}}"></h1>
                           <label class="checkbox_wrapper pname">NAME :</label>
                           <div class="checkbox_wrapper pname1">Dinsha</div>
                           <label class="checkbox_wrapper pname">Email :</label>
                           <div class="checkbox_wrapper pname1">Dinsha@12346.com</div>
                           <label class="checkbox_wrapper pname">PHONE :</label>
                           <div class="checkbox_wrapper pname1">1236547890</div>
                           <label class="checkbox_wrapper pname">ADDRESS :</label>
                           <div class="checkbox_wrapper pname1">Xyz Road abc pincode 12547</div>
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
      <script src="{{ asset('user_asset/js/pages/about-us.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/aos.init.js')}}"></script>
      <script src="{{ asset('user_asset/js/main.js')}}"></script>
@endsection
