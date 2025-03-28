@include('layouts.app')
@section('title', 'Sản phẩm')
@section('content')

    <main>
        <link rel="stylesheet" href="public/css/home.css" />
        <link rel="stylesheet" href="public/css/products.css" />
        <!-- Banner -->
        <div class="banner">
            <div>
                <h2 class="banner-title">Giao nhanh, ăn ngon, không lo giá cả</h2>
                <a href="" class="primary-btn banner-btn">LỰA ĐỒ ĂN, NƯỚC UỐNG THÔI!</a>
            </div>
        </div>


        <!-- ---------------------------content---------------------------- -->
        <div class="container mt-4">
            <div class="row">
                <div class="in4-shop col-md-5">
                    <h1> <i class="fa fa-home" style="color: green;"></i> Quán Ngũ Long</h1>
                    <div style="width: 200px;; height: 1px; background-color: green;"></div>
                    <h3 class="text-muted">Giờ mở cửa: 6h - 22h</h3>
                    <span class="text-muted" style="font-size: 16px; font-weight: bold;"><i
                            class="fa fa-star text-warning"></i> 4.5</span>
                </div>
                <div class="products col-md-8">
                    <div class="text-quantity-products">150 sản phẩm</div>
                    <div class="row" id="product-list">
                        <div class="space"></div>
                        <h2>Combo</h2> <br>

                        <!-- ---------------------------------------------------------------------------- -->
                        <!-- foreach vào đây -->
                        <div class="col-md-6 mb-3 product" data-id="2" data-name="Trà chanh" data-price="15000">
                            <div class="card p-3 shadow-sm">
                                <div class="d-flex">
                                    <img src="image2.jpg" class="img-fluid rounded"
                                        style="width: 100px; height: 100px; object-fit: cover;">
                                    <div class="ms-3">
                                        <h3 class="mb-1">Tên sản phẩm</h3>
                                        <a href="#">
                                            <p class="mb-1"><i class="fas fa-home text-success"></i> Quán Ngũ Long |
                                                <span class="text-muted">200 đã bán</span>
                                            </p>
                                        </a>
                                        <p class="mb-1"><strong class="text-success">Giá đ</strong> <del
                                                class="text-muted">20.000đ</del></p>
                                        <button class="btn btn-success btn-sm add-to-cart">Thêm vào giỏ
                                            hàng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end foreach -->
                        <!-- ---------------------------------------------------------------------------- -->
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="filter-category mb-4">
                        <span class="name-filter-category">Sắp xếp theo: </span>
                        <select name="category" id="category" class="form-select select-category w-50">
                            <option value="">Tất cả</option>
                            <option value="0">Combo</option>
                            <option value="1">Món ăn</option>
                            <option value="2">Nước uống</option>
                        </select>
                    </div>
                    <div class="cart">
                        <h3> <i class="fa-solid fa-cart-shopping" style="color: green;"></i> Giỏ hàng của tôi</h3>
                        <ul id="cart-items" class="list-group mb-3">
                        </ul>
                        <h4>Tổng tiền: <span id="total-price">0</span>đ</h4>
                        <button class="btn btn-primary btn-success w-100 h-20" id="checkout"
                            style="font-size: medium;">Thanh
                            toán</button>
                    </div>
                </div>
            </div>
        </div>
        <br><br><br>
    </main>

@endsection