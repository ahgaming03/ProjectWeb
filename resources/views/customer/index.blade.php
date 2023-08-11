@extends('customer.layouts.frontend')

@section('content')
    <!-- Begin Slider With Category Menu Area -->
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
                                            </li>
                                            <li class="right-menu cat-mega-title">
                                                <a href="#">Price</a>
                                                <ul>
                                                    <li><a href="#">Under $1000</a></li>
                                                    <li><a href="#">$1000 to $1500</a></li>
                                                    <li><a href="#">$1500 & above</a></li>
                                                </ul>
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
                                                    <a href="{{ route('product-detail', [$product->productID]) }}">
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
                                                                href="{{ route('product-detail', [$product->productID]) }}">
                                                                {{ Str::limit($product->name, 40, '...') }}
                                                            </a>
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
                                                                    data-target="#modalCenter-{{ $product->productID }}"
                                                                    href="#"><i class="fa fa-eye"></i></a></li>
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
