@extends('website.layout2')

@section('link')
<link rel="stylesheet" href="{{ asset('user_asset/css/vendor/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/vendor/aos.min.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/layouts/default-nav.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/layouts/default-footer.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/components/common-banner.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/themes/common.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/themes/button.css') }}">
<link rel="stylesheet" href="{{ asset('user_asset/css/pages/cart-v2.css') }}">
@endsection

<style>
    .cart_orders--wrapper {
        box-shadow: 0px 0px 10px rgb(0 0 0 / 45%);
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
                        <li class="breadcrumb-item"><a href="{{route('index')}}">Home</a></li>
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
            <div class="col-lg-12 cart_v2--cols" id="order-container">
                
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script src="{{ asset('user_asset/js/vendor/jquery-3.5.1.min.js') }}"></script>
<script src="{{ asset('user_asset/js/vendor/bootstrap.min.js') }}"></script>
<script src="{{ asset('user_asset/js/vendor/bowser.min.js') }}"></script>
<script src="{{ asset('user_asset/js/vendor/lazysizes.min.js') }}"></script>
<script src="{{ asset('user_asset/js/vendor/aos.min.js') }}"></script>
<script src="{{ asset('user_asset/js/vendor/aos.init.js') }}"></script>
<script src="{{ asset('user_asset/js/pages/increment-decrement.js') }}"></script>
<script src="{{ asset('user_asset/js/main.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>

<script>
    var orderData = @json($orderList);

    document.addEventListener('DOMContentLoaded', function() {
        var container = document.getElementById('order-container');

        if (orderData && orderData.length > 0) {
            function generateOrderHTML(order) {
                var itemsHTML = order.items.map((item, index) => `
                    <tr>
                        <td>${index+1}</td>
                        <td>${item.product_name}</td>
                        <td><img src="${item.image ? `${window.location.origin}/${item.image}` : '/images/default-image.jpg'}" alt="${item.product_name}" style="max-width: 100px; height: auto;" class=" ls-is-cached lazyloaded"></td>
                        <td>
                        <div class="quantity add_quantity">
                                        <input name="quantity" type="text" class="quantity__input" value="${item.quantity}" disabled="">
                                    </div>
                        </td>
                        <td>₹ ${item.retail}</td>
                        <td>₹ ${item.total_price}</td>
                    </tr>
                `).join('');

                return `
                    <div class="cart_orders--wrapper">
                        <div class="order_summary">
                            <span><strong>Order ID:</strong> ${order.billing_id}</span>
                            <span><strong>Order Placed:</strong> ${moment(order.order_date).format('MMMM D, YYYY')}</span>
                            <span><strong>Order Status:</strong> ${order.status}</span>
                            <span><strong>Total Price:</strong> ₹ ${order.items.reduce((total, item) => total + parseFloat(item.total_price), 0).toFixed(2)}</span>
                        </div>
                        <table class="order_table">
                            <thead>
                                <tr>
                                    <th>Slno</th>
                                    <th>Product Name</th>
                                    <th>Image</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                ${itemsHTML}
                            </tbody>
                        </table>
                    </div>
                `;
            }

            orderData.forEach(function(order) {
                container.innerHTML += generateOrderHTML(order);
            });
        } else {
            container.innerHTML = '<p>No orders found.</p>';
        }
    });
</script>

@endsection
