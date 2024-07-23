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
      <link rel="stylesheet" href="{{ asset('user_asset/css/pages/cart-v2.css')}}">
      @endsection
      <style>
        .cart_orders--wrapper {
        box-shadow:0px 0px 10px rgb(0 0 0 / 45%); /* Adjust the values as needed */
        padding: 20px;
        }
        .order_table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        margin-top: 20px;
        }
        .order_table th,
        .order_table td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
        }
        .order_table th {
        background-color: #f2f2f2;
        }
        .item_img--wrapper img {
        max-width: 100%;
        height: auto;
        }
        /* Order Summary Styles */
        .order_summary {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-top: 20px;
        }
        .order_placed,
        .order_total {
        font-size: 16px;
        }
        .order_actions {
        margin-top: 10px;
        }
        .order_actions a {
        display: inline-block;
        margin-right: 10px;
        text-decoration: none;
        color: #333;
        border: 1px solid #333;
        padding: 5px 10px;
        border-radius: 5px;
        transition: background-color 0.3s ease;
        }
        .order_actions a:hover {
        background-color: #333;
        color: #fff;
        }
     </style>
@section('content')

         <section class="common_banner--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h1 class="banner_title">My Account</h1>
                     <nav class="breadcum_wrapper">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="">Home</a></li>
                           <li class="breadcrumb-item active">My Orders</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </section>
         <section class="cart_v2--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-lg-12 cart_v2--cols">
                     <ul class="cart_orders--wrapper">
                        <div class="order_summary">
                           <span class="order_placed"><strong>Order Id:</strong> #1254</span>
                           <span class="order_placed"><strong>Order Placed:</strong> June 7, 2024</span>
                           <span class="order_placed"><strong>Order Status:</strong> Deliverd</span>
                           <span class="order_placed"><strong>Total:</strong> ₹ 1500</span>
                        </div>
                        <!-- Order Items -->
                        <table class="order_table" data-aos="fade-up">
                           <thead>
                              <tr>
                                 <th>Slno</th>
                                 <th>Product image</th>
                                 <th>Product name</th>
                                 <th>Quantity</th>
                                 <th>Price</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr>
                                 <td>1</td>
                                 <td>
                                    <div class="item_img--wrapper">
                                       <img data-src="{{ asset('user_asset/images/cart/placeholder-img.png')}}" alt="cart-img" class="lazyload" width="138" height="138">
                                    </div>
                                 </td>
                                 <td class="item_name">PEANUT BALL</td>
                                 <td>
                                    <div class="quantity add_quantity">
                                       <input name="quantity" type="text" class="quantity__input" value="1" disabled>
                                    </div>
                                 </td>
                                 <td>₹ 450</td>
                              </tr>
                              <tr>
                                 <td>2</td>
                                 <td>
                                    <div class="item_img--wrapper">
                                       <img data-src="{{ asset('user_asset/images/cart/placeholder-img2.png')}}" alt="cart-img" class="lazyload" width="138" height="138">
                                    </div>
                                 </td>
                                 <td class="item_name">PAKKAVADA</td>
                                 <td>
                                    <div class="quantity add_quantity">
                                       <input name="quantity" type="text" class="quantity__input" value="2" disabled>
                                    </div>
                                 </td>
                                 <td>₹ 600</td>
                              </tr>
                              <tr>
                                 <td>3</td>
                                 <td>
                                    <div class="item_img--wrapper">
                                       <img data-src="{{ asset('user_asset/images/cart/placeholder-img3.png')}}" alt="cart-img" class="lazyload" width="138" height="138">
                                    </div>
                                 </td>
                                 <td class="item_name">KERALA MIXTURE</td>
                                 <td>
                                    <div class="quantity add_quantity">
                                       <input name="quantity" type="text" class="quantity__input" value="1" disabled>
                                    </div>
                                 </td>
                                 <td>₹ 450</td>
                              </tr>
                              <!-- Add more rows as needed -->
                           </tbody>
                        </table>
                  </div>
               </div>
               </li>
               </ul>
               <ul class="cart_orders--wrapper">
                  <div class="order_summary">
                     <span class="order_placed"><strong>Order Id:</strong> #5846</span>
                     <span class="order_placed"><strong>Order Placed:</strong> June 7, 2024</span>
                     <span class="order_placed"><strong>Order Status:</strong> Deliverd</span>
                     <span class="order_placed"><strong>Total:</strong> ₹ 1500</span>
                  </div>
                  <!-- Order Items -->
                  <table class="order_table" data-aos="fade-up">
                     <thead>
                        <tr>
                           <th>Slno</th>
                           <th>Product image</th>
                           <th>Product name</th>
                           <th>Quantity</th>
                           <th>Price</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td>1</td>
                           <td>
                              <div class="item_img--wrapper">
                                 <img data-src="{{ asset('user_asset/images/cart/placeholder-img.png')}}" alt="cart-img" class="lazyload" width="138" height="138">
                              </div>
                           </td>
                           <td class="item_name">PEANUT BALL</td>
                           <td>
                              <div class="quantity add_quantity">
                                 <input name="quantity" type="text" class="quantity__input" value="1" disabled>
                              </div>
                           </td>
                           <td>₹ 450</td>
                        </tr>
                        <tr>
                           <td>2</td>
                           <td>
                              <div class="item_img--wrapper">
                                 <img data-src="{{ asset('user_asset/images/cart/placeholder-img2.png')}}" alt="cart-img" class="lazyload" width="138" height="138">
                              </div>
                           </td>
                           <td class="item_name">PAKKAVADA</td>
                           <td>
                              <div class="quantity add_quantity">
                                 <input name="quantity" type="text" class="quantity__input" value="2" disabled>
                              </div>
                           </td>
                           <td>₹ 600</td>
                        </tr>
                        <tr>
                           <td>3</td>
                           <td>
                              <div class="item_img--wrapper">
                                 <img data-src="{{ asset('user_asset/images/cart/placeholder-img3.png')}}" alt="cart-img" class="lazyload" width="138" height="138">
                              </div>
                           </td>
                           <td class="item_name">KERALA MIXTURE</td>
                           <td>
                              <div class="quantity add_quantity">
                                 <input name="quantity" type="text" class="quantity__input" value="1" disabled>
                              </div>
                           </td>
                           <td>₹ 450</td>
                        </tr>
                        <!-- Add more rows as needed -->
                     </tbody>
                  </table>
            </div>
      </div>
      </li>
      </ul>
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
      <script src="{{ asset('user_asset/js/pages/increment-decrement.js')}}"></script>
      <script src="{{ asset('user_asset/js/main.js')}}"></script>
 @endsection
