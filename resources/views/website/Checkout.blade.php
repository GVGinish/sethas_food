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
    <form method="POST" action="{{ route('add_address') }}" id="addAddressForm">
        @csrf
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="addAddress">Address:</label>
                <input type="text" name="address" id="addAddress" class="form-control" value="{{ old('address') }}">
                @error('address')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <span class="text-danger" id="addressError"></span>
            </div>
            <div class="form-group col-lg-6">
                <label for="addCity">City:</label>
                <input type="text" name="city" id="addCity" class="form-control" value="{{ old('city') }}">
                @error('city')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <span class="text-danger" id="cityError"></span>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="addDistrict">District:</label>
                <input type="text" name="district" id="addDistrict" class="form-control" value="{{ old('district') }}">
                @error('district')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <span class="text-danger" id="districtError"></span>
            </div>
            <div class="form-group col-lg-6">
                <label for="addState">State:</label>
                <input type="text" name="state" id="addState" class="form-control" value="{{ old('state') }}">
                @error('state')
                <div class="text-danger">{{ $message }}</div>
                @enderror
                <span class="text-danger" id="stateError"></span>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="addPincode">Pincode:</label>
                <input type="text" name="pincode" id="addPincode" class="form-control" value="{{ old('pincode') }}">
                @error('pincode')
                <div class="text-danger">{{ $message }}</div>
                @enderror
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
                     <button type="submit" id="ApplyCouponbutton" class="button" style="background-color:green; color:white;padding:5px;border-radius:5px;border:0px;">
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
                <label for="editAddress">Address:</label>
                <input type="text" name="address" id="editAddress" class="form-control">
                <span class="text-danger" id="addressError1"></span>
            </div>
            <div class="form-group col-lg-6">
                <label for="editCity">City:</label>
                <input type="text" name="city" id="editCity" class="form-control">
                <span class="text-danger" id="cityError1"></span>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="editDistrict">District:</label>
                <input type="text" name="district" id="editDistrict" class="form-control">
                <span class="text-danger" id="districtError1"></span>
            </div>
            <div class="form-group col-lg-6">
                <label for="editState">State:</label>
                <input type="text" name="state" id="editState" class="form-control">
                <span class="text-danger" id="stateError1"></span>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-lg-6">
                <label for="editPincode">Pincode:</label>
                <input type="text" name="pincode" id="editPincode" class="form-control">
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

@if ($errors->any())
<script>
   document.addEventListener('DOMContentLoaded', function() {
         document.getElementById('addressForm').style.display = 'block';
   });
</script>
@endif
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
document.getElementById('showAddressForm').addEventListener('click', function() {
    var addressForm = document.getElementById('addressForm');
    if (addressForm.style.display === 'none' || addressForm.style.display === '') {
        addressForm.style.display = 'block';
    } else {
        addressForm.style.display = 'none';
    }
});

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
        $('#ApplyCouponbutton').prop('disabled', false);


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
            document.getElementById('editAddress').value = data.address || '';
            document.getElementById('editCity').value = data.city || '';
            document.getElementById('editDistrict').value = data.district || '';
            document.getElementById('editState').value = data.state || '';
            document.getElementById('editPincode').value = data.pincode || '';
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
    $('#ApplyCouponbutton').prop('disabled', false);
});

document.getElementById('showCouponForm').addEventListener('click', function() {
    var ShowForm = document.getElementById('ShowForm');
    if (ShowForm.style.display === 'none' || ShowForm.style.display === '') {
        ShowForm.style.display = 'block';
    } else {
        ShowForm.style.display = 'none';
    }
});
</script>
<script>
$(document).ready(function() {
    // Edit Address Form Validation
    $('#editAddressForm').on('submit', function(e) {
        let valid = true;
        $('.text-danger').text('');

        if ($('#editAddress').val().trim() === '') {
            $('#addressError1').text('Address is required.');
            valid = false;
        }

        if ($('#editCity').val().trim() === '') {
            $('#cityError1').text('City is required.');
            valid = false;
        }

        if ($('#editDistrict').val().trim() === '') {
            $('#districtError1').text('District is required.');
            valid = false;
        }

        if ($('#editState').val().trim() === '') {
            $('#stateError1').text('State is required.');
            valid = false;
        }

        const pincode = $('#editPincode').val().trim();
        if (pincode === '') {
            $('#pincodeError1').text('Pincode is required.');
            valid = false;
        } else if (!/^\d{6}$/.test(pincode)) {
            $('#pincodeError1').text('Pincode must be a 6-digit number.');
            valid = false;
        }

        if (!valid) {
            $('#editSubmitButton').prop('disabled', true);
            e.preventDefault();
        } else {
            $('#editSubmitButton').prop('disabled', false);
        }
    });

    $('#editAddressForm input').on('input', function() {
        $('#editSubmitButton').prop('disabled', false);
    });

    // Add Address Form Validation
    $('#addAddressForm').on('submit', function(e) {
        let valid = true;
        $('.text-danger').text('');

        if ($('#addAddress').val().trim() === '') {
            $('#addressError').text('Address is required.');
            valid = false;
        }

        if ($('#addCity').val().trim() === '') {
            $('#cityError').text('City is required.');
            valid = false;
        }

        if ($('#addDistrict').val().trim() === '') {
            $('#districtError').text('District is required.');
            valid = false;
        }

        if ($('#addState').val().trim() === '') {
            $('#stateError').text('State is required.');
            valid = false;
        }

        const pincode = $('#addPincode').val().trim();
        if (pincode === '') {
            $('#pincodeError').text('Pincode is required.');
            valid = false;
        } else if (!/^\d{6}$/.test(pincode)) {
            $('#pincodeError').text('Pincode must be a 6-digit number.');
            valid = false;
        }

        if (!valid) {
            $('#addAddressButton').prop('disabled', true);
            e.preventDefault();
        } else {
            $('#addAddressButton').prop('disabled', false);
        }
    });

    $('#addAddressForm input').on('input', function() {
        $('#addAddressButton').prop('disabled', false);
    });

    // Apply Coupon Form Validation
    $('#ApplyCouponForm').on('submit', function(e) {
        let valid = true;
        $('.text-danger').text('');

        let couponAmount = $('#coupon_code').val().trim();

        if (couponAmount === '') {
            $('#coupon_code_error').text('Enter coupon code.');
            valid = false;
        }

        if (!valid) {
            $('#ApplyCouponbutton').prop('disabled', true);
            e.preventDefault();
        } else {
            $('#ApplyCouponbutton').prop('disabled', false);
        }
    });

    $('#ApplyCouponForm input').on('input', function() {
        $('#ApplyCouponbutton').prop('disabled', false);
    });
});
</script>


<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    function formsubmit1() {
        var form = $("#contact-form1");

        form.validate({
            rules: {
                service: { required: true },
                name: { required: true },
                email: { required: true, email: true },
                phone: { required: true, number: true, minlength: 10, maxlength: 12 },
                appointment_date: { required: true, date: true, minDateToday: true },
            },
            messages: {
                service: "Please fill the service",
                name: "Please fill the name",
                email: {
                    required: "Please fill the email",
                    email: "Please enter a valid email address"
                },
                phone: {
                    required: "Please fill the phone",
                    number: "Please enter a numeric value only",
                    minlength: "Phone number must be at least 10 digits",
                    maxlength: "Phone number must not exceed 12 digits"
                },
                appointment_date: {
                    required: "Please fill the appointment date",
                    date: "Please enter a valid date",
                    minDateToday: "Appointment date must be today or later"
                }
            },
            submitHandler: function (form) {
                // Handle form submission here
                submitForm();
            }
        });

        // Custom method to validate appointment date is today or later
        $.validator.addMethod("minDateToday", function(value, element) {
            var currentDate = new Date();
            var selectedDate = new Date(value);
            selectedDate.setHours(0, 0, 0, 0);
            return selectedDate >= currentDate;
        }, "Appointment date must be today or later");
    }

    function submitForm() {
        var form = $("#contact-form1");

        var formData = new FormData(form[0]);
        var service = $("#service").val();
        var amount = $("#amount").val();
        var name = $("#name").val();
        var email = $("#email").val();
        var phone = $("#phone").val();
        var appointmentDate = $("#selected-date-1").val();
        var appointmentTime = $("#selected-time-1").val();
        var company_name = $("#company_name").val();
        var gst = $("#gst").val();


        const tokenContent = $('meta[name="csrf-token"]').attr('content');

        fetch('{{ route('conform_appointment') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': tokenContent
            },
            body: JSON.stringify({
                amount: amount,
                name: name
            })
        })
        .then(response => response.json())
        .then(data => {
            // Handle response and initiate Razorpay payment
            const options = {
                amount: data.orderAmount,
                currency: data.currency,
                name: 'Wiezmann Company',
                description: 'Purchase description',
                order_id: data.orderId,
                handler: function(response) {
                    // Handle successful payment
                    console.log(response);
                    // Proceed with payment verification
                    verifyPayment(response);
                },
                prefill: {
                    name: name,
                    email: email,
                    contact: phone
                }
            };
            const rzp1 = new Razorpay(options);
            rzp1.open();
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle errors if any
        });
    }

    function verifyPayment(response) {
        const tokenContent = $('meta[name="csrf-token"]').attr('content');
        const service = $("#service").val();
        const amount = $("#amount").val();
        const name = $("#name").val();
        const email = $("#email").val();
        const phone = $("#phone").val();
        const appointmentDate = $("#selected-date-1").val();
        const appointmentTime = $("#selected-time-1").val();
        const company_name = $("#company_name").val();
        const gst = $("#gst").val();

        

        fetch('{{ route('verifyPayment') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': tokenContent
            },
            body: JSON.stringify({
                razorpay_payment_id: response.razorpay_payment_id,
                razorpay_order_id: response.razorpay_order_id,
                razorpay_signature: response.razorpay_signature,
                service: service,
                amount: amount,
                name: name,
                email: email,
                phone: phone,
                appointment_date: appointmentDate,
                appointment_time: appointmentTime,
                company_name: company_name,
                gst: gst,

            })
        })
        .then(response => response.json())
        .then(data => {
            console.log(data); 

            alert('Your Booking and Payment is made Successful');
            if (data.data === 'success') {
                document.getElementById('contact-form1').reset(); // Reset form after successful payment
                window.location.href = '{{ route('success') }}' + '?id=' + data.order_id;
            } else {
                alert('Payment verification failed'); 
            }
        })
        .catch(error => {
            console.error('Error:', error); 
            alert('There was an error processing your payment.'); 
        });
    }
</script>



@endsection