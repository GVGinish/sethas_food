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
                           <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
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
                           <div class="checkbox_wrapper pname1">{{$profile->username}}</div>
                           <label class="checkbox_wrapper pname">Email :</label>
                           <div class="checkbox_wrapper pname1">{{$profile->email}}</div>
                           <label class="checkbox_wrapper pname">PHONE :</label>
                           <div class="checkbox_wrapper pname1">{{$profile->phone}}</div>
                           @php if(!empty($address)){ @endphp 
                            <label class="checkbox_wrapper pname">DELIVERY ADDRESS :</label>
                            <div class="checkbox_wrapper pname1">
                            {{ optional($address)->address ? optional($address)->address . "," : '' }}
                            {{ optional($address)->city ? optional($address)->city . "," : '' }}
                            {{ optional($address)->district ? optional($address)->district . "," : '' }}
                            {{ optional($address)->state ? optional($address)->state . "," : '' }}
                            {{ optional($address)->pincode ? optional($address)->pincode : '' }} 
                           </div>                         
                            @php }else{ @endphp
                            <button id="showAddressForm" class="button" style="background-color:#b0d6e7; color:white;padding:5px;border-radius:5px;border:0px;">
                             Add New Address
                           </button> 
                           @php } @endphp
                         
                        <div id="addressForm" style="display:none;" class="mt-3">
                           <form method="POST" action="{{route('add_address')}}">
                              @csrf
                              <div class="row">
                              <div class="form-group col-lg-6">
                                    <label for="address">Address:</label>
                                    <input type="text"  name="address" class="form-control" value="{{old('address')}}">
                                    @error('address')<div class="text-danger">{{$message}}</div>@enderror
                              </div>
                              <div class="form-group col-lg-6">
                                    <label for="city">City:</label>
                                    <input type="text"  name="city" class="form-control" value="{{old('city')}}">
                                    @error('city')<div class="text-danger">{{$message}}</div>@enderror
                              </div>
                              </div>
                              <div class="row">
                              <div class="form-group col-lg-6">
                                    <label for="address">District:</label>
                                    <input type="text"  name="district" class="form-control" value="{{old('district')}}">
                                    @error('district')<div class="text-danger">{{$message}}</div>@enderror
                                 </div>
                              <div class="form-group col-lg-6">
                                    <label for="city">State:</label>
                                    <input type="text"  name="state" class="form-control" value="{{old('state')}}">
                                    @error('state')<div class="text-danger">{{$message}}</div>@enderror
                              </div>
                              </div>
                              <div class="row">
                              <div class="form-group col-lg-6">
                                    <label for="address">Pincode:</label>
                                    <input type="text" name="pincode" class="form-control" value="{{old('pincode')}}">
                                    @error('pincode')<div class="text-danger">{{$message}}</div>@enderror
                              </div>
                            
                              </div>

                              <!-- Add more fields as needed -->
                              <button type="submit" class="button" style="background-color:#b0d6e7; color:white;padding:5px;border-radius:5px;border:0px;">
                                    Save Address
                              </button>
                           </form>
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
      <script src="{{ asset('user_asset/js/pages/about-us.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/aos.init.js')}}"></script>
      <script src="{{ asset('user_asset/js/main.js')}}"></script>
      <script>
         document.getElementById('showAddressForm').addEventListener('click', function() {
            var addressForm = document.getElementById('addressForm');
            if (addressForm.style.display === 'none' || addressForm.style.display === '') {
                  addressForm.style.display = 'block';
            } else {
                  addressForm.style.display = 'none';
            }
         });
         </script>
              @if ($errors->any())
            <script>
               document.addEventListener('DOMContentLoaded', function() {
                     document.getElementById('addressForm').style.display = 'block';
               });
            </script>
         @endif
@endsection
