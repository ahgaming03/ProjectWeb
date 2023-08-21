<!-- Begin Header Area -->
<header>
    <!-- Begin Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-3 col-md-4">
                    <div class="header-top-left">
                        <ul class="phone-wrap">
                            <li><span>Telephone Enquiry:</span><a href="#">(+123) 123 321 345</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top Left Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-9 col-md-8">
                    <div class="header-top-right">
                        <ul class="ht-menu">
                            <!-- Begin Customer Area -->
                            @if (Session::has('customer'))
                                <li>
                                    <div class="ht-setting-trigger">
                                        Hello, {{ session('customer.firstName') . ' ' . session('customer.lastName') }}
                                        <i class="fa-regular fa-circle-user fa-2x"></i>
                                    </div>
                                    <div class="setting ht-setting">
                                        <ul class="ht-setting-list">
                                            <li><a href="{{ route('customer-profile') }}">My Account</a></li>
                                            <li><a href="{{ route('customer-logout') }}">Logout</a></li>
                                        </ul>
                                    </div>
                                </li>
                            @else
                                <li>
                                    <div><a href="{{ route('customer-login') }}">Login</a></div>
                                </li>
                                <li>
                                    <div><a href="{{ route('customer-register') }}">Register</a></div>
                                </li>
                            @endif
                            <!-- Customer Area End Here -->
                            <!-- Begin Currency Area -->
                            <li>
                                <span class="currency-selector-wrapper">Currency :</span>
                                <div class="ht-currency-trigger"><span>USD $</span></div>
                                <div class="currency ht-currency">
                                    <ul class="ht-setting-list">
                                        <li><a href="#">VND đ</a></li>
                                        <li class="active"><a href="#">USD $</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Currency Area End Here -->
                        </ul>
                    </div>
                </div>
                <!-- Header Top Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="{{ route('product-index') }}">
                            <img src="{{ asset('customer/images/menu/logo/1.png') }}" alt="">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9">
                    <!-- Begin Header Middle Searchbox Area -->
                    <form action="{{ route('web.search') }}" method="GET" class="hm-searchbox">
                        <input type="text" name="query" placeholder="Enter your search key ..." required>
                        <button type="submit" class="li-btn"><i class="fa fa-search"></i></button>
                    </form>
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            <li class="hm-wishlist">
                                <a href="#">
                                    <span class="cart-item-count wishlist-item-count">0</span>
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            </li>
                            <!-- Header Middle Wishlist Area End Here -->
                            <!-- Begin Header Mini Cart Area -->
                            <li class="hm-minicart">
                                <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                    @php
                                        $totalCost = 0;
                                        $totalCost = array_reduce((array) session('cart'), function ($carry, $item) {
                                            return $carry + $item['quantity'] * $item['price'];
                                        });
                                    @endphp
                                    <span class="item-text">${{ $totalCost }}
                                        @php
                                            $totalQuantity = array_reduce(
                                                (array) session('cart'),
                                                function ($carry, $item) {
                                                    return $carry + $item['quantity'];
                                                },
                                                0,
                                            );
                                        @endphp
                                        <span class="cart-item-count">{{ $totalQuantity }}</span>
                                    </span>
                                </div>
                                <div class="minicart">
                                    <ul class="minicart-product-list">
                                        @php
                                            $carts = session('cart');
                                        @endphp
                                        @php $total = 0 @endphp
                                        @if (session('cart'))
                                            @foreach (session('cart') as $item => $details)
                                                <li>
                                                    <a href="{{route('product-detail', $item)}}" class="minicart-product-image">
                                                        <img src="{{ asset('admjn/images/uploads/products/' . $details['cover']) }}"
                                                            alt="cart products">
                                                    </a>
                                                    <div class="minicart-product-details">
                                                        <h6><a href="{{route('product-detail', $item)}}">{{ $details['name'] }}</a></h6>
                                                        <span>${{ $details['price'] }} x {{ $details['quantity'] }}</span>
                                                    </div>
                                                    <button class="close">
                                                        <i class="fa fa-close"></i>
                                                    </button>
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                    <p class="minicart-total">SUBTOTAL: <span>${{ $totalCost }}</span></p>
                                    <div class="minicart-button">
                                        <a href="{{ route('cart') }}"
                                            class="li-button li-button-dark li-button-fullwidth li-button-sm">
                                            <span>View Full Cart</span>
                                        </a>
                                        <a href="#" class="li-button li-button-fullwidth li-button-sm">
                                            <span>Checkout</span>
                                        </a>
                                    </div>

                                </div>
                            </li>
                            <!-- Header Mini Cart Area End Here -->
                        </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
</header>
<!-- Header Area End Here -->
