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
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">


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
                              
                        <div class="d-flex">
                          <h1 class="cart_title">Shipping Details</h1>
                        </div>
                        <div class="mailing_address--wrapper justify-content-between mt-3">
                              <h3 class="customer_name">Name: <strong>{{$user->username}}</strong></h3>
                              <p ><span class="__cf_email__">Email: <strong>{{$user->email}}</strong></span></p>
                              <p class="phone_no">Phone: <strong>{{$user->phone}}</strong></p>
                        </div>
                     
                        @foreach($user_address as $addr)
                           <div class="card mt-3 pl-3">
                              <div class="address_wrapper d-flex justify-content-between">
                                 <div class="mt-3">
                                    <input type="radio" name="selected_address" value="{{$addr->id}}" {{($addr->status == "Active") ? "checked" : "" }} class="address-checkbox">
                                 </div>
                              <div class="address_details--wrapper">
                                       <address>{{$addr->address}} ,{{$addr->city}} ,{{$addr->district}} ,{{$addr->state}} ,{{$addr->pincode}}</address>
                                    </div>
                                    <div class="p-3">
                                       <a class="editAddressForm" data-id="{{$addr->id}}">
                                         <img data-src="{{ asset('user_asset/images/svg/edit.png') }}" alt="delete" class="lazyload" width="20" height="20">
                                       </a>
                                       <a class="delete-btn" data-id="{{$addr->id}}">
                                          <img data-src="{{ asset('user_asset/images/svg/delete_add.png') }}" alt="delete" class="lazyload" width="20" height="20">
                                          
                                       </a>
                                    </div>
                              </div>
                           </div>
                        @endforeach


                        
                        <div class="button mt-4 d-flex justify-content-between">
                        <button id="showAddressForm" class="button" style="background-color:orange; color:white;padding:5px;border-radius:5px;border:0px;">
                           Add New Address
                        </button> 
                        <button id="showCouponForm" class="button" style="background-color:orange; color:white;padding:5px;border-radius:5px;border:0px;">
                           Coupon code
                        </button> 
                       </div>
                       
                        <div id="addressForm" style="display:none;">
                           <form method="POST" action="{{route('add_address')}}" id="addAddressForm">
                              @csrf
                              <div class="row">
                              <div class="form-group col-lg-6">
                                    <label for="address">Address:</label>
                                    <input type="text"  name="address" class="form-control" value="{{old('address')}}">
                                    @error('address')<div class="text-danger">{{$message}}</div>@enderror
                                    <span class="text-danger" id="addressError"></span>

                              </div>
                              <div class="form-group col-lg-6">
                                    <label for="city">City:</label>
                                    <input type="text"  name="city" class="form-control" value="{{old('city')}}">
                                    @error('city')<div class="text-danger">{{$message}}</div>@enderror
                                    <span class="text-danger" id="cityError"></span>

                              </div>
                              </div>
                              <div class="row">
                              <div class="form-group col-lg-6">
                                    <label for="address">District:</label>
                                    <input type="text"  name="district" class="form-control" value="{{old('district')}}">
                                    @error('district')<div class="text-danger">{{$message}}</div>@enderror
                                    <span class="text-danger" id="districtError"></span>
                                 </div>
                              <div class="form-group col-lg-6">
                                    <label for="city">State:</label>
                                    <input type="text"  name="state" class="form-control" value="{{old('state')}}">
                                    @error('state')<div class="text-danger">{{$message}}</div>@enderror
                                    <span class="text-danger" id="stateError"></span>
                              </div>
                              </div>
                              <div class="row">
                              <div class="form-group col-lg-6">
                                    <label for="address">Pincode:</label>
                                    <input type="text" name="pincode" class="form-control" value="{{old('pincode')}}">
                                    @error('pincode')<div class="text-danger">{{$message}}</div>@enderror
                                    <span class="text-danger" id="pincodeError"></span>
                              </div>
                            
                              </div>

                              <button type="submit" id="addAddressButton" class="button" style="background-color:green; color:white;padding:5px;border-radius:5px;border:0px;">
                                    Save and deliver here
                              </button>
                              <a id="cancelAddButton" class="button" style="background-color:orange; color:white;padding:5px;border-radius:5px;border:0px;">
                                 Cancel
                              </a>
                           </form>
                        </div>
                        <div id="ShowForm" style="display:none;">
                           <form method="POST" id="ApplyCouponForm" action="{{ route('add_address') }}">
                              @csrf
                              <div class="row">
                                    <div class="form-group col-lg-12">
                                       <label for="coupon_amount">Coupon Code:</label>
                                       <input type="text" name="coupon_code" id="coupon_code" class="form-control" value="{{ old('coupon_code') }}">
                                       <span class="text-danger" id="coupon_code_error"></span>
                                    </div>
                              </div>
                              <button type="submit" class="button" style="background-color:green; color:white;padding:5px;border-radius:5px;border:0px;">
                                    Apply coupon code
                              </button>
                           </form>
                        </div>


                        <div id="addressFormedit" style="display:none;">
                        <form method="POST" action="{{ route('edit_address') }}" id="editAddressForm">
                                 @csrf
                                 <input type="hidden" name="id" id="addressId">
                                 <div class="row">
                                    <div class="form-group col-lg-6">
                                          <label for="address">Address:</label>
                                          <input type="text" name="address" id="address" class="form-control" >
                                          <span class="text-danger" id="addressError1"></span>
                                    </div>
                                    <div class="form-group col-lg-6">
                                          <label for="city">City:</label>
                                          <input type="text" name="city" id="city" class="form-control" >
                                          <span class="text-danger" id="cityError1"></span>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="form-group col-lg-6">
                                       <label for="district">District:</label>
                                       <input type="text" name="district" id="district" class="form-control" >
                                       <span class="text-danger" id="districtError1"></span>
                                 </div>
                                 <div class="form-group col-lg-6">
                                       <label for="state">State:</label>
                                       <input type="text" name="state" id="state" class="form-control">
                                       <span class="text-danger" id="stateError1"></span>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="form-group col-lg-6">
                                       <label for="pincode">Pincode:</label>
                                       <input type="text" name="pincode" id="pincode" class="form-control">
                                       <span class="text-danger" id="pincodeError1"></span>
                                 </div>
                              </div>
                              <button type="submit" id="editSubmitButton" class="button" style="background-color:green; color:white;padding:5px;border-radius:5px;border:0px;">
                                 Change and deliver here
                              </button>
                              <a id="cancelButton" class="button" style="background-color:orange; color:white;padding:5px;border-radius:5px;border:0px;">
                                 Cancel
                              </a>
                           </form>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-6 cart_right--col">
                     <div class="your_order--wrapper cart_cols" data-aos="fade-left">
                        <h1 class="cart_title">Your Order</h1>
                        <ul class="cart_orders--wrapper">
                        @php $cart_default_total=[]; @endphp
                           @foreach($cart_product as $cart)
                           @php array_push($cart_default_total,$cart->total_price); @endphp
                           <li class="order_list">
                              <div class="item_img--wrapper">
                                 <img data-src="{{ asset($cart->image)}}" alt="cart-img" class="lazyload" width="82" height="64">
                              </div>
                              <div class="item_name">
                                 <span>{{$cart->product_name}}</span><br>
                                 <small>{{$cart->retail}}</small>
                              </div>
                              <div class="itme_nos">
                                 <span>{{$cart->quantity}}</span>
                              </div>
                              <div class="item_price">₹ {{ $cart->total_price }}</div>
                           </li>
                           @endforeach
                        
                        </ul>
                        <ul class="order_list_total--wrapper">
                           <li class="order_list--total">
                              <a href="{{route('Products',['id'=>'All'])}}" class="continue_btn--wrapper">
                              <span class="back_wrapper">
                              <img data-src="{{ asset('user_asset/images/svg/arrowleft.svg')}}" alt="back" class="lazyload" width="16" height="16">
                              </span>
                              <span class="continue_shopping">Continue Shopping</span>
                              </a>
                              <div class="subtotal_wrapper">
                                 <span class="subtotal_name">SUBTOTAL</span>
                                 <span class="subtotal_price">₹ {{array_sum($cart_default_total)}}</span>
                              </div>
                           </li>
                        </ul>
                        <ul>

                        <li>
                           <div class="mt-5">
                                 <a id="placeOrderBtn" class="btn post_comment--btn" href="#">PLACE ORDER</a>

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
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>

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





<script>
document.querySelectorAll('.editAddressForm').forEach(button => {
    button.addEventListener('click', function() {
        var addressFormedit = document.getElementById('addressFormedit');
        var addressId = this.getAttribute('data-id');
        var csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        addressFormedit.style.display = 'block';
        $('#showAddressForm').hide();
        document.getElementById('addressForm').style.display = 'none';
        $('.text-danger').text('');
        $('#editSubmitButton').prop('disabled', false);
        $('#addAddressButton').prop('disabled', false);


        
        fetch(`/get_address/${addressId}`, {
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            if (data.error) {
                throw new Error(data.error);
            }
            document.getElementById('addressId').value = data.id;
            document.getElementById('address').value = data.address || '';
            document.getElementById('city').value = data.city || '';
            document.getElementById('district').value = data.district || '';
            document.getElementById('state').value = data.state || '';
            document.getElementById('pincode').value = data.pincode || '';

         })
        .catch(error => {
            console.error('Error fetching address data:', error);
            alert('Error fetching address data: ' + error.message);
        });
    });
});

document.getElementById('cancelButton').addEventListener('click', function() {
    var addressFormedit = document.getElementById('addressFormedit');
    addressFormedit.style.display = 'none';
    $('#showAddressForm').show();
    $('.text-danger').text('');
    $('#editSubmitButton').prop('disabled', false);

    
});

document.getElementById('cancelAddButton').addEventListener('click', function() {
    var addressForm = document.getElementById('addressForm');
    addressForm.style.display = 'none';
    $('#showAddressForm').show();
    $('.text-danger').text('');
    $('#addAddressButton').prop('disabled', false);

    
});

</script>
    
         @if ($errors->any())
            <script>
               document.addEventListener('DOMContentLoaded', function() {
                     document.getElementById('addressForm').style.display = 'block';
               });
            </script>
         @endif
         <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#editAddressForm').on('submit', function(e) {
        let valid = true;

        $('.text-danger').text('');

        if ($('#address').val().trim() === '') {
            $('#addressError1').text('Address is required.');
            valid = false;
        }

        if ($('#city').val().trim() === '') {
            $('#cityError1').text('City is required.');
            valid = false;
        }

        if ($('#district').val().trim() === '') {
            $('#districtError1').text('District is required.');
            valid = false;
        }

        if ($('#state').val().trim() === '') {
            $('#stateError1').text('State is required.');
            valid = false;
        }

        const pincode = $('#pincode').val().trim();
        if (pincode === '') {
            $('#pincodeError1').text('Pincode is required.');
            valid = false;
        } else if (!/^\d{6}$/.test(pincode)) {
            $('#pincodeError1').text('Pincode must be a 6-digit number.');
            valid = false;
        }

        const submitButton = $('#editSubmitButton');
        if (!valid) {
            submitButton.prop('disabled', true); 
            e.preventDefault(); 
        } else {
            submitButton.prop('disabled', false); 
        }
    });

    $('#editAddressForm input').on('input', function() {
        $('#editSubmitButton').prop('disabled', false);
        

    });
});
</script>

<script>
$(document).ready(function() {
    $('#addAddressForm').on('submit', function(e) {
        let valid = true;

        $('.text-danger').text('');

        if ($('#address').val().trim() === '') {
            $('#addressError').text('Address is required.');
            valid = false;
        }

        if ($('#city').val().trim() === '') {
            $('#cityError').text('City is required.');
            valid = false;
        }

        if ($('#district').val().trim() === '') {
            $('#districtError').text('District is required.');
            valid = false;
        }

        if ($('#state').val().trim() === '') {
            $('#stateError').text('State is required.');
            valid = false;
        }

        const pincode = $('#pincode').val().trim();
        if (pincode === '') {
            $('#pincodeError').text('Pincode is required.');
            valid = false;
        } else if (!/^\d{6}$/.test(pincode)) {
            $('#pincodeError').text('Pincode must be a 6-digit number.');
            valid = false;
        }

        const submitButton = $('#addAddressButton');
        if (!valid) {
            submitButton.prop('disabled', true); 
            e.preventDefault(); 
        } else {
            submitButton.prop('disabled', false); 
        }
    });

    $('#addAddressForm input').on('input', function() {
        $('#addAddressButton').prop('disabled', false);
    });
});
</script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-btn').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault(); // Prevent default action (e.g., if it's a link)
            
            const id = this.getAttribute('data-id');
            
            // Show SweetAlert confirmation dialog
            Swal.fire({
                title: 'Are you sure?',
                text: 'This action cannot be undone.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = `/delete_address/${id}`;
                }
            });
        });
    });
});
</script>
<script>

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('placeOrderBtn').addEventListener('click', function(event) {
        event.preventDefault();

        const selectedAddress = document.querySelector('input[name="selected_address"]:checked');
        
        if (selectedAddress) {
            const addressId = selectedAddress.value;
            window.location.href = `place_order/${addressId}`;
        } else {
            alert('Please select an address before placing the order.');
        }
    });
});
</script>
<script>
$(document).ready(function() {
    $('#ApplyCouponForm').on('submit', function(e) {
        let valid = true;

        $('.text-danger').text('');

        let couponAmount = $('#coupon_code').val().trim();

        if (couponAmount === '') {
            $('#coupon_code_error').text('Enter coupon code.');
            valid = false;
        }
       

        const submitButton = $('#ApplyCouponForm button[type="submit"]');
        if (!valid) {
            submitButton.prop('disabled', true); 
            e.preventDefault(); 
        } else {
            submitButton.prop('disabled', false); 
        }
    });

    $('#ApplyCouponForm input').on('input', function() {
        $('#ApplyCouponForm button[type="submit"]').prop('disabled', false);
    });
});
</script>

<script>
document.getElementById('showCouponForm').addEventListener('click', function() {
    var ShowForm = document.getElementById('ShowForm');
    if (ShowForm.style.display === 'none' || ShowForm.style.display === '') {
        ShowForm.style.display = 'block';
    } else {
        ShowForm.style.display = 'none';
    }
});
</script>












      @endsection


