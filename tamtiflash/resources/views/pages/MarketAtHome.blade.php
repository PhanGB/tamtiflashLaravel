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
                <div class="col-3 image-container">
                    <img src="/images/products/mon-canh.png" class="img-fluid rounded" alt="Món canh">
                    <p>Món canh</p>
                </div>
                <div class="col-3">
                    <img src="/images/products/mon-xao.png" class="img-fluid rounded" alt="Món xào">
                    <p>Món xào</p>
                </div>
                <div class="col-3">
                    <img src="/images/products/mon-chien.png" class="img-fluid rounded" alt="Món chiên">
                    <p>Món chiên</p>
                </div>
                <div class="col-3">
                    <img src="/images/products/mon-luoc.png" class="img-fluid rounded" alt="Món luộc">
                    <p>Món luộc</p>
                </div>
                <div class="col-3">
                    <img src="/images/products/mon-luoc.png" class="img-fluid rounded" alt="Món luộc">
                    <p>Món luộc</p>
                </div>
            </div>

            <div class="col-md-15">
                <!-- <div class="text-quantity-products">150 sản phẩm</div> -->
                <div class="row" id="product-market-at-home">
                    <div class="row">
                        <div class="space"></div>
                        <h2 class="market-title">Bán chạy</h2>
                        <div class="col-md-6 mb-3 product" data-id="1"
                            data-name="Bánh tráng cuốn + Trà chanh giã tay không đường" data-price="25000"
                            data-image="image1.jpg">
                            <div class="card p-3 shadow-sm">
                                <div class="d-flex">
                                    <img src="image1.jpg" class="img-fluid rounded"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="ms-3">
                                        <h3 class="mb-1">Bánh tráng cuốn + Trà chanh giã tay không đường</h3>
                                        <a href="#">
                                            <p class="mb-1"><i class="fas fa-home text-success"></i> Quán Ngũ Long |
                                                <span class="text-muted">100 đã bán</span>
                                            </p>
                                        </a>
                                        <p class="mb-1"><strong class="text-success">25.000đ</strong> <del
                                                class="text-muted">30.000đ</del></p>
                                        <button class="btn btn-success btn-sm add-to-cart">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ---------------------------------------------------------------------------- -->
                        <div class="col-md-6 mb-3 product" data-id="2" data-name="Trà chanh" data-price="15000">
                            <div class="card p-3 shadow-sm">
                                <div class="d-flex">
                                    <img src="image2.jpg" class="img-fluid rounded"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="ms-3">
                                        <h3 class="mb-1">Trà chanh</h3>
                                        <a href="#">
                                            <p class="mb-1"><i class="fas fa-home text-success"></i> Quán Ngũ Long |
                                                <span class="text-muted">200 đã bán</span>
                                            </p>
                                        </a>
                                        <p class="mb-1"><strong class="text-success">15.000đ</strong> <del
                                                class="text-muted">20.000đ</del></p>
                                        <button class="btn btn-success btn-sm add-to-cart">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ---------------------------------------------------------------------------- -->
                        <div class="col-md-6 mb-3 product" data-id="3" data-name="Bánh mì" data-price="20000">
                            <div class="card p-3 shadow-sm">
                                <div class="d-flex">
                                    <img src="image3.jpg" class="img-fluid rounded"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="ms-3">
                                        <h3 class="mb-1">Bánh mì</h3>
                                        <a href="#">
                                            <p class="mb-1"><i class="fas fa-home text-success"></i> Quán Ngũ Long |
                                                <span class="text-muted">150 đã bán</span>
                                            </p>
                                        </a>
                                        <p class="mb-1"><strong class="text-success">20.000đ</strong> <del
                                                class="text-muted">25.000đ</del></p>
                                        <button class="btn btn-success btn-sm add-to-cart">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ---------------------------------------------------------------------------- -->
                        <div class="col-md-6 mb-3 product" data-id="4" data-name="Nước cam" data-price="10000">
                            <div class="card p-3 shadow-sm">
                                <div class="d-flex">
                                    <img src="image4.jpg" class="img-fluid rounded"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="ms-3">
                                        <h3 class="mb-1">Nước cam</h3>
                                        <a href="#">
                                            <p class="mb-1"><i class="fas fa-home text-success"></i> Quán Ngũ Long |
                                                <span class="text-muted">300 đã bán</span>
                                            </p>
                                        </a>
                                        <p class="mb-1"><strong class="text-success">10.000đ</strong> <del
                                                class="text-muted">15.000đ</del></p>
                                        <button class="btn btn-success btn-sm add-to-cart">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ---------------------------------------------------------------------------- -->
                    <div class="banner-sale">
                        <img src="/images/banner/banner-uu-dai.png" alt="Banner sale" class="img-fluid rounded" />
                    </div>
                    <div class="row">
                        <div class="space"></div>
                        <h2 class="market-title">Combo ưu đãi 20%</h2>
                        <div class="col-md-6 mb-3 product" data-id="5" data-name="Phở bò" data-price="30000">
                            <div class="card p-3 shadow-sm">
                                <div class="d-flex">
                                    <img src="image5.jpg" class="img-fluid rounded"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="ms-3">
                                        <h3 class="mb-1">Phở bò</h3>
                                        <a href="#">
                                            <p class="mb-1"><i class="fas fa-home text-success"></i> Quán Ngũ Long |
                                                <span class="text-muted">400 đã bán</span>
                                            </p>
                                        </a>
                                        <p class="mb-1"><strong class="text-success">30.000đ</strong> <del
                                                class="text-muted">35.000đ</del></p>
                                        <button class="btn btn-success btn-sm add-to-cart">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ---------------------------------------------------------------------------- -->
                        <div class="col-md-6 mb-3 product" data-id="6" data-name="Bún chả" data-price="35000">
                            <div class="card p-3 shadow-sm">
                                <div class="d-flex">
                                    <img src="image6.jpg" class="img-fluid rounded"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="ms-3">
                                        <h3 class="mb-1">Bún chả</h3>
                                        <a href="#">
                                            <p class="mb-1"><i class="fas fa-home text-success"></i> Quán Ngũ Long |
                                                <span class="text-muted">500 đã bán</span></p>
                                        </a>
                                        <p class="mb-1"><strong class="text-success">35.000đ</strong> <del
                                                class="text-muted">40.000đ</del></p>
                                        <button class="btn btn-success btn-sm add-to-cart">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ---------------------------------------------------------------------------- -->
                        <div class="col-md-6 mb-3 product" data-id="7" data-name="Cháo gà" data-price="25000">
                            <div class="card p-3 shadow-sm">
                                <div class="d-flex">
                                    <img src="image7.jpg" class="img-fluid rounded"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="ms-3">
                                        <h3 class="mb-1">Cháo gà</h3>
                                        <a href="#">
                                            <p class="mb-1"><i class="fas fa-home text-success"></i> Quán Ngũ Long |
                                                <span class="text-muted">600 đã bán</span></p>
                                        </a>
                                        <p class="mb-1"><strong class="text-success">25.000đ</strong> <del
                                                class="text-muted">30.000đ</del></p>
                                        <button class="btn btn-success btn-sm add-to-cart">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ---------------------------------------------------------------------------- -->
                        <div class="col-md-6 mb-3 product" data-id="8" data-name="Bánh xèo" data-price="20000">
                            <div class="card p-3 shadow-sm">
                                <div class="d-flex">
                                    <img src="image8.jpg" class="img-fluid rounded"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="ms-3">
                                        <h3 class="mb-1">Bánh xèo</h3>
                                        <a href="#">
                                            <p class="mb-1"><i class="fas fa-home text-success"></i> Quán Ngũ Long |
                                                <span class="text-muted">700 đã bán</span></p>
                                        </a>
                                        <p class="mb-1"><strong class="text-success">20.000đ</strong> <del
                                                class="text-muted">25.000đ</del></p>
                                        <button class="btn btn-success btn-sm add-to-cart">Thêm vào giỏ hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ---------------------------------------------------------------------------- -->
                </div>
            </div>
        </div>
    </main>
@endsection
