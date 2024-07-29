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
      <style>
        label{
            color:white;
        }
      </style>

@endsection
      @section('content')
         <section class="common_banner--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h1 class="banner_title">Reset Password</h1>
                     <nav class="breadcum_wrapper">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                           <li class="breadcrumb-item active">Reset Password</li>
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
                        @if (session('message'))
                            <div class="alert alert-success text-success">
                                {{ session('message') }}
                            </div>
                        @endif

                           <h2 class="title">Hai {{$user->username}}</h2>
                           <form class="my_account--form" method="POST" action="{{ route('change_password') }}">
                                @csrf
                                <div class="form_account--group">
                                    <label><span>User ID : {{$user->user_id}}</span></label>
                                    <input type="hidden" class="form_input" name="user_id" value="{{$user->user_id}}" readonly>
                                </div>
                                <div class="form_account--group">
                                    <label>New Password<span class="text-danger">(Password length should be at least 6)</span></label>
                                    <input type="text" class="form_input" name="password" placeholder="Enter New Password" value="{{ old('password') }}">
                                    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="form_account--group">
                                    <label><span>Confirm Password</span></label>
                                    <input type="password" class="form_input" name="confirm_password" placeholder="Enter Confirm Password" value="{{ old('confirm_password') }}">
                                    @error('confirm_password') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="account_btn--wrapper">
                                    <button type="submit" class="account_btn green_btn">Change</button>
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
