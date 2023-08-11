@extends('customer.layouts.frontend')

@section('content')
    <!-- Begin Slider With Category Menu Area -->
    <link rel="stylesheet" href="{{ asset('customer/vendors/ti-icons/css/themify-icons.css') }}">
    <div class="slider-with-banner">
        <div class="container">
            <div class="row">
                <!-- Begin Category Menu Area -->
                <div class="col-lg-3">
                    <!--Category Menu Start-->
                    <div class="category-menu category-menu-2">
                        <div class="category-heading">
                            <h2 class="categories-toggle"><span>categories</span></h2>
                        </div>
                        <div id="cate-toggle" class="category-menu-list">
                            <ul>
                                @foreach ($categories as $category)
                                    @continue(count($products->where('categoryID', $category->categoryID)) == 0)
                                    <li class="right-menu"><a href="shop-left-sidebar.html">{{ $category->name }}</a>
                                        <ul class="cat-mega-menu">
                                            <li class="right-menu cat-mega-title">
                                                <a href="#">Manufacturer</a>
                                                <ul>
                                                    @foreach ($manufacturers as $manufacturer)
                                                        @continue(count($products->where('categoryID', $category->categoryID)->where('manufacturerID', $manufacturer->manufacturerID)) == 0)
                                                        <li><a href="#">{{ $manufacturer->name }}</a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <li class="right-menu cat-mega-title">
                                                    <a href="#">Price</a>
                                                    <ul>
                                                        <li><a href="#">Under $1000</a></li>
                                                        <li><a href="#">$1000 to $1500</a></li>
                                                        <li><a href="#">$1500 & above</a></li>
                                                    </ul>
                                                </li>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <!--Category Menu End-->
                </div>
                <!-- Category Menu Area End Here -->
                <!-- Begin Slider Area -->
                <div class="col-lg-6 col-md-8">
                    <div class="slider-area slider-area-3 pt-sm-30 pt-xs-30 pb-xs-30">
                        <div class="slider-active owl-carousel">
                            <!-- Begin Single Slide Area -->
                            <div class="single-slide align-center-left animation-style-01 bg-7">
                                <div class="slider-progress"></div>
                                <div class="slider-content">
                                    <h5>Sale Offer <span>-20% Off</span> This Week</h5>
                                    <h2>Chamcham Galaxy S9 | S9+</h2>
                                    <h3>Starting at <span>$589.00</span></h3>
                                    <div class="default-btn slide-btn">
                                        <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Area End Here -->
                            <!-- Begin Single Slide Area -->
                            <div class="single-slide align-center-left animation-style-02 bg-8">
                                <div class="slider-progress"></div>
                                <div class="slider-content">
                                    <h5>Sale Offer <span>Black Friday</span> This Week</h5>
                                    <h2>Work Desk Surface Studio 2018</h2>
                                    <h3>Starting at <span>$1599.00</span></h3>
                                    <div class="default-btn slide-btn">
                                        <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Area End Here -->
                            <!-- Begin Single Slide Area -->
                            <div class="single-slide align-center-left animation-style-01 bg-9">
                                <div class="slider-progress"></div>
                                <div class="slider-content">
                                    <h5>Sale Offer <span>-10% Off</span> This Week</h5>
                                    <h2>Phantom 4 Pro+ Obsidian</h2>
                                    <h3>Starting at <span>$809.00</span></h3>
                                    <div class="default-btn slide-btn">
                                        <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                    </div>
                                </div>
                            </div>
                            <!-- Single Slide Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Slider Area End Here -->
                <!-- Begin Li Banner Area -->
                <div class="col-lg-3 col-md-4 text-center pt-sm-30">
                    <div class="li-banner">
                        <a href="#">
                            <img src="{{ asset('customer/images/banner/3_1.jpg') }}" alt="">
                        </a>
                    </div>
                    <div class="li-banner mt-15 mt-sm-30 mt-xs-25 mb-xs-5">
                        <a href="#">
                            <img src="{{ asset('customer/images/banner/3_2.jpg') }}" alt="">
                        </a>
                    </div>
                </div>
                <!-- Li Banner Area End Here -->
            </div>
        </div>
    </div>
    <!-- Slider With Category Menu Area End Here -->
    @foreach ($categories as $category)
        @continue(count($products->where('categoryID', $category->categoryID)) == 0)
        <!-- Begin {{ $category->name }} Product Area -->
        <section class="product-area li-laptop-product pt-60 pb-45">
            <div class="container">
                <div class="row">
                    <!-- Begin Section Area -->
                    <div class="col-lg-12">
                        <div class="li-section-title">
                            <h2>
                                <span>{{ $category->name }}</span>
                            </h2>
                        </div>
                        <div class="row">
                            <div class="product-active owl-carousel">
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($products as $product)
                                    @if ($product->categoryID == $category->categoryID)
                                        @php
                                            $count++;
                                        @endphp
                                        <div class="col-lg-12">
                                            <!-- single-product-wrap start -->
                                            <div class="single-product-wrap">
                                                <div class="product-image">
                                                    <a href="#">
                                                        <img src="{{ asset('customer/images/uploads/products/' . $product->productID . '_0.png') }}"
                                                            alt="Product Image">
                                                    </a>
                                                </div>
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                                <a href="#">{{ $product->manufacturerName }}</a>
                                                            </h5>
                                                            <div class="rating-box">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <h4><a class="product_name"
                                                                href="#">{{ Str::limit($product->name, 40, '...') }}</a>
                                                        </h4>
                                                        <div class="price-box">
                                                            <span class="new-price">${{ $product->price }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="add-actions">
                                                        <ul class="add-actions-link">
                                                            <li class="add-cart active"><a href="#">Add to cart</a>
                                                            </li>
                                                            <li><a class="links-details" href="#"><i
                                                                        class="fa fa-heart-o"></i></a></li>
                                                            <li><a class="quick-view" data-toggle="modal"
                                                                    data-target="#exampleModalCenter" href="#"><i
                                                                        class="fa fa-eye"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-wrap end -->
                                        </div>
                                    @endif

                                    @break($count == 8)
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!-- Section Area End Here -->
                </div>
            </div>
        </section>
        <!-- {{ $category->name }} Product Area End Here -->
    @endforeach
@endsection
