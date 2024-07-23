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
                           <li class="breadcrumb-item"><a href="index.html">Home</a></li>
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
                     <div class="col-lg-12 account_cols text-center">
                        <div class="account_details--wrapper account_register--wrapper">
                           <h1 class="title">Register</h1>
                           <form class="my_account--form" method="POST" action="{{ route('add_customer') }}">
                              @csrf
                              <div class="form_account--group">
                                 <input type="text" class="form_input" name="username" placeholder="Enter User Name" value="{{ old('username') }}">
                                 @error('username') <div class="text-danger">{{ $message }}</div> @enderror
                                 <input type="text" class="form_input" name="email" placeholder="Enter Email Address"  value="{{ old('email') }}">
                                 @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                                 <input type="number" class="form_input" name="phone" placeholder="Enter Phone Number"  value="{{ old('phone') }}">
                                 @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
                                 <input type="text" class="form_input" name="password" placeholder="Create Password"  value="{{ old('password') }}">
                                 @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                                 <input type="password" class="form_input" name="confirm_password" placeholder="Confirm Password"  value="{{ old('confirm_password') }}">
                                 @error('confirm_password') <div class="text-danger">{{ $message }}</div> @enderror
                              
                              </div>
                              
                              <div class="account_btn--wrapper">
                                 <button type="submit" class="account_btn green_btn">REGISTER</button>
                              </div>
                              <span class="register_now">Already have account. <a href="{{ route('website_login_page') }}" class="register">Login</a></span>
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
