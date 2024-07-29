<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="shortcut icon" href="{{asset('user_asset/images/vegetable/veg-logo.png')}}">
      <title>Sithas foods - Sweet, Mixture, Fried, Chips</title>
      @yield('link')

   </head>
   <body>
   @if(session('success'))
    <div id="successMessage" class="alert alert-success mt-2">
       {{ session('success') }}
    </div>
    @endif
    @if(session('error'))
    <div id="errorMessage" class="alert alert-danger mt-2">
       {{ session('error') }}
    </div>
    @endif
    @yield('content')



      <footer class="veg_main--footer">
         <div class="veg_top--footer">
            <div class="container">
               <div class="footer_food--wrapper" data-aos="zoom-in">
                  <img src="{{ asset('user_asset/images/vegetable/foo-overlay-img.png')}}" alt="food">
               </div>
               <div class="row">
                  <div class="col-md-6 col-lg-2 col-xl-2 veg_footer--cols">
                     <div class="veg_footer--wrapper">
                        <h2 class="footer_list--title">Links</h2>
                        <ul class="veg_footer_list--wrapper">
                           <li class="veg_items"><a href="{{ route('index')}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}"> Home</a></li>
                           <li class="veg_items"><a href="{{ route('about_us')}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}"> About Us</a></li>
                           <li class="veg_items"><a href="{{ route('Products',['id'=>'all'])}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Products</a></li>
                           <li class="veg_items"><a href="{{ route('contact')}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Contact</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-2 col-lg-2 footer_cols">
                     <div class="footer_list--title">
                        <h2 class="footer_list--title">Product</h2>
                        <ul class="veg_footer_list--wrapper">
                           <li class="veg_items"><a href="{{ route('Products',['id'=>'Chips'])}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Chips</a></li>
                           <li class="veg_items"><a href="{{ route('Products',['id'=>'Fried'])}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Fried</a></li>
                           <li class="veg_items"><a href="{{ route('Products',['id'=>'Mixture'])}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Mixture</a></li>
                           <li class="veg_items"><a href="{{ route('Products',['id'=>'Sweets'])}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Sweet</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-3 col-xl-2 veg_footer--cols">
                     <div class="veg_footer--wrapper">
                        <h2 class="footer_list--title">Shop</h2>
                        <ul class="veg_footer_list--wrapper">
                           <li class="veg_items"><a href="{{ route('Cart')}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Cart</a></li>
                           <li class="veg_items"><a href="{{ route('Checkout',['cart_id'=>'null'])}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Checkout</a></li>
                           <li class="veg_items"><a href="{{ route('register')}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  My Account</a></li>
                           <li class="veg_items"><a href="{{ route('wishlist')}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Wishlist</a></li>
                           <li class="veg_items"><a href="{{ route('payment')}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Payment</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-md-6 col-lg-4 col-xl-4 veg_footer--cols">
                     <div class="veg_footer--wrapper">
                        <h2 class="footer_list--title">Address</h2>
                        <p>Kairali Foods and Beverages
                           <br>IV-356 E, Kottakudy Enterprises
                           <br>Kodanad P.O,
                           <br> Koovappady, Perumbavoor,
                           <br>PIN 683544
                        </p>
                        <div class="footer_social--media">
                           <a href="https://www.facebook.com/" target="_blank" class="foo_social--icons">
                           <img data-src="{{ asset('user_asset/images/svg/veg-foo-fb.svg')}}" alt="fb" class="lazyload" width="32" height="32">
                           </a>
                           <a href="https://www.instagram.com/" target="_blank" class="foo_social--icons">
                           <img data-src="{{ asset('user_asset/images/svg/veg-instagram.svg')}}" alt="insta" class="lazyload" width="32" height="32">
                           </a>
                           <a href="https://twitter.com/" target="_blank" class="foo_social--icons">
                           <img data-src="{{ asset('user_asset/images/svg/veg-foo-twitter.svg')}}" alt="twitter" class="lazyload" width="32" height="32">
                           </a>
                           <a href="https://web.whatsapp.com/" target="_blank" class="foo_social--icons">
                           <img data-src="{{ asset('user_asset/images/svg/veg-whatsapp.svg')}}" alt="fb" class="lazyload" width="32" height="32">
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-2 col-lg-2 col-xl-2 veg_footer--cols">
                     <h2 class="footer_list--title">Payment Option</h2>
                     <div class="gateway_images--wrapper">
                        <a>
                        <img data-src="{{ asset('user_asset/images/footer/master.png')}}" alt="master" class="lazyload" width="78" height="34">
                        </a>
                        <a>
                        <img data-src="{{ asset('user_asset/images/footer/visa.png')}}" alt="master" class="lazyload" width="78" height="34">
                        </a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="veg_bottom--footer">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <span class="copyright">© 2024 All right Designed By <a target="_blank" href="https://relaxplzz.com/">Relaxplzz Technologies</a></span>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <div class="modal fade vegetable-search-modal" id="vegetableSearchModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
               <form class="modal-body">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  </button>
                  <div class="vegetable_group">
                     <input type="text" class="form-control" placeholder="Enter your search text" />
                  </div>
                  <button type="submit" class="submit-button">Search</button>
               </form>
            </div>
         </div>
      </div>
      </div>
      <nav class="mobile-nav">
         <a href="{{ route('index')}}" class="bloc-icon">
         <img src="{{ asset('user_asset/images/svg/home.png')}}" alt="home-img">
         </a>
         <a href="{{ route('Products',['id'=>'all'])}}" class="bloc-icon">
         <img src="{{ asset('user_asset/images/svg/pr1.png')}}" alt="product-img">
         </a>
         <a href="{{ route('website_login_page')}}" class="bloc-icon">
         <img src="{{ asset('user_asset/images/svg/user1.png')}}" alt="my-account-img">
         </a>
         <a href="{{ route('Cart')}}" class="bloc-icon">
         <img src="{{ asset('user_asset/images/svg/cart.png')}}" alt="cart-img">
         </a>
         <a href="{{ route('wishlist')}}" class="bloc-icon">
         <img src="{{ asset('user_asset/images/svg/wish.png')}}" alt="wishlist-img">
         </a>
      </nav>
      @yield('script')

   </body>
</html>
