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
@section('content')

         <section class="common_banner--wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-12">
                     <h1 class="banner_title">Cart</h1>
                     <nav class="breadcum_wrapper">
                        <ol class="breadcrumb">
                           <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
                           <li class="breadcrumb-item active">Cart</li>
                        
                        </ol>
                     </nav>
                  </div>
               </div>
            </div>
         </section>
         <section class="cart_v2--wrapper">
            <div class="container">
            <div id="messageElement" style="display:none;color:red;" class="p-3"></div>
               <div class="row">
               <div class="col-lg-12 cart_v2--cols">
    <ul class="cart_orders--wrapper">
      @php $cart_default_total=[]; @endphp
        @foreach($product as $pro)

        @php array_push($cart_default_total,$pro->total_price); @endphp


        <li class="order_list" data-aos="fade-up">
            <div class="item_img--wrapper">
                <img data-src="{{ asset($pro->image) }}" alt="cart-img" class="lazyload" width="70" height="70">
            </div>
            <div class="item_name">
                {{$pro->product_name}} <br>
                <span class="product_item--price cart-weight">1 Kg</span>
                <span class="product_item--price">₹ {{$pro->retail}}</span>
            </div>
            <div class="quantity add_quantity">
            <a class="quantity-status quantity__minus" id="decreaseValue{{ $pro->id }}" onclick="decreaseValue({{ $pro->id }})"><span>-</span></a>
            <input name="quantity" type="text" class="quantity__input" id="number{{ $pro->id }}" value="{{ $pro->quantity }}" disabled>
                <a class="quantity-status quantity__plus" id="increaseValue" onclick="increaseValue({{ $pro->id }})"><span>+</span></a>
            </div>
            <div class="item_price" id="update_value{{ $pro->id }}">₹ {{$pro->total_price}}</div>
            <a href="{{ route('cart_single_delete', ['id' => $pro->id]) }}" class="delete_item">
                <img data-src="{{ asset('user_asset/images/svg/delete.svg') }}" alt="delete" class="lazyload" width="10" height="10">
            </a>

        </li>
        @endforeach
    </ul>
    <ul class="order_list_total--wrapper" data-aos="fade-up" data-aos-delay="600">
        <li class="order_list--total">
            <a href="{{route('Products',['id'=>'All'])}}" class="continue_btn--wrapper">
                <span class="back_wrapper">
                    <img data-src="{{ asset('user_asset/images/svg/arrowleft.svg') }}" alt="back" class="lazyload" width="10" height="10">
                </span>
                <span class="continue_shopping">Continue Shopping</span>
            </a>
            <div class="subtotal_wrapper">
                <span class="subtotal_name">SUBTOTAL</span>
                <span class="subtotal_price" id="cart_total{{ $pro->id }}">₹ {{array_sum($cart_default_total)}}</span>
            </div>
        </li>
    </ul>
    <a class="btn btn-sm btn-primary" href="checkout" id="checkout">Proceed To Checkout</a>
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


      <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
      <script>
      $(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});

function increaseValue(num) {
    var value = parseInt($('#number' + num).val()) + 1;
    $.post('{{ route('update_quantity') }}', {
        'quantity': value,
        'id': num
    })
    .done(function(res) {
        $('#messageElement').text(''); // Clear previous messages
        if (res.status === 'noquantity') {
            $('#messageElement').text('Stock not available').show();
            $('#checkout').addClass('disabled').off('click'); // Disable the checkout button
        } else if (res.status === 'minus_value') {
            $('#messageElement').text('Quantity must be greater than 1').show();
            $('#checkout').addClass('disabled').off('click');
         } else {
            $('#messageElement').hide();
            $('#number' + num).val(value);
            $('#update_value' + num).text('₹ ' + res.update_value);
            $('#cart_total' + num).text('₹ ' + res.cart_total);
            $('#decreaseValue' + num).prop('disabled', false);
            $('#checkout').removeClass('disabled').off('click').attr('href', 'checkout'); // Re-enable and set href
        }
    });
}

function decreaseValue(num) {
    var value = parseInt($('#number' + num).val()) - 1;
    if (value < 1) {
        $('#messageElement').text('Quantity must be greater than 1').show();
        $('#checkout').addClass('disabled').off('click');
        return;
    }
    $.post('{{ route('update_quantity') }}', {
        'quantity': value,
        'id': num
    })
    .done(function(res) {
        $('#messageElement').text(''); // Clear previous messages
        if (res.status === 'minus_value') {
            $('#messageElement').text('Quantity must be greater than 1').show();
            $('#checkout').addClass('disabled').off('click');

        } else {
            $('#messageElement').hide();
            $('#number' + num).val(value);
            $('#update_value' + num).text('₹ ' + res.update_value);
            $('#cart_total' + num).text('₹ ' + res.cart_total);
            $('#decreaseValue' + num).prop('disabled', false);
            // Check if we need to re-enable the checkout button
          
        }
    });
}

</script>


      @endsection
