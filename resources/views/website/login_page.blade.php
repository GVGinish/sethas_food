@extends('website.layout2')
@section('link')
      <link rel="shortcut icon" href="{{ asset('user_aseet/images/vegetable/veg-logo.png')}}" type="image/x-icon">
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
                           <li class="breadcrumb-item"><a href="">Home</a></li>
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
                  <div style="justify-content: center" class="row login-mob">
                     <div class="col-lg-12 account_cols">
                        <div class="account_details--wrapper">
                           <h1 class="title">Login</h1>
                           <form class="my_account--form" method="POST" action="{{ route('website_signin')}}">
                           @csrf   
                           <div class="form_account--group">
                                 <input type="text" class="form_input" name="email" value="gin@relaxplzz.com" placeholder="email address">
                                 @error('email')<div class="text-danger">{{$message}}</div> @enderror
                              </div>
                              <div class="form_account--group">
                                 <input type="password" class="form_input" name="password" value="123456" placeholder="Password">
                                 @error('password')<div class="text-danger">{{$message}}</div> @enderror
                              </div>
                              <div class="account_btn--wrapper">
                                 <button type="submit" class="account_btn green_btn">LOGIN</button>
                              </div>
                              <div class="form_security--group">
                                 
                                 <a href="./Forget.html" class="forgot_password">Forgot Password</a>
                              </div>
                              <span class="register_now">Don’t have an account? <a href="{{ route('register') }}" class="register">Register Now</a></span>
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
