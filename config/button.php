<?php

return [
    'html_content' => '
        <nav class="navbar navbar_default navbar-expand-lg">
            <a class="navbar-brand navbrand_mobile" href="[[ route(\'index\') ]]">
                <img data-src="[[ asset(\'user_asset/images/vegetable/veg-logo.png\') ]]" alt="logo" class="lazyload" width="84" height="85">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon">
                    <img data-src="[[ asset(\'user_asset/images/svg/menu.svg\') ]]" alt="menu-icon" class="hamburger_menu lazyload" width="30" height="30">
                    <img data-src="[[ asset(\'user_asset/images/svg/plus.svg\') ]]" alt="menu-icon" class="cross_image ls-is-cached lazyloaded" width="26" height="26" src="[[ asset(\'user_asset/images/svg/plus.svg\') ]]">
                </span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <a class="navbar-brand navbrand_desktop" href="[[ route(\'index\') ]]">
                    <img data-src="[[ asset(\'user_asset/images/vegetable/veg-logo.png\') ]]" alt="logo" class="lazyload" width="84" height="85">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item sub-menu">
                        <a class="nav-link linked" href="[[ route(\'index\') ]]">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="[[ route(\'about_us\') ]]">About Us</a>
                    </li>
                    <li class="nav-item sub-menu">
                        <a class="nav-link linked" href="#">Products <span>&#9660;</span></a>
                        <ul class="nav-item">
                            <li><a class="nav-link" href="[[ route(\'Products\', [\'id\' => \'Chips\']) ]]">Chips</a></li>
                            <li><a class="nav-link" href="[[ route(\'Products\', [\'id\' => \'Fried\']) ]]">Fried</a></li>
                            <li><a class="nav-link" href="[[ route(\'Products\', [\'id\' => \'Mixture\']) ]]">Mixture</a></li>
                            <li><a class="nav-link" href="[[ route(\'Products\', [\'id\' => \'Sweets\']) ]]">Sweet</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="[[ route(\'Products\', [\'id\' => \'All\']) ]]">Shop</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="[[ route(\'contact\') ]]">Contact</a>
                    </li>
                </ul>
                <div class="icons_menu--btns">
                    <ul>
                        <li class="nav-item sub-menu">
                            <a href="[[ route(\'website_login_page\') ]]">
                                <img data-src="[[ asset(\'user_asset/images/svg/user.svg\') ]]" alt="user" class="lazyload" width="20" height="20">
                                <span style="color: #fff;">&#9660;</span>
                            </a>
                            <ul class="nav-item">
                                [[ @guest ]]
                                <li><a class="nav-link" href="[[ route(\'website_login_page\') ]]"><img src="[[ asset(\'user_asset/images/svg/log.png\') ]]"> Login</a></li>
                                [[ @endguest ]]
                                [[ @auth ]]
                                <li>
                                    <form method="post" action="[[ route(\'website_logout\') ]]">
                                        [[ @csrf ]]
                                        <button class="nav-link"><img src="[[ asset(\'user_asset/images/svg/log.png\') ]]"> Logout</button>
                                    </form>
                                </li>
                                [[ @guest ]]
                                <li><a class="nav-link" href="[[ route(\'register\') ]]"><img src="[[ asset(\'user_asset/images/svg/register.png\') ]]"> Register</a></li>
                                [[ @endguest ]]
                                <li><a class="nav-link" href="[[ route(\'Profile\') ]]"><img src="[[ asset(\'user_asset/images/svg/profile.png\') ]]"> Profile</a></li>
                                <li><a class="nav-link" href="[[ route(\'Order\') ]]"><img src="[[ asset(\'user_asset/images/svg/12121.png\') ]]"> My Order</a></li>
                                [[ @endauth ]]
                            </ul>
                        </li>
                        [[ @auth ]]
                        <li class="nav-item">
                            <a href="[[ route(\'wishlist\', [\'pro_id\' => \'empty\']) ]]" class="cart_link">
                                <img data-src="[[ asset(\'user_asset/images/svg/like.svg\') ]]" alt="like" class="lazyload" width="20" height="20">
                                <span class="cart_count"><b>[[ {{ App\models\WhishlistModel::where(\'user_id\', Auth::user()->user_id)->count() }} ]]</b></span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="[[ route(\'Cart\') ]]" class="cart_link">
                                <img data-src="[[ asset(\'user_asset/images/svg/cart.svg\') ]]" alt="cart" class="lazyload" width="20" height="20">
                                <span class="cart_count"><b>[[ {{ App\models\CartModel::where(\'user_id\', Auth::user()->user_id)->where(\'status\', \'New\')->count() }} ]]</b></span>
                            </a>
                        </li>
                        [[ @endauth ]]
                    </ul>
                </div>
            </div>
        </nav>
    ',
];
