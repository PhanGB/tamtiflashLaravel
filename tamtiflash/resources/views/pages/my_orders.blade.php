@extends('layouts.app')
@section('title', 'Đơn hàng của tôi')
@section('content')


    <!-- Start main -->
    <!-- <link rel="stylesheet" href="public/css/my_account.css" /> -->
    @vite(['resources/css/my_account.css'])
    <!-- Start my account -->
    <main class="myAccount">
        <section class="grid wide">
            <div class="row">
                <!-- Start Menu Desktop -->
                <div class="col l-3 m-0 c-0">
                    <nav class="myAccount__nav-desktop">
                        <div class="myAccount__item">
                            <h1 class="myAccount__title-h1">Tài khoản của tôi</h1>
                        </div>
                        <ul class="myAccount__menu">
                            <li class="myAccount__menu-item">
                                <a href="/info" class="myAccount__menu-link">Quản lý tài khoản</a>
                            </li>
                            <li class="myAccount__menu-item">
                                <a href="/my_order" class="myAccount__menu-link">Đơn hàng của tôi</a>
                            </li>
                            <li class="myAccount__menu-item border-bottom-radius">
                                <a href="/tamtiflash/signout" class="myAccount__menu-link">Đăng xuất</a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <!-- End Menu Desktop -->


                <!-- Start Menu Mobile -->
                <div class="col l-0 m-12 c-12">
                    <nav class="myAccount__nav-mobile">
                        <div class="myAccount__title ">
                            <h1 class="myAccount__title-h1">Tài khoản của tôi</h1>
                        </div>
                        <ul class="myAccount__menu row">
                            <li class="myAccount__menu-item col m-6 c-6">
                                <a href="" class="myAccount__menu-link">Quản lý tài khoản</a>
                            </li>
                            <li class="myAccount__menu-item col m-6 c-6">
                                <a href="" class="myAccount__menu-link">Đơn hàng của tôi</a>
                            </li>

                        </ul>
                    </nav>
                </div>
                <!-- End Menu Mobile -->

                <!-- Start content -->
                <div class="myOrder__content col l-9 m-12 c-12">
                    <div class="myOrder__content-title">
                        <h1>Đơn hàng của tôi</h1>
                    </div>

                    <div class="myOrder__filter l-12 m-0 c-0">
                        <div class="myOrder__filter-item">
                            <span class="myOrder__filter-label">Sắp xếp theo</span>
                            <button class="myOrder__filter-btn">Đã giao</button>
                            <button class="myOrder__filter-btn">Đang vận chuyển</button>
                            <button class="myOrder__filter-btn">Đã huỷ</button>
                            <button class="myOrder__filter-btn">Cần đánh giá</button>

                            <div class="myOrder__filter-page">
                                <span class="myOrder__filter-page-num">
                                    <span class="myOrder__filter-page-current">1</span>/3
                                </span>

                                <div class="myOrder__filter-page-control">
                                    <a href="" class="myOrder__filter-page-btn myOrder__filter-page-btn--disabled">
                                        <i class="myOrder__filter-page-icon fas fa-angle-left"></i>
                                    </a>
                                    <a href="" class="myOrder__filter-page-btn">
                                        <i class="myOrder__filter-page-icon fas fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="myOrder__filter-mobile col l-0 m-12 c-12">
                        <div class="myOrder__filter-mobile-item row">
                            <button class="myOrder__filter-mobile-btn col l-0 m-3 c-3">Đã giao</button>
                            <button class="myOrder__filter-mobile-btn col l-0 m-3 c-3">Đang vận chuyển</button>
                            <button class="myOrder__filter-mobile-btn col l-0 m-3 c-3">Đã huỷ</button>
                            <button class="myOrder__filter-mobile-btn col l-0 m-3 c-3">Cần đánh giá</button>
                        </div>
                    </div>



                    <!-- Start content info -->
                    <!-- $status = "";
                        if ($item['status'] == 1) {
                            $status = "Đã giao";
                            $class = "myOrder-success";
                        } else if ($item['status'] == 2) {
                            $status = "Đang vận chuyển";
                            $class = "myOrder-in-progress";
                        } else if ($item['status'] == 3) {
                            $status = "Đã huỷ";
                            $class = "myOrder-cancel";
                        } else {
                            $status = "Cần đánh giá";
                            $class = "myOrder-need-review";
                        } -->

                   @foreach ($orders as $order)
                     @php
                            $status = "";
                            if ($order->status == 1) {
                             $status = "Đã giao";
                             $class = "myOrder-success";
                            } else if ($order->status == 2) {
                             $status = "Đang vận chuyển";
                             $class = "myOrder-in-progress";
                            } else if ($order->status == 3) {
                             $status = "Đã huỷ";
                             $class = "myOrder-cancel";
                            } else {
                             $status = "Cần đánh giá";
                             $class = "myOrder-need-review";
                            }
                      @endphp
                   <div class="myOrder__content-info l-12 m-12 c-12">
                        <div class="myOrder__info-title border-top-radius">
                            <h2>Mã đơn hàng: {{ $order->order_id }}</h2>
                        </div>

                        <div class="myOrder__info-item">
                            <strong>Quán: </strong> <span>{{ $order->shop_name }}</span>
                        </div>

                        <div class="myOrder__info-item">
                            <strong>Tổng tiền: </strong> <span>{{ number_format($order->total,3) }}đ</span>
                        </div>

                        <div class="myOrder__info-item">
                            <strong>Ngày đặt hàng: </strong> <span>{{ \Carbon\Carbon::parse($order->order_date)->format('d/m/Y H:i') }}</span>
                        </div>
                        <div class="row myOrder__info-item">
                            <span class="col l-6 m-6 c-6 {{ $class }}">{{ $status }}</span>
                            <a class="col l-6 m-6 c-6 myOrder__item-link" href="/ordertracking/{{ $order->order_id }}">Xem chi tiết</a>
                        </div>
                    </div>
                   @endforeach
                    <!-- End content info -->


                </div>
                <!-- End content -->

        </section>
    </main>
    <!-- End my account -->

@endsection