@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="/css/cart.css" />
<link
            href="https://fonts.googleapis.com/css2?family=Lora:ital,wght@0,400..700;1,400..700&family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
            rel="stylesheet"
        />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" />
<main>
    <div class="banner">
        <h2 class="banner-title">Giỏ hàng</h2>
    </div>

    <div class="cart-body">
        <div class="grid wide">
            <div class="row">
                <div class="col l-9 m-12 c-12">
                    <table>
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="product-box">
                                    <img
                                        src="https://demo.htmlcodex.com/2463/organic-food-website-template/img/product-1.jpg"
                                        alt=""
                                        class="product-img"
                                    />
                                    <div class="product-dsc">
                                        <h3 class="product-name">Bánh tráng cuốn</h3>
                                        <span class="product-res"><i class="fa-solid fa-location-dot"></i>Ngũ Long Bakery</span>
                                    </div>
                                </td>
                                <td>25.000đ</td>
                                <td>
                                    <div class="quantity-control">
                                        <button>-</button>
                                        <input type="text" value="1" />
                                        <button>+</button>
                                    </div>
                                </td>
                                <td class="line-total">25.000đ</td>
                                <td><button class="remove-btn">✖</button></td>
                            </tr>
                            <tr>
                                <td class="product-box">
                                    <img
                                        src="https://demo.htmlcodex.com/2463/organic-food-website-template/img/product-1.jpg"
                                        alt=""
                                        class="product-img"
                                    />
                                    <div class="product-dsc">
                                        <h3 class="product-name">Bánh tráng cuốn</h3>
                                        <span class="product-res"><i class="fa-solid fa-location-dot"></i>Ngũ Long Bakery</span>
                                    </div>
                                </td>
                                <td>25.000đ</td>
                                <td>
                                    <div class="quantity-control">
                                        <button>-</button>
                                        <input type="text" value="1" />
                                        <button>+</button>
                                    </div>
                                </td>
                                <td class="line-total">25.000đ</td>
                                <td><button class="remove-btn">✖</button></td>
                            </tr>
                            <tr>
                                <td class="product-box">
                                    <img
                                        src="https://demo.htmlcodex.com/2463/organic-food-website-template/img/product-1.jpg"
                                        alt=""
                                        class="product-img"
                                    />
                                    <div class="product-dsc">
                                        <h3 class="product-name">Bánh tráng cuốn</h3>
                                        <span class="product-res"><i class="fa-solid fa-location-dot"></i>Ngũ Long Bakery</span>
                                    </div>
                                </td>
                                <td>25.000đ</td>
                                <td>
                                    <div class="quantity-control">
                                        <button>-</button>
                                        <input type="text" value="1" />
                                        <button>+</button>
                                    </div>
                                </td>
                                <td class="line-total">25.000đ</td>
                                <td><button class="remove-btn">✖</button></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="cart-mobile">
                        <div class="cart-container">
                            <div class="cart-item">
                                <img
                                    src="https://demo.htmlcodex.com/2463/organic-food-website-template/img/product-1.jpg"
                                    alt=""
                                    class="cart-img"
                                />
                                <div class="cart-details">
                                    <h3 class="cart-name">Bánh tráng cuốn</h3>
                                    <span class="cart-res"><i class="fa-solid fa-location-dot"></i>Ngũ Long Bakery</span>
                                    <span class="cart-price">25.000đ</span>
                                    <div class="cart-quantity-mobile">
                                        <button class="quantity-btn">−</button>
                                        <input type="text" value="1" class="quantity-input" />
                                        <button class="quantity-btn">+</button>
                                    </div>
                                </div>
                                <button class="remove-btn">✖</button>
                            </div>
                            <div class="cart-item">
                                <img
                                    src="https://demo.htmlcodex.com/2463/organic-food-website-template/img/product-1.jpg"
                                    alt=""
                                    class="cart-img"
                                />
                                <div class="cart-details">
                                    <h3 class="cart-name">Bánh tráng cuốn</h3>
                                    <span class="cart-res"><i class="fa-solid fa-location-dot"></i>Ngũ Long Bakery</span>
                                    <span class="cart-price">25.000đ</span>
                                    <div class="cart-quantity-mobile">
                                        <button class="quantity-btn">−</button>
                                        <input type="text" value="1" class="quantity-input" />
                                        <button class="quantity-btn">+</button>
                                    </div>
                                </div>
                                <button class="remove-btn">✖</button>
                            </div>
                            <div class="cart-item">
                                <img
                                    src="https://demo.htmlcodex.com/2463/organic-food-website-template/img/product-1.jpg"
                                    alt=""
                                    class="cart-img"
                                />
                                <div class="cart-details">
                                    <h3 class="cart-name">Bánh tráng cuốn</h3>
                                    <span class="cart-res"><i class="fa-solid fa-location-dot"></i>Ngũ Long Bakery</span>
                                    <span class="cart-price">25.000đ</span>
                                    <div class="cart-quantity-mobile">
                                        <button class="quantity-btn">−</button>
                                        <input type="text" value="1" class="quantity-input" />
                                        <button class="quantity-btn">+</button>
                                    </div>
                                </div>
                                <button class="remove-btn">✖</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col l-3 m-12 c-12">
                    <div class="cart-total">
                        <div>
                            <label for="" class="total-label">Thành tiền</label>
                            <span class="total-price">990.000đ</span>
                        </div>
                        <a class="cart-btn-link" href="payment.html">
                            <button class="cart-btn">Thanh toán</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="/js/home.js"></script>
<script src="/js/base.js"></script>
@endsection
