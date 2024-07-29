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
      <link rel="stylesheet" href="{{ asset('user_asset/css/themes/animation-image.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/pages/my-account.css')}}">
      @endsection
      @section('content')
         <section class="common_banner--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h1 class="banner_title">My Account</h1>
                     <nav class="breadcum_wrapper">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
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
                           <img src="{{ asset('user_asset/images/my-account/my-account-img.png')}}" alt="user">
                           </a>
                        </div>
                     </div>
                     <div class="col-lg-6 account_cols">
                        <div class="account_details--wrapper account_register--wrapper" style="height: 82% !important;">
                           <h1 class="title">Forget Password</h1>
                           @if (session('message'))
                            <div class="alert alert-success text-success">
                                {{ session('message') }}
                            </div>
                        @endif
                        @if (session('error_message'))
                            <div class="alert alert-success text-danger">
                                {{ session('error_message') }}
                            </div>
                        @endif
                           <form class="my_account--form" method="post" action="{{route('sent_mail')}}">
                           @csrf   
                           <div class="form_account--group">
                                 <input type="text" class="form_input" name="email" placeholder="Enter Email Address" value="{{old('email')}}">
                              @error('email')<div class="text-danger">{{$message}}</div>@enderror
                              </div>
                              <div class="account_btn--wrapper">
                                 <button type="submit" class="account_btn green_btn">Submit</button>
                              </div>
                           </form>
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
      <script src="{{ asset('user_asset/js/main.js')}}"></script>
      @endsection
 