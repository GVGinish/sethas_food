@extends('website.layout2')
@section('link')
      <link rel="stylesheet" href="{{ asset('user_aseet/css/vendor/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{ asset('user_aseet/css/vendor/aos.min.css')}}">
      <link rel="stylesheet" href="{{ asset('user_aseet/css/main.css')}}">
      <link rel="stylesheet" href="{{ asset('user_aseet/css/layouts/default-nav.css')}}">
      <link rel="stylesheet" href="{{ asset('user_aseet/css/layouts/default-footer.css')}}">
      <link rel="stylesheet" href="{{ asset('user_aseet/css/components/common-banner.css')}}">
      <link rel="stylesheet" href="{{ asset('user_aseet/css/themes/common.css')}}">
      <link rel="stylesheet" href="{{ asset('user_aseet/css/themes/button.css')}}">
      <link rel="stylesheet" href="{{ asset('user_aseet/css/themes/animation-image.css')}}">
      <link rel="stylesheet" href="{{ asset('user_aseet/css/pages/my-account.css')}}">
@endsection
@section('content')
         <section class="common_banner--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h1 class="banner_title">My Account</h1>
                     <nav class="breadcum_wrapper">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="index">Home</a></li>
                           <li class="breadcrumb-item active">My Account</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </section>
         <section class="my_account--wrapper">
            <div class="container">
               <div class="account_container--wrapper" data-aos="fade-up">
                  <div class="row">
                     <div class="col-lg-6 account_cols">
                        <div class="account_img--wrapper animate_img--wrapper">
                           <a>
                           <img src="{{ asset('user_aseet/images/my-account/my-account-img.png')}}" alt="user">
                           </a>
                        </div>
                     </div>
                     <div class="col-lg-6 account_cols">
                        <div class="account_details--wrapper account_register--wrapper" style="height: 82% !important;">
                           <h1 class="title">Forget Password</h1>
                           <form class="my_account--form">
                              <div class="form_account--group">
                                 <input type="text" class="form_input" placeholder="Enter Email Address">
                              </div>
                              <div class="account_btn--wrapper">
                                 <a href="register.html" class="account_btn green_btn">Submit</a>
                              </div>
                           </form>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
@endsection
         @section('link')
      <script src="{{ asset('user_asset/js/vendor/jquery-3.5.1.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/bootstrap.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/bowser.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/lazysizes.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/aos.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/aos.init.js')}}"></script>
      <script src="{{ asset('user_asset/js/main.js')}}"></script>
      @endsection

