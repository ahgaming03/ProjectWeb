@extends('customer.layouts.frontend')
@section('content')
    <!-- content-wraper start -->
    <div class="content-wraper">
        <div class="container">
            <div class="row single-product-area">
                <div class="col-lg-5 col-md-6">
                    <!-- Product Details Left -->
                    <div class="product-details-left">
                        <div class="product-details-images slider-navigation-1">
                            @if ($product->cover)
                                <div class="lg-image">
                                    <img src="{{ asset('admjn/images/uploads/products/' . $product->cover) }}"
                                        alt="product image">
                                </div>
                            @endif
                            @foreach ($images as $image)
                                @if ($image->productID == $product->productID)
                                    <div class="lg-image">
                                        <img src="{{ asset('admjn/images/uploads/products/' . $image->imageName) }}"
                                            alt="product image">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                        <div class="product-details-thumbs slider-thumbs-1">
                            @if ($product->cover)
                                <div class="sm-image">
                                    <img src="{{ asset('admjn/images/uploads/products/' . $product->cover) }}"
                                        alt="product image thumb">
                                </div>
                            @endif
                            @foreach ($images as $image)
                                @if ($image->productID == $product->productID)
                                    <div class="sm-image"><img
                                            src="{{ asset('admjn/images/uploads/products/' . $image->imageName) }}"
                                            alt="product image thumb">
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <!--// Product Details Left -->
                </div>
                <div class="col-lg-7 col-md-6">
                    <div class="product-details-view-content sp-normal-content pt-60">
                        <div class="product-info">
                            <h2>{{ $product->name }}</h2>
                            <span class="product-details-ref">Manufacturer: {{ $product->manufacturerName }}</span>
                            <div class="rating-box pt-20">
                                <ul class="rating rating-with-review-item">
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                </ul>
                            </div>
                            <div class="price-box pt-20">
                                <span class="new-price new-price-2">${{ $product->price }}</span>
                            </div>
                            <div class="single-add-to-cart">
                                <form action="{{ route('add-to-cart', $product->productID) }}" class="cart-quantity">
                                    @csrf
                                    <button class="add-to-cart" type="submit">Add to cart</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content-wraper end -->
    <!-- Begin Product Area -->
    <div class="product-area pt-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="li-product-tab">
                        <ul class="nav li-product-menu">
                            <li><a class="active" data-toggle="tab" href="#product-details"><span>Product
                                        Details</span></a>
                            </li>
                            <li><a data-toggle="tab" href="#reviews"><span>Reviews</span></a></li>
                        </ul>
                    </div>
                    <!-- Begin Tab Menu Content Area -->
                </div>
            </div>
            <div class="tab-content">
                <div id="product-details" class="tab-pane" role="tabpanel">
                    <div class="product-details-manufacturer">
                        {{ $product->details }}
                    </div>
                </div>
                <div id="reviews" class="tab-pane" role="tabpanel">
                    <h3 class="mt-2" style="color: red">Coming soon</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Area End Here -->
    <!-- Begin Laptop Product Area -->
    <section class="product-area li-laptop-product pt-30 pb-50">
        <div class="container">
            <div class="row">
                <!-- Begin Section Area -->
                <div class="col-lg-12">
                    <div class="li-section-title">
                        <h2>
                            <span>Other products in the same category:</span>
                        </h2>
                    </div>
                    <div class="row">
                        <div class="product-active owl-carousel">
                            @foreach ($products as $product)
                                <div class="col-lg-12">
                                    <!-- single-product-wrap start -->
                                    <div class="single-product-wrap">
                                        <div class="product-image">
                                            <a href="{{ route('product-detail', [$product->productID]) }}">
                                                @if ($product->cover)
                                                    <img src="{{ asset('admjn/images/uploads/products/' . $product->cover) }}"
                                                        alt="Product Image">
                                                @else
                                                    <img src="{{ asset('admjn/images/uploads/products/default_image.jpg') }}"
                                                        alt="Product Image">
                                                @endif
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
                                                    <li class="add-cart active"><a
                                                            href="{{ route('add-to-cart', $product->productID) }}">Add to
                                                            cart</a></li>
                                                    <li><a href="#" title="quick view" class="quick-view-btn"
                                                            data-toggle="modal"
                                                            data-target="#modalCenter-{{ $product->productID }}"><i
                                                                class="fa fa-eye"></i></a></li>
                                                    <li><a class="links-details" href="#"><i
                                                                class="fa fa-heart-o"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- single-product-wrap end -->
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!-- Section Area End Here -->
            </div>
        </div>
    </section>
    <!-- Laptop Product Area End Here -->
@endsection
