<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Sithas foods - Sweet, Mixture, Fried, Chips</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <link rel="shortcut icon" href="{{ asset('user_asset/images/vegetable/veg-logo.png')}}" type="image/x-icon">
     @yield('link')
   </head>
   <body>
 
      <div class="about_us_main--wrapper">
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
         <header class="default_header">
            <nav class="navbar navbar_default navbar-expand-lg">
               <a class="navbar-brand navbrand_mobile" href="{{ route('index')}}">
               <img data-src="{{ asset('user_asset/images/vegetable/veg-logo.png')}}" alt="logo" class="lazyload" width="84" height="85">
               </a>
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-icon">
               <img data-src="{{ asset('user_asset/images/svg/menu.svg')}}" alt="menu-icon" class="hamburger_menu lazyload" width="30" height="30">
               <img data-src="{{ asset('user_asset/images/svg/plus.svg')}}" alt="menu-icon" class="cross_image ls-is-cached lazyloaded" width="26" height="26" src="{{ asset('user_asset/images/svg/plus.svg')}}">
               </span>
               </button>
               <div class="collapse navbar-collapse" id="navbarSupportedContent">
                  <a class="navbar-brand navbrand_desktop" href="{{ route('index')}}">
                  <img data-src="{{ asset('user_asset/images/vegetable/veg-logo.png')}}" alt="logo" class="lazyload" width="84" height="85">
                  </a>
                  <ul class="navbar-nav">
                     <li class="nav-item sub-menu">
                        <a class="nav-link linked" href="{{ route('index')}}">Home</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link active" href="{{ route('about_us')}}">About Us</a>
                     </li>
                     <li class="nav-item sub-menu">
                        <a class="nav-link linked" href="#">Products <span>&#9660;</span></a>
                        <ul class="nav-item">
                           <li><a class="nav-link" href="{{ route('Products',['id'=>'Chips'])}}">Chips</a></li>
                           <li><a class="nav-link" href="{{ route('Products',['id'=>'Fried'])}}">Fried</a></li>
                           <li><a class="nav-link" href="{{ route('Products',['id'=>'Mixture'])}}">Mixture</a></li>
                           <li><a class="nav-link" href="{{ route('Products',['id'=>'Sweets'])}}">Sweet</a></li>
                        </ul>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('Products',['id'=>'All'])}}">Shop</a>           
                      </li>
                     <li class="nav-item">
                        <a class="nav-link" href="{{ route('contact')}}">Contact</a>
                     </li>
                  </ul>
                  <div class="icons_menu--btns">
                     <div class="icons_menu--btns">
                        <ul>
                           <li class="nav-item sub-menu">
                              <a href="{{ route('website_login_page')}}">
                              <img data-src="{{ asset('user_asset/images/svg/user.svg')}}" alt="user" class="lazyload" width="20" height="20">
                              <span style="color: #fff;">&#9660;</span>
                              </a>

                              <ul class="nav-item">
                                 @guest
                                  <li><a class="nav-link" href="{{ route('website_login_page')}}"><img src="{{ asset('user_asset/images/svg/log.png')}}"> Login</a></li>
                               @endguest
                              @auth
                                 
                                 <li>
                                    <form method="post" action="{{ route('website_logout') }}">
                                       @csrf
                                     <button class="nav-link" ><img src="{{ asset('user_asset/images/svg/log.png')}}"> Logout</button>
                                    </form>
                                 </li>
                                 @guest
                                 <li><a class="nav-link" href="{{ route('register')}}"><img src="{{ asset('user_asset/images/svg/register.png')}}"> Register</a></li>
                                 @endguest
                                 <li><a class="nav-link" href="{{ route('Profile')}}"><img src="{{ asset('user_asset/images/svg/profile.png')}}"> Profile</a></li>
                                 <li><a class="nav-link" href="{{ route('Order')}}"><img src="{{ asset('user_asset/images/svg/12121.png')}}"> My Order</a></li>
                              @endauth
                              </ul>
                           </li>
                           <!-- <li class="nav-item ">
                              <a href="javascript:void(0)" data-toggle="modal" data-target="#aboutSearchModal">
                              <img data-src="{{ asset('user_asset/images/svg/search.svg')}}" alt="search" class="lazyload" width="20" height="20">
                              </a>
                           </li> -->
                           @auth
                           <li class="nav-item ">
                              <a href="{{ route('wishlist',['pro_id'=>'empty'])}}"  class="cart_link"> 
                              <img data-src="{{ asset('user_asset/images/svg/like.svg')}}" alt="like" class="lazyload" width="20" height="20">
                              <span class="cart_count"><b>{{ App\models\WhishlistModel::where('user_id',Auth::user()->user_id)->count() }}</b></span>
                              </a>
                           </li>
                           <li class="nav-item ">
                              <a href="{{ route('Cart')}}" class="cart_link">
                              <img data-src="{{ asset('user_asset/images/svg/cart.svg')}}" alt="cart" class="lazyload" width="20" height="20">
                              <span class="cart_count"><b>{{ App\models\CartModel::where('user_id',Auth::user()->user_id)->where('status','New')->count() }}</b></span>
                              </a>
                           </li>
                           @endauth
                        </ul>
                     </div>
                  </div>
               </div>
            </nav>
         </header>
     @yield('content')
         <footer class="default_footer">
            <div class="container">
               <div class="row">
                  <div class="col-sm-6 col-lg-2 footer_cols">
                     <div class="foo_cols--wrapper">
                        <h2 class="foo_title">Links</h2>
                        <ul class="list_item--wrapper">
                           <li class="list_items"><a href="{{ route('index')}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}"> Home</a></li>
                           <li class="list_items"><a href="{{ route('about_us')}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}"> About Us</a></li>
                           <li class="list_items"><a href="{{ route('Products',['id'=>'all'])}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Products</a></li>
                           <li class="list_items"><a href="{{ route('contact')}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Contact</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-6 col-lg-2 footer_cols">
                     <div class="foo_cols--wrapper">
                        <h2 class="foo_title">Product</h2>
                        <ul class="list_item--wrapper">
                           <li class="list_items"><a href="{{ route('Products',['id'=>'Chips'])}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Chips</a></li>
                           <li class="list_items"><a href="{{ route('Products',['id'=>'Fried'])}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Fried</a></li>
                           <li class="list_items"><a href="{{ route('Products',['id'=>'Mixture'])}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Mixture</a></li>
                           <li class="list_items"><a href="{{ route('Products',['id'=>'Sweets'])}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Sweet</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-6 col-lg-2 footer_cols">
                     <div class="foo_cols--wrapper">
                        <h2 class="foo_title">Shop</h2>
                        <ul class="list_item--wrapper">
                           <li class="list_items"><a href="{{ route('Cart')}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Cart</a></li>
                           <li class="list_items"><a href="{{ route('register')}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  My Account</a></li>
                           <li class="list_items"><a href="{{ route('wishlist',['pro_id'=>'empty'])}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Wishlist</a></li>
                           <li class="list_items"><a href="{{ route('payment')}}"><img style="margin-right: 5px;" data-src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}" alt="arrow-right" class=" ls-is-cached lazyloaded" width="12" height="10"  src="{{ asset('user_asset/images/svg/veg-arrow-right.svg')}}">  Payment</a></li>
                        </ul>
                     </div>
                  </div>
                  <div class="col-sm-6 col-lg-4 footer_cols">
                     <div class="foo_cols--wrapper">
                        <div class="newsletter_wrapper">
                           <h2 class="foo_title">Address</h2>
                           <p>Kairali Foods and Beverages
                              <br>IV-356 E, Kottakudy Enterprises
                              <br>Kodanad P.O,
                              <br> Koovappady, Perumbavoor,
                              <br>PIN 683544
                           </p>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-lg-2 footer_cols">
                     <h2 class="foo_title">Follow Us</h2>
                     <div class="social_icons--wrapper">
                        <a href="https://www.facebook.com/" target="_blank" class="social_icons">
                        <img data-src="{{ asset('user_asset/images/svg/fb.svg')}}" alt="fb" class="lazyload" width="9" height="17">
                        </a>
                        <a href="#" target="_blank" class="social_icons">
                        <img data-src="{{ asset('user_asset/images/svg/instagram.svg')}}" alt="dribble" class=" ls-is-cached lazyloaded" width="15" height="15" src="{{ asset('user_asset/images/svg/instagram.svg')}}">
                        </a>
                        <a href="https://twitter.com/" target="_blank" class="social_icons">
                        <img data-src="{{ asset('user_asset/images/svg/twitter.svg')}}" alt="twitter" class="lazyload" width="16" height="13">
                        </a>
                     </div>
                     <h2 class="foo_title">Payment Option</h2>
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
               <div class="col-md-12 text-center">
                  <span class="copyright">© 2024 All right Designed By <a target="_blank" href="https://relaxplzz.com/">Relaxplzz Technologies</a></span>
               </div>
            </div>
         </footer>
         <div class="modal fade default-search-modal" id="aboutSearchModal" tab{{ route('index')}}="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
               <div class="modal-content">
                  <form class="modal-body">
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                     <div class="default_form_group">
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
         <a href="{{ route('wishlist',['pro_id'=>'empty'])}}" class="bloc-icon">
         <img src="{{ asset('user_asset/images/svg/wish.png')}}" alt="wishlist-img">
         </a>
      </nav>
    @yield('script')
   </body>
</html>
