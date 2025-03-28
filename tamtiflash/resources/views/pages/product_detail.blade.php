@extends('layouts.app')
@section('content')
<main>
    <link rel="stylesheet" href="/css/product_detail.css">
    <section class="product-detail">
        <div class="grid wide">
            <div class="row">
                <div class="col l-12 m-12 c-12">
                    <div class="product-detail__content">
                        <div class="product-detail__content-line"></div>
                        <div class="product-detail__content-info">
                            <div class="row">

                                <div class="col l-6 m-6 c-12 product-detail__content-image">
                                    <img src="../images/products/banhkemtrungmuoi.jpg" alt="product" class="product-detail__content-image-img">
                                </div>
                                <div class="col l-6 m-6 c-12 product-detail__content-title">
                                    <div class="product-detail__content-name">{{ $product->name }}</div>
                                    <div class="product-detail__content-cate">Bánh kem</div>
                                    <div class="product-detail__content-price">
                                        <span class="product-detail__content-price-old">80.000đ</span>
                                        <span class="product-detail__content-price-current">{{ number_format($product->price) }} đ</span>
                                    </div>
                                    <div class="product-detail__quantity-control">
                                        <button class="product-detail__quantity-btn product-detail__quantity-btn--decrease">-</button>
                                        <input type="text" class="product-detail__quantity-input" value="1">
                                        <button class="product-detail__quantity-btn product-detail__quantity-btn--increase">+</button>
                                    </div>
                                    <button class="product-detail__add-to-cart-btn">Thêm vào giỏ hàng</button>
                                </div>

                            </div>
                        </div>
                        <div class="product-detail__content-note-topping">
                            <div class="row">
                                <div class="col l-6 m-6 c-12 product-detail__content-topping">
                                    <h3>Thêm Topping</h3>
                                    <div class="product-detail__topping-list">
                                        <label class="product-detail__topping-item">
                                            <input type="checkbox" name="topping" value="rau" class="product-detail__topping-checkbox">
                                            <span class="product-detail__topping-text">Thêm rau</span>
                                            <span class="product-detail__topping-price">+ 5.000</span>
                                        </label>
                                        <label class="product-detail__topping-item">
                                            <input type="checkbox" name="topping" value="pho-mai" class="product-detail__topping-checkbox">
                                            <span class="product-detail__topping-text">Thêm phô mai</span>
                                            <span class="product-detail__topping-price">+ 10.000</span>
                                        </label>
                                        <label class="product-detail__topping-item">
                                            <input type="checkbox" name="topping" value="trung" class="product-detail__topping-checkbox">
                                            <span class="product-detail__topping-text">Thêm trứng</span>
                                            <span class="product-detail__topping-price">+ 7.000</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="col l-6 m-6 c-12 product-detail__content-note">
                                    <h3>Ghi chú</h3>
                                    <textarea name="note" id="note" cols="200" rows="" class="product-detail__note-textarea" placeholder="Nhập ghi chú của bạn cho shipper..."></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-detail__info">
                        <div class="row">
                            <div class=" l-6 m-12 c-12 product-detail__info-shop">
                                <div class="product-detail__info-image">
                                    <img src="../images/shops/circle.png" alt="Ảnh cửa hàng" class="product-detail__info-image-img">
                                </div>
                                <div class="product-detail__info-name">
                                    <a href="" class="product-detail__info-name--link">Ngũ Long Bakery</a>
                                    <i class="product-detail__info-quantityproduct">Số sản phẩm hiện có: 6 sản phẩm</i>
                                </div>
                                <div class="product-detail__info--view">
                                    <button class="product-detail__info--view-btn">
                                        <i class="product-detail__info--view-icon">🛒</i> Xem Shop
                                    </button>
                                </div>
                            </div>
                            <div class=" l-6 m-12 c-12 product-detail__shop-info">
                                <div class="product-detail__delivery-info">
                                    <i class="product-detail__delivery-icon">🚚</i>
                                    <div class="product-detail__delivery-text">
                                        <span class="product-detail__delivery-title">Giao hàng nhanh chóng, tiện lợi</span>
                                        <i class="product-detail__delivery-subtitle">Dễ dàng thanh toán</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="product-detail__moreproduct">
                        <h3>Các sản phẩm liên quan</h3>
                        <div class="row">
                            <div class="col l-3 m-6 c-6">
                                <div class="product-related__item">
                                    <img src="../images/products/banhkemtrungmuoi.jpg" alt="Combo Cơm cháy + Trà đường là đà" class="product-related__item-img">
                                    <h4 class="product-related__item-name"><a href="">Combo Cơm cháy</a></h4>
                                    <p class="product-related__item-cate">Quán Ngũ Long | 100 lượt mua</p>
                                    <p class="product-related__item-price">25.000đ <span>30.000đ</span></p>
                                    <button class="product-related__item-btn">Thêm vào giỏ</button>
                                </div>
                            </div>
                            <div class="col l-3 m-6 c-6">
                                <div class="product-related__item">
                                    <img src="../images/products/banhkemtrungmuoi.jpg" alt="Bánh tráng cuốn + Trà chanh" class="product-related__item-img">
                                    <h4 class="product-related__item-name"><a href="">Bánh tráng cuốn</a></h4>
                                    <p class="product-related__item-cate">Quán Ngũ Long | 100 lượt mua</p>
                                    <p class="product-related__item-price">25.000đ <span>30.000đ</span></p>
                                    <button class="product-related__item-btn">Thêm vào giỏ</button>
                                </div>
                            </div>
                            <div class="col l-3 m-6 c-6">
                                <div class="product-related__item">
                                    <img src="../images/products/banhkemtrungmuoi.jpg" alt="Bánh tráng cuốn" class="product-related__item-img">
                                    <h4 class="product-related__item-name"><a href="">Bánh tráng cuốn</a></h4>
                                    <p class="product-related__item-cate">Quán Ngũ Long | 100 lượt mua</p>
                                    <p class="product-related__item-price">25.000đ <span>30.000đ</span></p>
                                    <button class="product-related__item-btn">Thêm vào giỏ</button>
                                </div>
                            </div>
                            <div class="col l-3 m-6 c-6">
                                <div class="product-related__item">
                                    <img src="../images/products/banhkemtrungmuoi.jpg" alt="Bánh tráng cuốn" class="product-related__item-img">
                                    <h4 class="product-related__item-name"><a href="">Bánh tráng cuốn</a></h4>
                                    <p class="product-related__item-cate">Quán Ngũ Long | 100 lượt mua</p>
                                    <p class="product-related__item-price">25.000đ <span>30.000đ</span></p>
                                    <button class="product-related__item-btn">Thêm vào giỏ</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="/js/product_detail.js"></script>
@endsection
