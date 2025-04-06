@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Trang chủ')
@section('dashboard', 'active')

@section('content')
    <!-- Sale & Revenue Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <!-- Số đơn hàng đã hoàn thành trong ngày/tháng -->
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-shopping-cart fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Đơn hàng hôm nay</p>
                        <h6 class="mb-0">{{ $todayOrdersCount }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-calendar-alt fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Đơn hàng tháng này</p>
                        <h6 class="mb-0">{{ $monthOrdersCount }}</h6>
                    </div>
                </div>
            </div>
            <!-- Doanh thu theo ngày/tháng -->
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-dollar-sign fa-3x text-primary"></i>
                    <div class="ms-5">
                        <p class="mb-2">Doanh thu hôm nay</p>
                        <h6 class="mb-0">${{ number_format($todayRevenue, 0, ',', '.') }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-3">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-calendar-alt fa-3x text-primary"></i>
                    <div class="ms-3">
                        <p class="mb-2">Doanh thu tháng này</p>
                        <h6 class="mb-0">${{ number_format($monthRevenue, 0, ',', '.') }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Chart End -->

    <!-- Đánh giá dịch vụ: Khiếu nại/Đánh giá tốt -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-6 col-xl-6">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-thumbs-down fa-3x text-danger"></i>
                    <div class="ms-3">
                        <p class="mb-2">Khiếu nại khách hàng</p>
                        <h6 class="mb-0">{{ $complaintsCount }}</h6>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-xl-6">
                <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                    <i class="fa fa-thumbs-up fa-3x text-success"></i>
                    <div class="ms-3">
                        <p class="mb-2">Đánh giá tốt khách hàng</p>
                        <h6 class="mb-0">{{ $goodReviewsCount }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loại hàng hóa được giao nhiều nhất -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light text-center rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <h6 class="mb-0">Loại hàng hóa được giao nhiều nhất</h6>
                <a href="">Xem tất cả</a>
            </div>
            <div class="table-responsive">
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Loại hàng hóa</th>
                            <th scope="col">Số lượng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topCategories as $categoryName => $quantity)
                            <tr>
                                <td>{{ $categoryName }}</td>
                                <td>{{ $quantity }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

        <!-- Widgets Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Nhân viên năng suất</h6>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Họ và Tên</th>
                                <th scope="col">Số đơn hàng đã giao</th>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($topShippers as $index => $shipper)
                                <tr>
                                    <th scope="row">{{ $index + 1 }}</th>
                                    <td>{{ $shipper->first_name }} {{ $shipper->last_name }}</td>
                                    <td>{{ $shipper->delivered_orders_count }}</td>
                                    <td>{{ $shipper->email }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">Chưa có dữ liệu nhân viên năng suất</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Widgets End -->
@endsection
