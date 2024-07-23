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
      <link rel="stylesheet" href="{{ asset('user_asset/css/pages/cart.css')}}">
      @endsection

      @section('content')

         <section class="common_banner--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h1 class="banner_title">Checkout</h1>
                     <nav class="breadcum_wrapper">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                           <li class="breadcrumb-item active">Checkout</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </section>
         <section class="cart_wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-md-6 cart_left--col">
                     <div class="cart_address--wrapper cart_cols" data-aos="fade-right">
                        <h1 class="cart_title">Shipping Details</h1>
                        <div class="address_wrapper">
                           <div class="address_details--wrapper">
                              <h3 class="customer_name">John doe</h3>
                              <address>9420 Redwood Lane<br> Westland, MI 48185</address>
                              <a href="tel:+12025550151" class="phone_no">+1-202-555-0151</a>
                              <a href="tel:+12025550151" class="phone_no">+1-202-555-0151</a>
                           </div>
                           <div class="mailing_address--wrapper">
                              <a href="mail:info@johndoe.com"><span class="__cf_email__" data-cfemail="640d0a020b240e0b0c0a000b014a070b09">[email&#160;protected]</span></a>
                           </div>
                        </div>
                        <h1 class="cart_title">Payment Details</h1>
                        <form class="cart_form--wrapper">
                           <div class="form-group">
                              <label for="cardholder">Cardholder Name</label>
                              <div class="current_status--wrapper">
                                 <input type="text" class="form-control" id="cardholder" placeholder="John Doe">
                                 <span class="side_status">
                                 </span>
                              </div>
                           </div>
                           <div class="form-group">
                              <label for="cardnumber">Card Number</label>
                              <div class="current_status--wrapper">
                                 <input type="text" class="form-control" id="cardnumber" placeholder="**** **** **** 2343">
                                 <span class="side_status">
                                 <img data-src="{{ asset('user_asset/images/svg/visa.svg')}}" alt="visa" class="lazyload" width="34" height="34">
                                 </span>
                              </div>
                           </div>
                           <div class="form-row">
                              <div class="form-group col-sm-6">
                                 <label for="validate_through">Valid Through</label>
                                 <div class="current_status--wrapper">
                                    <input type="text" class="form-control" id="validate_through" placeholder="XX/XX">
                                    <span class="side_status">
                                    </span>
                                 </div>
                              </div>
                              <div class="form-group col-sm-6">
                                 <label for="cvv">CVV Code</label>
                                 <div class="current_status--wrapper">
                                    <input type="text" class="form-control" id="cvv" placeholder="XXX">
                                    <span class="side_status">
                                    <img data-src="{{ asset('user_asset/images/svg/i.svg')}}" alt="i" class="lazyload" width="14" height="24">
                                    </span>
                                 </div>
                              </div>
                           </div>
                           <button class="btn post_comment--btn" type="submit">PLACE ORDER</button>
                           <span class="agree_terms">
                           By clicking the button, you agree to the
                           <a href="#" class="terms_and_condition">
                           terms & conditions
                           </a>
                           </span>
                        </form>
                     </div>
                  </div>
                  <div class="col-md-6 cart_right--col">
                     <div class="your_order--wrapper cart_cols" data-aos="fade-left">
                        <h1 class="cart_title">Your Order</h1>
                        <ul class="cart_orders--wrapper">
                           <li class="order_list">
                              <div class="item_img--wrapper">
                                 <img data-src="{{ asset('user_asset/images/cart/cart-img1.png')}}" alt="cart-img" class="lazyload" width="82" height="64">
                              </div>
                              <div class="item_name">Avocado</div>
                              <div class="itme_nos">
                                 <span>05</span>
                              </div>
                              <div class="item_price">$25</div>
                              <a href="#" class="delete_item">
                              <img data-src="{{ asset('user_asset/images/svg/delete.svg')}}" alt="delete" class="lazyload" width="16" height="16">
                              </a>
                           </li>
                           <li class="order_list">
                              <div class="item_img--wrapper">
                                 <img data-src="{{ asset('user_asset/images/cart/cart-img2.png')}}" alt="cart-img" class="lazyload" width="71" height="62">
                              </div>
                              <div class="item_name">Cabbage</div>
                              <div class="itme_nos">
                                 <span>02</span>
                              </div>
                              <div class="item_price">$30</div>
                              <a href="#" class="delete_item">
                              <img data-src="{{ asset('user_asset/images/svg/delete.svg')}}" alt="delete" class="lazyload" width="16" height="16">
                              </a>
                           </li>
                           <li class="order_list">
                              <div class="item_img--wrapper">
                                 <img data-src="{{ asset('user_asset/images/cart/cart-img3.png')}}" alt="cart-img" class="lazyload" width="75" height="70">
                              </div>
                              <div class="item_name">Broccoli</div>
                              <div class="itme_nos">
                                 <span>01</span>
                              </div>
                              <div class="item_price">$10</div>
                              <a href="#" class="delete_item">
                              <img data-src="{{ asset('user_asset/images/svg/delete.svg')}}" alt="delete" class="lazyload" width="16" height="16">
                              </a>
                           </li>
                        </ul>
                        <ul class="order_list_total--wrapper">
                           <li class="order_list--total">
                              <a href="products/product-listing-grid.html" class="continue_btn--wrapper">
                              <span class="back_wrapper">
                              <img data-src="{{ asset('user_asset/images/svg/arrowleft.svg')}}" alt="back" class="lazyload" width="16" height="16">
                              </span>
                              <span class="continue_shopping">Continue Shopping</span>
                              </a>
                              <div class="subtotal_wrapper">
                                 <span class="subtotal_name">SUBTOTAL</span>
                                 <span class="subtotal_price">$65</span>
                              </div>
                           </li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      @endsection

         @section('script')
      <script data-cfasync="false" src="../../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js') }}"></script>
      <script src="{{ asset('user_asset/js/vendor/jquery-3.5.1.min.js') }}"></script>
      <script src="{{ asset('user_asset/js/vendor/bootstrap.min.js') }}"></script>
      <script src="{{ asset('user_asset/js/vendor/bowser.min.js') }}"></script>
      <script src="{{ asset('user_asset/js/vendor/lazysizes.min.js') }}"></script>
      <script src="{{ asset('user_asset/js/vendor/aos.min.js') }}"></script>
      <script src="{{ asset('user_asset/js/vendor/aos.init.js') }}"></script>
      <script src="{{ asset('user_asset/js/main.js') }}"></script>
      @endsection
