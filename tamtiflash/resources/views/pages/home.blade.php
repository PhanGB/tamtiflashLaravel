@extends('layouts.app')
@section('title', 'Trang chủ')
@section('content')
    <link rel="stylesheet" href="/css/home.css" />
    <link rel="stylesheet" href="/css/products.css" />
    <main>
        <div class="banner">
            <div>
                <h2 class="banner-title">Giao nhanh, ăn ngon, không lo giá cả</h2>
                <a href="" class="primary-btn banner-btn">LỰA ĐỒ ĂN, NƯỚC UỐNG THÔI!</a>
            </div>
        </div>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <section>
            <div class="grid wide">
                <div class="section-heading">
                    <h2 class="section-title">Sản phẩm nổi bật</h2>
                    <div class="filter-buttons">
                        <button class="filter-btn active">Thức ăn</button>
                        <button class="filter-btn">Nước uống</button>
                    </div>
                </div>
                <div id="food" class="row products-box active">
                    @foreach ($products as $product)
                        <div class="col l-3 m-6 c-6">
                            <div class="product-card">
                                <a href="" class="product-img-link">
                                    <div class="product-img" style="
                                                                background-image: url('https://demo.htmlcodex.com/2463/organic-food-website-template/img/product-1.jpg');
                                                            "></div>
                                </a>
                                <a href="product_detail.html">
                                    <h3 class="product-name">{{ $product->name }}</h3>
                                </a>
                                <p class="product-price">
                                    <span class="product-price__new">{{ number_format($product->price) }} đ</span>
                                    <!-- <span class="product-price__old">40.000₫</span> -->
                                </p>
                                <div class="product-footer">

                                    @if($product->shop->name == "Market At Home")
                                        <div>
                                            <span><a href="/MAH"><i
                                                        class="fa-solid fa-location-dot"></i>{{ $product->shop->name }}</a></span>
                                        </div>
                                    @else
                                        <div>
                                            <span><a href="/shopdetail/{{ $product->shop->id }}"><i
                                                        class="fa-solid fa-location-dot"></i>{{ $product->shop->name }}</a></span>
                                        </div>
                                    @endif
                                    <button data-product-id="{{ $product->id }}" class="cart-btn"><i
                                            class="fa-solid fa-cart-shopping"></i></button>
                                    <!-- <button class="cart-btn"><i class="fa-solid fa-cart-shopping"></i></button> -->
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <a href="" class="primary-btn section-btn">Xem thêm</a>
            </div>
        </section>

        <!-- Section hot restaurant -->
        <section class="restaurant-section">
            <div class="grid wide">
                <div class="section-heading">
                    <h2 class="section-title">Cửa hàng nổi bật</h2>
                </div>
                <div class="row">
                    @foreach ($shops as $shop)
                        <div class="col l-4 m-12 c-12">
                            <div class="restaurant-card">
                                <img src="https://upload.wikimedia.org/wikipedia/commons/b/b9/Marks_%26_Spencer_original_penny_bazaar_%2824th_June_2013%29.jpg"
                                    alt="" />
                                <h3>{{ $shop->name }}</h3>
                                <p>{{ $shop->short_description }}</p>
                                <p>Giờ mở cửa: <span class="open-time">{{ $shop->time_open }} - {{ $shop->time_close }}</span>
                                </p>
                                <a href="/shopdetail/{{ $shop->id }}" class="primary-btn restaurant-btn">Ghé quán</a>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </section>

        <!-- Section review -->
        <section class="review-section">
            <div class="grid wide">
                <div class="section-heading">
                    <h2 class="section-title">Đánh giá của khách hàng</h2>
                </div>
                <div class="row">
                    @foreach ($reviews as $review)
                        <div class="col l-4 m-12 c-12">
                            <div class="review-card">
                                <span class="quote-icon"><i class="fa-solid fa-quote-left"></i></span>
                                <p>{{ $review->review_content }}</p>
                                <strong>{{ $review->customer_name }}</strong>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>

@endsection