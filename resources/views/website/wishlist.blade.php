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
      <link rel="stylesheet" href="{{ asset('user_asset/css/pages/wishlist.css')}}">
      @endsection
      @section('content')

         <section class="common_banner--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h1 class="banner_title">Wishlist</h1>
                     <nav class="breadcum_wrapper">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{ route('index') }}">Home</a></li>
                           <li class="breadcrumb-item active">Wishlist</li>
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </section>
         <section class="wishlist_wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <div class="wishlist_title--wrapper">
                        <h2 class="wishlist_main_title">My wishlist on</h2>
                        <h3 class="wishlist_subtitle">Vegetable Shop</h3>
                        <div class="wishlist_btn--wrapper">
                        <form action="{{ route('clear_wishlist') }}" method="POST" style="display:inline;">
                              @csrf
                              <button type="submit" class="wishlist_btn">CLEAR WISHLIST</button>
                           </form>                          
                           
                        </div>
                     </div>
                  </div>
                  <div class="col-12">
                     <div class="wishlist_stock--wrapper">
                        @foreach($product as $pro)
                        @php $pro_detail = App\Models\ProductModel::where('product_id',$pro->product_id)->first(); @endphp
                        <ul class="wishlist_cart--wrapper" data-aos="fade-up">
                           <li class="cart_title--wrapper">
                              <div class="cart_img--wrapper">
                                 <img data-src="{{ asset($pro_detail->image)}}" alt="wishlist" class="lazyload" width="50" height="50">
                              </div>
                              <span class="wishlist_title">{{$pro_detail->product_name}}</span>
                           </li>
                           <li class="wishlist_price--wrapper">
                              <span class="wishlist_price"><span class="main_price">₹ {{$pro_detail->mrp}}</span>  ₹ {{$pro_detail->retail}}</span>
                           </li>
                           <li class="instock_wrapper">
                           @php 
                                $color = ($pro_detail->stock == "Instock") ? "green" : "red" ;
                                $btnn = ($pro_detail->stock == "Instock") ? "" : "none" ;

                           @endphp
                              <span class="instock" style="color:{{$color}};">{{ $pro_detail->stock }}</span>
                           </li>
                           <li class="add_to_cart--wrapper">
                              <a style="pointer-events: {{$btnn}};" class="buy_now--btn inactive" href="#" onclick="document.getElementById('Cart_form_{{ $pro_detail->product_id }}').submit(); return false;">
                                 ADD TO CART
                              </a>
                              <form id="Cart_form_{{ $pro_detail->product_id }}" method="POST" action="{{ route('add_to_cart') }}" style="display:none;">
                                 @csrf
                                 <input name="product_id" type="hidden" value="{{ $pro_detail->product_id }}">
                                 <input name="from" type="hidden" value="wishlist">
                              </form>
                           </li>
                           <li class="delete_wrapper">
                           <a href="{{ route('single_delete',['id'=>$pro->id]) }}" class="delete_btn">
                                 <img data-src="{{ asset('user_asset/images/svg/cross.svg')}}" alt="delete" class="lazyload" width="12" height="12">
                           </a>

                           </li>
                        </ul>
                        @endforeach
                        <div class="shopping_btn--wrapper">
                           <a href="{{route('Products',['id'=>'All'])}}" class="add_to_cart--btn shopping_btn">GO SHOPPING</a>
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
