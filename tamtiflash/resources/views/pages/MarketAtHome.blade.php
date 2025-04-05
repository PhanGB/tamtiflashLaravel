@extends('layouts.app')
@section('title', 'MarketAtHome')
@section('content')
    <main>
        <link rel="stylesheet" href="/css/market-at-home.css">
        <link rel="stylesheet" href="/css/home.css">
        <link rel="stylesheet" href="/css/products.css">
        <link
            href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
            rel="stylesheet" />
        <!-- Banner -->
        <div class="banner">
            <div>
                <h2 class="banner-title">Giao nhanh, ăn ngon, không lo giá cả</h2>
                <a href="" class="primary-btn banner-btn">LỰA ĐỒ ĂN, NƯỚC UỐNG THÔI!</a>
            </div>
        </div>

        <!-- Content -->
        <div class="container mt-4">
            <h1 class="mt-4" style="font-weight: 700;">Bộ Sưu Tập Món Ăn</h1>
            <div class="row text-center food-collection">
                @foreach ($categories as $category)
                    <div class="col-3">
                    <a href="{{ route('mah.filter.category', $category->id) }}">
                            <img src="{{ asset('images/categories/' . $category->image) }}" class="img-fluid rounded"
                                alt="{{ $category->image }}">
                            <p>{{ $category->name }}</p>
                        </a>
                    </div>
                @endforeach
            </div>

            <div class="col-md-15">
                <!-- <div class="text-quantity-products">150 sản phẩm</div> -->
                <div class="row" id="product-market-at-home">
                    <div class="row">
                        <div class="space"></div>
                        <h2 class="market-title">Bán chạy</h2>
                        
                        @foreach ($productsHot as $product)
                            <div class="col-md-6 mb-3 product" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                data-price="{{ $product->price }}">
                                <div class="card p-3 shadow-sm">
                                    <div class="d-flex">
                                        <img src="{{ asset('images/products/' . $product->image) }}" class="img-fluid rounded"
                                            style="width: 100px; height: 100px; object-fit: cover;">
                                        <div class="ms-3">
                                            <h3 class="mb-1">{{ $product->name }}</h3>
                                            <a href="#">
                                                <p class="mb-1">
                                                    <i class="fas fa-home text-success"></i>
                                                    {{ $product->shop->name ?? 'Không rõ' }} |
                                                    <span class="text-muted">{{ $product->sold ?? 0 }} đã bán</span>
                                                </p>
                                            </a>
                                            <p class="mb-1">
                                                <strong
                                                    class="text-success">{{ number_format($product->price, 0, ',', '.') }}đ</strong>
                                                @if ($product->old_price)
                                                    <del
                                                        class="text-muted">{{ number_format($product->old_price, 0, ',', '.') }}đ</del>
                                                @endif
                                            </p>
                                            <button class="btn btn-success btn-sm add-to-cart">Thêm vào giỏ hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                        @if ($productsHot->isEmpty())
                            <p style="font-size:20px; text-align: center;">Không có sản phẩm</p>
                        @endif

                        <!-- ---------------------------------------------------------------------------- -->
                        <div class="banner-sale">
                            <img src="/images/banner/banner-uu-dai.png" alt="Banner sale" class="img-fluid rounded" />
                        </div>
                        <div class="row">
                            <div class="space"></div>
                            <h2 class="market-title">Tất cả sản phẩm</h2>
                           
                            @foreach ($products as $product)
                                <div class="col-md-6 mb-3 product" data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                    data-price="{{ $product->price }}">
                                    <div class="card p-3 shadow-sm">
                                        <div class="d-flex">
                                            <img src="{{ asset('images/products/' . $product->image) }}"
                                                class="img-fluid rounded"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                            <div class="ms-3">
                                                <h3 class="mb-1">{{ $product->name }}</h3>
                                                <a href="#">
                                                    <p class="mb-1">
                                                        <i class="fas fa-home text-success"></i>
                                                        {{ $product->shop->name ?? 'Không rõ' }} |
                                                        <span class="text-muted">{{ $product->sold ?? 0 }} đã bán</span>
                                                    </p>
                                                </a>
                                                <p class="mb-1">
                                                    <strong
                                                        class="text-success">{{ number_format($product->price, 0, ',', '.') }}đ</strong>
                                                    @if ($product->old_price)
                                                        <del
                                                            class="text-muted">{{ number_format($product->old_price, 0, ',', '.') }}đ</del>
                                                    @endif
                                                </p>
                                                <button class="btn btn-success btn-sm add-to-cart">Thêm vào giỏ hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                            @if ($products->isEmpty())
                                <p style="font-size:20px; text-align: center;">Không có sản phẩm</p>
                            @endif
                        </div>
                        <!-- ---------------------------------------------------------------------------- -->
                    </div>
                </div>
            </div>
    </main>
@endsection