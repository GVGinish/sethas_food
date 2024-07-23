@extends('website.layout2')
@section('link')
      <link rel="stylesheet" href="{{ asset('user_asset/css/vendor/bootstrap.min.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/vendor/aos.min.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/main.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/layouts/default-nav.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/layouts/default-footer.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/components/common-banner.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/components/leave-a-reply.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/themes/common.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/themes/button.css')}}">
      <link rel="stylesheet" href="{{ asset('user_asset/css/pages/contact.css')}}">
      @endsection

      @section('content')
         <section class="common_banner--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h1 class="banner_title">Contact</h1>
                     <nav class="breadcum_wrapper">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="./demo-pages/index.html">Home</a></li>
                           <li class="breadcrumb-item active">Contact</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </section>
         <section class="contact_banner--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6 left_col">
                     <div class="contact_banner_img--wrapper" data-aos="fade-right">
                        <img src="{{ asset('user_asset/images/contact/contact-img.png')}}" alt="contact">
                     </div>
                  </div>
                  <div class="col-lg-6 right_col">
                     <div class="contact_address--wrapper">
                        <h2 class="contact_title">get in touch</h2>
                        <ul>
                           <li>
                              <div style="display: flex !important;
                                 flex-wrap: nowrap !important;
                                 align-items: center !important;" class="contact_main--box">
                                 <div class="contact_box">
                                    <img src="{{ asset('user_asset/images/svg/locator.svg')}}" alt="locator">
                                 </div>
                                 <p style="margin-left: 30PX;" class="contact_info contact-address">Kairali Foods and Beverages
                                    <br>IV-356 E,<br>Kottakudy Enterprises<br>Kodanad P.O,<br>
                                    Koovappady, Perumbavoor,<br>PIN 683544 Clifton, NJ 07011
                                 </p>
                              </div>
                           </li>
                           <li>
                              <div style="display: flex !important;
                                 flex-wrap: nowrap !important;
                                 align-items: center !important;" class="contact_main--box">
                                 <div class="contact_box">
                                    <img src="{{ asset('user_asset/images/svg/call.svg')}}" alt="call">
                                 </div>
                                 <a style="margin-left: 30PX;" href="tel:+1112345678" class="contact_info contact_no--one">+91 6282366410</a>
                              </div>
                           </li>
                           <li>
                              <div style="display: flex !important;
                                 flex-wrap: nowrap !important;
                                 align-items: center !important; margin: 15px 0px;" class="contact_main--box">
                                 <div class="contact_box">
                                    <img src="{{ asset('user_asset/images/svg/mail.svg')}}" alt="mail">
                                 </div>
                                 <a style="margin-left: 30PX;" href="mail:kairalifoodsandbeverages@gmail.com" class="contact_info contact_by_mail"><span class="__cf_email__" data-cfemail="452c2b232a053320222031242729206b262a28">[email&#160;protected]</span></a>
                              </div>
                     </div>
                     </li>
                     </ul>
                  </div>
               </div>
            </div>
        </section>
      <section class="leave_a_reply--wrapper contact_form--wrapper">
         <div class="container">
            <div class="row">
               <div class="col-12">
                  <h2 class="reply_main--title">leave a message</h2>
                  <h3 class="reply_title">We love to hear from you</h3>
                  <form class="leave_reply_form--wrapper">
                     <div class="form-row form_input_row">
                        <div class="form-group col-md-4">
                           <input type="text" class="form-control" placeholder="Name">
                        </div>
                        <div class="form-group col-md-4">
                           <input type="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-group col-md-4">
                           <input type="text" class="form-control" placeholder="Website">
                        </div>
                     </div>
                     <div class="form-group">
                        <textarea class="form-control" placeholder="Comments" rows="11"></textarea>
                     </div>
                     <div class="comment_btn--wrapper">
                        <button type="submit" class="btn post_comment--btn">SUBMIT</button>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>
@endsection

  @section('script')
      <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js')}}"></script><script src="{{ asset('user_asset/js/vendor/jquery-3.5.1.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/bootstrap.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/bowser.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/lazysizes.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/aos.min.js')}}"></script>
      <script src="{{ asset('user_asset/js/vendor/aos.init.js')}}"></script>
      <script src="{{ asset('user_asset/js/main.js')}}"></script>
@endsection
