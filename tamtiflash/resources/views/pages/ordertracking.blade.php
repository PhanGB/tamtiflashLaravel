@extends('layouts.app')
@section('title', 'Theo dõi đơn hàng')
@section('content')


    <!-- <base href="http://localhost/tamtiflash/">
        <link rel="stylesheet" href="public/css/tracking.css" /> -->
    @vite(['resources/css/tracking.css'])
    <style>
        .order-info {
            /* padding-top: 50px; */
            font-size: 25px;
            /* Font size for the text */
        }
    </style>
    <div class="banner">
        <div>
            <h2 class="banner-title">Giao nhanh, ăn ngon, không lo giá cả</h2>
            <a href="/order" class="primary-btn banner-btn">LỰA ĐỒ ĂN, NƯỚC UỐNG THÔI!</a>
        </div>
    </div>

    <br><br><br>
    <main class="order-tracking">
        <h1 style="text-align: center;">Theo dõi đơn hàng</h1>
        <div class="grid-container">
            <div class="order-info">
                @php
                    $status = "";
                    if ($orders->first()->status == 0) {
                        $status = "Đang chờ xác nhận";
                    } else if ($orders->first()->status == 1) {
                        $status = "Đang vận chuyển";
                    } else if ($orders->first()->status == 2) {
                        $status = "Đã giao";
                    } else {
                        $status = "Cần đánh giá";
                    }
                  @endphp
                <h2>Thông tin đơn hàng</h2> <br>
                <p>Mã đơn hàng: <span>{{ $orders->first()->order_id }}</span></p>
                <p>Cửa hàng: {{ $orders->first()->shop_name }}</p>
                <p>Ngày đặt: {{ $orders->first()->order_date }}</p>
                <p>Trạng thái: <span class="status active">{{ $status }}</span></p>
                 <br>
                <div class="tracking-progress">
                    <span class="step {{ $orders->first()->status >= 0 ? 'completed' : '' }}">Đang chờ</span>
                    <span class="progress-bar {{ $orders->first()->status >= 1 ? 'completed' : '' }}"></span>

                    <!-- <span class="step {{ $orders->first()->status >= 1 ? 'completed' : '' }}">Xác nhận</span>
                    <span class="progress-bar {{ $orders->first()->status >= 2 ? 'completed' : '' }}"></span> -->

                    <span class="step {{ $orders->first()->status >= 1 ? 'completed' : '' }}">Vận chuyển</span>
                    <span class="progress-bar {{ $orders->first()->status >= 2 ? 'completed' : '' }}"></span>

                    <span class="step {{ $orders->first()->status >= 2 ? 'completed' : '' }}">Đã giao</span>
                </div>

            </div>

            <div class="product-details">
                <h2>Chi tiết sản phẩm</h2> <br>

                @php $stt = 1; @endphp
                @foreach($orders as $product)
                    <div>
                        <h3>{{ $stt++ }}: Tên sản phẩm: {{ $product->product_name }}</h3>
                        <p>Số lượng: {{ $product->quantity }}</p>
                        <p>Giá: {{ number_format($product->product_price, 3, ',', '.') }} VND</p>
                    </div>
                @endforeach

                <button class="btn-primary" style="margin-top: 10px;">Liên hệ Driver</button>
            </div>
        </div>

    </main>

@endsection