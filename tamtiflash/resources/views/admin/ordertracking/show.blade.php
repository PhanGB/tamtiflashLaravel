<!-- resources/views/admin/ordertracking/show.blade.php -->
@extends('admin.layouts.app')

@section('title', 'Chi Tiết Đơn Hàng')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Chi Tiết Đơn Hàng: {{ $order->order_code }}</h6>

            <div class="row">
                <div class="col-6">
                    <strong>Khách Hàng:</strong> {{ $order->user->name }}
                </div>
                <div class="col-6">
                    <strong>Số Điện Thoại:</strong> {{ $order->user->phone }}
                </div>
                <div class="col-6">
                    <strong>Nhân Viên Giao Hàng:</strong> {{ $order->admin->name }}
                </div>
                <div class="col-6">
                    <strong>Trạng Thái:</strong> {{ $order->status }}
                </div>
                <div class="col-12">
                    <strong>Ngày Tạo:</strong> {{ $order->created_at }}
                </div>
            </div>
        </div>
    </div>
@endsection
