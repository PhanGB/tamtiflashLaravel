@extends('layouts.app')
@section('content')
    <link rel="stylesheet" href="/css/home.css" />
    <link rel="stylesheet" href="/css/products.css" />
    <main>
        <style>
            @media screen and (max-width: 1024px) {
  .text-quantity-products {
    font-size: 1.8rem;
    margin-top: -30px;
  }
  .d-flex {
    flex-wrap: wrap;
    gap: 5px;
    justify-content: center;
  }
  .ms-3 .add-to-cart {
    font-size: 1rem;
    padding: 5px 10px;
  }
  .col-md-3 {
    margin-left: 10px;
    border-left: none;
  }
  .filter-category {
    flex-direction: column;
    align-items: flex-start;
    margin-top: -20px;
  }
  .filter-category .select-category {
    font-size: 1.3rem;
  }
  .col-md-3 .cart{
    width: 300px;
  }
}

/* Responsive for Mobile (width <= 768px) */
@media screen and (max-width: 768px) {
  
  .text-quantity-products {
    font-size: 1.5rem;
    margin-top: -20px;
  }
  .d-flex .name-product {
    font-size: 1.5rem;
    
  }
  .ms-3 .add-to-cart {
    width: 100%;
    /* text-align: center; */
    font-size: 1.2rem;
    padding: 8px;
    /* display:block; */
  }

  .col-md-3 {
    margin-left: 0;
    width: 100%;
    text-align: center;
    border-left: none;
  }
  .filter-category {
    flex-direction: column;
    /* position: absolute; */
    z-index: 100;
    top: 10px;
    left: -400px;
    width: 300px;
    /* align-items: center; */
  }
  .name-filter-category {
    font-size: 1.5rem;
    text-align: center;
  }
  .filter-category .select-category {
    width: 100%;
    font-size: 1.2rem;
  }
  .col-md-3 .cart{
    display: none;
  }
}
        </style>
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
                    <h1> <i class="fa fa-home" style="color: green;"></i>{{ $shop->name }}</h1>
                    <div style="width: 200px;; height: 1px; background-color: green;"></div>
                    <h3 class="text-muted">Giờ mở cửa:{{ $shop->time_open }}</h3>
                    <span class="text-muted" style="font-size: 16px; font-weight: bold;"><i
                            class="fa fa-star text-warning"></i>{{ $shop->rate }}</span>

                </div>
                <div class="products col-md-20">

                    <div class="filter-category mb-3" style="margin-left: 900px;">
                        <span class="name-filter-category ">Sắp xếp theo: </span>
                        <select name="category" id="category" class="form-select select-category w-50">
                            <option value="all" {{ request('category') == 'all' ? 'selected' : '' }}>Tất cả</option>
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}" {{ request('category') == $category->id ? 'selected' : '' }}>
                                    {{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="text-quantity-products">{{ $productCount }} sản phẩm</div>
                    <div class="row" id="product-list">
                        <div class="space"></div>
                        <h2>{{ $categoryName }}</h2> <br>
                        @if($products->isEmpty())
                            <h3 class="text-center text-muted">Không có sản phẩm nào trong danh mục này.</h3>
                        @else
                            @foreach ($products as $product)
                                <div class="col-md-6 mb-3 product" data-id="1"
                                    data-name="Bánh tráng cuốn + Trà chanh giã tay không đường" data-price="25000"
                                    data-image="image1.jpg">
                                    <div class="card p-3 shadow-sm">
                                        <div class="d-flex">
                                            <img src="image1.jpg" class="img-fluid rounded"
                                                style="width: 100px; height: 100px; object-fit: cover;">
                                            <div class="ms-3">
                                                <a href="/productdetail/{{ $product->id }}">
                                                    <h3 class="mb-1 name-product">{{ $product->name }}</h3>
                                                </a>
                                                <a href="#">
                                                    <p class="mb-1"><i class="fas fa-home text-success"></i> {{ $shop->name }} |
                                                        <span class="text-muted">{{ $product->sold }} đã bán</span>
                                                    </p>
                                                    <input type="hidden" name="product_id" value="{{ $product->id_shop }}">
                                                </a>
                                                <p class="mb-1"><strong class="text-success">{{ number_format($product->price) }}
                                                        đ</strong></p>
                                                <button class="btn btn-success btn-sm add-to-cart cart-btn"
                                                    onclick="addToCart({{ $product->id }}, {{ $product->name }}, {{ $product->price }})" data-product-id="{{ $product->id }}">Thêm
                                                    vào giỏ
                                                    hàng</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <!-- ---------------------------------------------------------------------------- -->


                    </div>
                </div>
                <!-- <div class="col-md-3 ">
                <div class="cart">
                    <h3> <i class="fa-solid fa-cart-shopping" style="color: green;"></i> Giỏ hàng của tôi</h3>
                    <ul id="cart-items" class="list-group mb-3">
                    </ul>
                    <h4>Tổng tiền: <span id="total-price">0</span>đ</h4>
                    <button class="btn btn-primary btn-success w-100 h-20" id="checkout"
                        style="font-size: medium;">Thanh
                        toán</button>
                </div>
            </div> -->
            </div>
        </div>
        <br><br><br>
    </main>
    <script>
        document.getElementById("category").addEventListener("change", function () {
            var category = this.value;
            var url = new URL(window.location.href);
            url.searchParams.set('category', category);
            window.location.href = url.toString();
        });
    </script>


@endsection