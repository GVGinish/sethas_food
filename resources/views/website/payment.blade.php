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
      <link rel="stylesheet" href="{{ asset('user_asset/css/pages/payment.css')}}">
      @endsection

@section('content')

         <section class="common_banner--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h1 class="banner_title">Payment</h1>
                     <nav class="breadcum_wrapper">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="./demo-pages/index.html">Home</a></li>
                           <li class="breadcrumb-item active">Payment</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </section>
         <section class="payment_method--wrapper">
            <div class="container">
               <h2 class="payment_title">Choose payment method below</h2>
               <div class="row">
                  <div class="col-md-4 payment_col">
                     <div class="payment_method" data-aos="fade-up">
                        <img src="{{ asset('user_asset/images/svg/payment-card.svg')}}" alt="credit-card">
                        <h3 class="paymeth_method--title">PAY WITH CREDIT CARD</h3>
                        <div class="checkmark">
                           <img src="{{ asset('user_asset/images/svg/checkmark.svg')}}" alt="check">
                        </div>
                     </div>
                  </div>
                  <div class="col-md-4 payment_col">
                     <div class="payment_method" data-aos="fade-up" data-aos-delay="200">
                        <img src="{{ asset('user_asset/images/svg/payment-paypal.svg')}}" alt="credit-card">
                        <h3 class="paymeth_method--title">RAZOR PAY</h3>
                     </div>
                  </div>
                  <div class="col-md-4 payment_col">
                     <div class="payment_method" data-aos="fade-up" data-aos-delay="400">
                        <img src="{{ asset('user_asset/images/svg/payment-delivery.svg')}}" alt="credit-card">
                        <h3 class="paymeth_method--title">cash on delivery</h3>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <section class="payment_form_main--wrapper">
            <div class="container">
               <div class="row main_row">
                  <div class="col-lg-4 left_col">
                     <div class="payment_user--image">
                        <img data-src="{{ asset('user_asset/images/payment/payment-user.png')}}" alt="payment-user" class="lazyload" width="799" height="442">
                     </div>
                  </div>
                  <div class="col-lg-8 right_col">
                     <form class="payment_form--wrapper form-animate-fields">
                        <div class="row inner_row">
                           <div class="col-md-6 form_col">
                              <div class="form_details--wrapper">
                                 <h3 class="form_title">Billing info</h3>
                                 <div class="form_field">
                                    <input type="text" class="form-input" name="fullname" id="fullname" placeholder />
                                    <label class="form-label">
                                    <span class="form-label-content">Full Name</span>
                                    </label>
                                 </div>
                                 <div class="form_field">
                                    <div class="form_field">
                                       <input type="text" class="form-input" name="billingaddress" id="billingaddress" placeholder />
                                       <label class="form-label">
                                       <span class="form-label-content">Billing Address</span>
                                       </label>
                                    </div>
                                 </div>
                                 <div class="form_field--wrapper">
                                    <div class="form_field">
                                       <input type="text" class="form-input" name="city" id="city" placeholder />
                                       <label class="form-label">
                                       <span class="form-label-content">City</span>
                                       </label>
                                    </div>
                                    <div class="form_field">
                                       <input type="text" class="form-input" name="zipcode" id="zipcode" placeholder />
                                       <label class="form-label">
                                       <span class="form-label-content">Zip Code</span>
                                       </label>
                                    </div>
                                 </div>
                                 <div class="form_field">
                                    <input type="text" class="form-input" name="country" id="country" placeholder />
                                    <label class="form-label">
                                    <span class="form-label-content">Country</span>
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-6 form_col">
                              <div class="form_details--wrapper">
                                 <h3 class="form_title">Credit card info</h3>
                                 <div class="form_field">
                                    <input type="text" class="form-input" name="cardholder" id="cardholder" placeholder />
                                    <label class="form-label">
                                    <span class="form-label-content">Cardholder’s Name</span>
                                    </label>
                                 </div>
                                 <div class="form_field">
                                    <input type="text" class="form-input" name="cardname" id="cardname" placeholder />
                                    <label class="form-label">
                                    <span class="form-label-content">Card Number</span>
                                    </label>
                                 </div>
                                 <div class="form_field--wrapper">
                                    <div class="form_field">
                                       <select class="form-input" name="expmonth" id="expmonth">
                                          <option value="..">.</option>
                                          <option value="jan">JAN</option>
                                          <option value="feb">FEB</option>
                                       </select>
                                       <label class="form-label">
                                       <span class="form-label-content">Exp. Month</span>
                                       </label>
                                    </div>
                                    <div class="form_field">
                                       <select class="form-input" name="expyear" id="expyear">
                                          <option value="..">.</option>
                                          <option value="0">2021</option>
                                          <option value="1">2022</option>
                                       </select>
                                       <label class="form-label">
                                       <span class="form-label-content">Exp. Year</span>
                                       </label>
                                    </div>
                                 </div>
                                 <div class="form_field">
                                    <input type="text" class="form-input" name="cvvnumber" id="cvvnumber" />
                                    <label class="form-label">
                                    <span class="form-label-content">CVV Number</span>
                                    </label>
                                 </div>
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="form_btn--wrapper">
                                 <a href="products/product-listing-grid.html" class="continue_wrapper">
                                 <span class="arrow-left">
                                 <img data-src="{{ asset('user_asset/images/svg/arrowleft.svg')}}" alt="left" class="lazyload" width="16" height="16">
                                 </span>
                                 <span class="text_field">Continue Shopping</span>
                                 </a>
                                 <a href="#" class="btn green_btn">Process</a>
                              </div>
                           </div>
                        </div>
                     </form>
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
      <script src="{{ asset('user_asset/js/vendor/form-animation.js')}}"></script>
      <script src="{{ asset('user_asset/js/main.js')}}"></script>
@endsection
