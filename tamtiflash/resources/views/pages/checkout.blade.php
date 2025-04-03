@extends('layouts.app')
@section('title', 'Thanh toán')

@section('content')
    @vite('resources/css/payment.css')
    <!-- Start main -->
    <div class="banner">
        <h2 class="banner-title">Thanh toán</h2>
    </div>

    <div class="payment-body">
        <div class="grid wide">
            <div class="row">
                <div class="col l-7 m-12 c-12">
                    <form class="checkout-form">
                        <div class="address">
                            <div class="address-bar">
                                <span class="address-icon"><i class="fa-solid fa-location-dot"></i></span>
                                <span class="address-text">141 - 143, đường Lê Thị Nho, phường Trung Mỹ Tây, quận 12, thành
                                    phố Hồ Chí Minh...</span>
                            </div>
                            <button class="refresh-btn"><i class="fa-solid fa-arrows-rotate"></i></button>
                        </div>
                        <div class="form-group">
                            <div class="input-group-half">
                                <label>Họ và tên <span class="required">*</span></label>
                                <input type="text" value="{{ $user->name }}" required />
                            </div>
                            <div class="input-group-half">
                                <label>Số điện thoại <span class="required">*</span></label>
                                <input type="tel" value="{{ $user->phone }}" required />
                            </div>
                        </div>

                        <div class="input-group">
                            <label>Ghi chú</label>
                            <input type="text" />
                        </div>

                        <div class="payment-method">
                            <label>Phương thức thanh toán <span class="required">*</span></label>
                            <div class="payment-options">
                                <label class="payment-option">
                                    <input type="radio" name="payment" required />
                                    <img src="../images/icons/cod-icon.svg" alt="COD" />
                                    Thanh toán khi giao hàng (COD)
                                </label>
                                <label class="payment-option">
                                    <input type="radio" name="payment" />
                                    <img src="../images/icons/bank-icon.svg" alt="Bank Transfer" />
                                    Chuyển khoản qua ngân hàng
                                </label>
                            </div>
                        </div>

                        <div class="buttons">
                            <a href="#" class="back-link">Quay lại giỏ hàng</a>
                            <button type="submit" class="submit-btn">Thanh toán</button>
                        </div>
                    </form>
                </div>
                <div class="col l-5 m-12 c-12">
                    <div class="cart-container">
                        @foreach ($cart as $index => $item)
                            <div class="cart-item">
                                <div class="item-box">
                                    <div class="item-thumbnail">
                                        <img src="{{ asset('images/products/'.$item['image']) }}" alt="{{ $item['image'] }}" class="product-img" />
                                        <span class="item-quantity">{{ $item['quantity'] }}</span>
                                    </div>
                                    <div class="item-info">
                                        <h3 class="item-name">{{ $item['name'] }}</h3>
                                        <span class="item-res"><i class="fa-solid fa-location-dot"></i>{{ $item['id_shop'] }}</span>
                                    </div>
                                </div>
                                <span class="item-price">{{ number_format($item['price'], 0) }}đ</span>
                            </div>
                        @endforeach

                        <div class="discount-section">
                            <input type="text" placeholder="Nhập mã giảm giá..." class="discount-input" />
                            <button class="apply-button">Sử dụng</button>
                        </div>

                        <div class="payment-details">
                            <div class="provisional">
                                <span class="provisional-title">Tạm tính</span>
                                <span class="provisional-price">{{ number_format($grand_total, 0) }}đ</span>
                            </div>
                            <div class="transport-fee">
                                <span class="transport-fee__title">Phí vận chuyển</span>
                                <span class="transport-fee__price">-</span>
                            </div>
                        </div>
                        <div class="total-payment">
                            <span class="total-payment__title">Tổng cộng</span>
                            <span class="total-payment__price">
                                <span class="total-payment__price-unit">VND</span>
                                <span id="total-payment" class="total-payment__price-main">150.000đ</span>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- End main -->

@endsection