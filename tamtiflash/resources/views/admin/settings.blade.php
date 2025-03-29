@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Cài đặt')
@section ('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <div class="d-flex justify-content-between mb-4">
                <h6 class="mb-0">Quản lý cài đặt hệ thống</h6>
                <!-- <a href="add_voucher.html" class="btn btn-primary">Thêm Voucher</a> -->
            </div>
            <div class="table-responsive">
                <ul>
                    <li><a href="payment_method.html">Cấu hình phương thức thanh toán</a></li>
                    <li><a href="shipping_fee.html">Cấu hình phí Vận Chuyển</a></li>
                </ul>
            </div>
        </div>
    </div>
            <!-- Table End -->
@endsection
