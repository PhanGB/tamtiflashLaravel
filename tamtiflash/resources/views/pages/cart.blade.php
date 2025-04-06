@extends('layouts.app')
@section('title', 'Giỏ hàng')
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
            @if (!empty($cart))
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
                                @foreach ($cart as $index => $item)
                                    <tr>
                                        <td class="product-box">
                                            <img
                                                src="{{ asset('images/products/'.$item['image']) }}"
                                                class="product-img"
                                            />
                                            <div class="product-dsc">
                                                <h3 class="product-name">{{ $item['name'] }}</h3>
                                                <span class="product-res">{{ $item['variant'] }}</span>
                                            </div>
                                        </td>
                                        <td>{{ number_format($item['price']) }}đ</td>
                                        <td>
                                            <form class="quantity-form quantity-control">
                                                <input type="hidden" name="index" value="<?=$index?>">
                                                <button type="button" class="quantity-btn quantity-minus">-</button>
                                                <input class="quantity" type="text" value="{{ $item['quantity'] }}" />
                                                <button type="button" class="quantity-btn quantity-plus">+</button>
                                            </form>
                                        </td>
                                        <td class="line-total line-item-total" data-index="<?=$index?>">{{ number_format($item['price'] * $item['quantity']) }}đ</td>
                                        <td><button onclick="deleteProduct(<?=$index?>)" class="remove-btn"><i class="fa-solid fa-xmark"></i></button></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="cart-mobile">
                            <div class="cart-container">
                                <div class="cart-item">
                                    <img
                                        src="{{ asset('images/products/banhkemtrungmuoi.jpg') }}"
                                        class="cart-img"
                                    />
                                    <div class="cart-details">
                                        <h3 class="cart-name">{{ $item['name'] }}</h3>
                                        <span class="cart-res"><i class="fa-solid fa-location-dot"></i>{{ $item['variant'] }}</span>
                                        <span class="cart-price">{{ number_format($item['price']) }}đ</span>
                                        <form class="quantity-form cart-quantity-mobile">
                                            <input type="hidden" name="index" value="<?=$index?>">
                                            <button class="quantity-btn quantity-minus">−</button>
                                            <input type="text" value="{{ $item['quantity'] }}" class="quantity-input quantity" />
                                            <button class="quantity-btn quantity-plus">+</button>
                                        </form>
                                    </div>
                                    <button onclick="deleteProduct(<?=$index?>)" class="remove-btn"><i class="fa-solid fa-xmark"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col l-3 m-12 c-12">
                        <div class="cart-total">
                            <div>
                                <label for="" class="total-label">Thành tiền</label>
                                <span class="total-price">{{ number_format($grand_total) }}đ</span>
                            </div>
                            <a class="cart-btn-link" href="/checkout">
                                <button class="cart-btn">Thanh toán</button>
                            </a>
                        </div>
                    </div>
                </div>
            @else
                <div class="cart-empty">
                    <h2 class="cart-empty__title">Giỏ hàng của bạn đang trống!</h2>
                    <a href="/" class="continue-buy__btn">Tiếp tục mua hàng</a>
                </div>
            @endif

        </div>
    </div>
</main>
<script src="/js/cart.js"></script>
@endsection
