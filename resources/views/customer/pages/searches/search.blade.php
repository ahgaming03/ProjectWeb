@extends('customer.layouts.frontend')

@section('content')
    <!-- Begin Li's Content Wraper Area -->
    <div class="content-wraper pt-60 pb-60 pt-sm-30">
        <div class="container">
            @if (isset($products))
                <div class="row">
                    <div class="col-lg-9 order-1 order-lg-2">
                        @if (count($products) > 0)
                            <!-- shop-top-bar start -->
                            <div class="shop-top-bar mt-30">
                                <div class="shop-bar-inner">
                                    <div class="product-view-mode">
                                        <!-- shop-item-filter-list start -->
                                        <ul class="nav shop-item-filter-list" role="tablist">
                                            <li class="active" role="presentation"><a aria-selected="true"
                                                    class="active show" data-toggle="tab" role="tab"
                                                    aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a>
                                            </li>
                                            <li role="presentation"><a data-toggle="tab" role="tab"
                                                    aria-controls="list-view" href="#list-view"><i
                                                        class="fa fa-th-list"></i></a></li>
                                        </ul>
                                        <!-- shop-item-filter-list end -->
                                    </div>
                                    <div class="toolbar-amount">
                                        <span>
                                            Showing {{ $products->firstItem() }}–{{ $products->lastItem() }} of
                                            {{ $products->total() }} item(s)
                                        </span>
                                    </div>
                                </div>
                                <!-- product-select-box start -->
                                <div class="product-select-box">
                                    <div class="product-short">
                                        <p>Sort By:</p>
                                        <select class="nice-select">
                                            <option value="trending">Relevance</option>
                                            <option value="sales">Name (A - Z)</option>
                                            <option value="sales">Name (Z - A)</option>
                                            <option value="rating">Price (Low &gt; High)</option>
                                            <option value="date">Rating (Lowest)</option>
                                            <option value="price-asc">Model (A - Z)</option>
                                            <option value="price-asc">Model (Z - A)</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- product-select-box end -->
                            </div>
                            <!-- shop-top-bar end -->
                            <!-- shop-products-wrapper start -->
                            <div class="shop-products-wrapper">
                                <div class="tab-content">
                                    <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                                        <div class="product-area shop-product-area">
                                            <div class="row">
                                                @foreach ($products as $product)
                                                    <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                                        <!-- single-product-wrap start -->
                                                        <div class="single-product-wrap">
                                                            <div class="product-image">
                                                                <a
                                                                    href="{{ route('product-detail', [$product->productID]) }}">
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
                                                                            <a
                                                                                href="#">{{ $product->manufacturerName }}</a>
                                                                        </h5>
                                                                        <div class="rating-box">
                                                                            <ul class="rating">
                                                                                <li><i class="fa fa-star-o"></i></li>
                                                                                <li><i class="fa fa-star-o"></i></li>
                                                                                <li><i class="fa fa-star-o"></i></li>
                                                                                <li class="no-star"><i
                                                                                        class="fa fa-star-o"></i>
                                                                                </li>
                                                                                <li class="no-star"><i
                                                                                        class="fa fa-star-o"></i>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <h4><a class="product_name"
                                                                            href="{{ route('product-detail', [$product->productID]) }}">
                                                                            {{ Str::limit($product->name, 40, '...') }}
                                                                    </h4>
                                                                    <div class="price-box">
                                                                        <span
                                                                            class="new-price">${{ $product->price }}</span>
                                                                    </div>
                                                                </div>
                                                                <div class="add-actions">
                                                                    <ul class="add-actions-link">
                                                                        <li class="add-cart active"><a href="#">Add to
                                                                                cart</a></li>
                                                                        <li><a href="#" title="quick view"
                                                                                class="quick-view-btn" data-toggle="modal"
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
                                    <div id="list-view" class="tab-pane fade product-list-view" role="tabpanel">
                                        <div class="row">
                                            <div class="col">
                                                @foreach ($products as $product)
                                                    <div class="row product-layout-list">
                                                        <div class="col-lg-3 col-md-5 ">
                                                            <div class="product-image">
                                                                <a
                                                                    href="{{ route('product-detail', [$product->productID]) }}">
                                                                    @if ($product->cover)
                                                                        <img src="{{ asset('admjn/images/uploads/products/' . $product->cover) }}"
                                                                            alt="Product Image">
                                                                    @else
                                                                        <img src="{{ asset('admjn/images/uploads/products/default_image.jpg') }}"
                                                                            alt="Product Image">
                                                                    @endif
                                                                </a>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-5 col-md-7">
                                                            <div class="product_desc">
                                                                <div class="product_desc_info">
                                                                    <div class="product-review">
                                                                        <h5 class="manufacturer">
                                                                            <a
                                                                                href="#">{{ $product->manufacturerName }}</a>
                                                                        </h5>
                                                                        <div class="rating-box">
                                                                            <ul class="rating">
                                                                                <li><i class="fa fa-star-o"></i></li>
                                                                                <li><i class="fa fa-star-o"></i></li>
                                                                                <li><i class="fa fa-star-o"></i></li>
                                                                                <li class="no-star"><i
                                                                                        class="fa fa-star-o"></i>
                                                                                </li>
                                                                                <li class="no-star"><i
                                                                                        class="fa fa-star-o"></i>
                                                                                </li>
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                    <h4><a class="product_name"
                                                                            href="{{ route('product-detail', [$product->productID]) }}">
                                                                            {{ Str::limit($product->name, 40, '...') }}
                                                                    </h4>
                                                                    <div class="price-box">
                                                                        <span
                                                                            class="new-price">${{ $product->price }}</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <div class="shop-add-action mb-xs-30">
                                                                <ul class="add-actions-link">
                                                                    <li class="add-cart "><a href="#">Add to
                                                                            cart</a>
                                                                    </li>
                                                                    <li class="wishlist"><a href="#"><i
                                                                                class="fa fa-heart-o"></i>Add to
                                                                            wishlist</a>
                                                                    </li>
                                                                    <li><a class="quick-view" data-toggle="modal"
                                                                            data-target="#modalCenter-{{ $product->productID }}"
                                                                            href="#"><i class="fa fa-eye"></i>Quick
                                                                            view</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    {{ $products->links('customer.layouts.pagination') }}
                                </div>
                            </div>
                            <!-- shop-products-wrapper end -->
                        @else
                            <h3 class="col-md-12 ">Not found product with keyword:
                                "{{ $search_text }}"
                            </h3>
                        @endif
                    </div>
                    <div class="col-lg-3 order-2 order-lg-1">
                        <!--sidebar-categores-box start  -->
                        <div class="sidebar-categores-box">
                            <div class="sidebar-title">
                                <h2>Filter By</h2>
                            </div>
                            <!-- btn-clear-all start -->
                            <button class="btn-clear-all mb-sm-30 mb-xs-30">Clear all</button>
                            <!-- btn-clear-all end -->
                            <!-- filter-sub-area start -->
                            <div class="filter-sub-area">
                                <h5 class="filter-sub-titel">Manufacturer</h5>
                                <div class="categori-checkbox">
                                    <form action="#">
                                        <ul>
                                            <li><input type="checkbox" name="product-categori"><a href="#">Prime
                                                    Video
                                                    (13)</a></li>
                                            <li><input type="checkbox" name="product-categori"><a
                                                    href="#">Computers
                                                    (12)</a></li>
                                            <li><input type="checkbox" name="product-categori"><a
                                                    href="#">Electronics
                                                    (11)</a></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <!-- filter-sub-area end -->
                            <!-- filter-sub-area start -->
                            <div class="filter-sub-area pt-sm-10 pt-xs-10">
                                <h5 class="filter-sub-titel">Categories</h5>
                                <div class="categori-checkbox">
                                    <form action="#">
                                        <ul>
                                            <li><input type="checkbox" name="product-categori"><a href="#">Graphic
                                                    Corner (10)</a></li>
                                            <li><input type="checkbox" name="product-categori"><a href="#"> Studio
                                                    Design (6)</a></li>
                                        </ul>
                                    </form>
                                </div>
                            </div>
                            <!-- filter-sub-area end -->
                        </div>
                        <!--sidebar-categores-box end  -->
                    </div>
                </div>
            @else
                <h3 class="col-md-12 ">Not found product with keyword: ""
                </h3>
            @endif
        </div>
    </div>
    <!-- Content Wraper Area End Here -->
@endsection
