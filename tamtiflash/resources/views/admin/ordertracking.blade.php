@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Đơn hàng')
@section('content')
    {{-- @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ngày</th>
                    <th>Mã Đơn Hàng</th>
                    <th>Khách Hàng</th>
                    <th>Tổng Tiền</th>
                    <th>Nhân Viên</th>
                    <th>Trạng Thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $orders->created_at->format('d/m/Y H:i:s') }}</td>
                    <td>{{ $orders->id_user }}</td>
                    <td>{{ $orders->customer_name }}</td>
                    <td>{{ number_format($order->total, 0, ',', '.') }} VND</td>
                    <td>{{ $orders->id_driver }}</td>
                    <td>
                        @if ($order->status == 'delivering')
                            <span class="badge badge-primary">Đang Giao</span>
                        @elseif ($order->status == 'completed')
                            <span class="badge badge-success">Hoàn Thành</span>
                        @else
                            <span class="badge badge-warning">Chưa Nhận</span>
                        @endif
                    </td>
                    <td>
                        @if ($order->status != 'completed')
                            <a href="{{ route('ordertracking.complete', $order->id) }}" class="btn btn-success btn-sm">Hoàn
                                Thành</a>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection --}}

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Theo Dõi đơn hàng</h6>
            <form action="" class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-9 col-sm-11">
                        <input type="text" placeholder="Tìm kiếm đơn hàng..." class="form-control" />
                    </div>
                    <div class="col-3 col-sm-1 text-center">
                        <button class="btn btn-primary w-100"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table text-center align-middle">
                    <thead>
                        <tr>
                            <th>Ngày</th>
                            <th>Mã</th>
                            <th>Khách hàng</th>
                            <th>Tổng tiền</th>
                            <th>Nhân Viên</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Ngày">2025-02-22 09:46:49</td>
                            <td data-label="Mã">INV-0123</td>
                            <td data-label="Khách hàng">Phan Quốc Dương</td>
                            <td data-label="Tổng tiền">325.000đ</td>
                            <td data-label="Nhân Viên">Lê Văn C</td>
                            <td data-label="Trạng thái">Đã thanh toán</td>
                            <td data-label="Hành Động"> Đang Giao Hàng</td>
                            <td>
                                <a href="order_details.html">
                                    <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                                </a>
                                <a href="">
                                    <button class="btn btn-success">Hoàn Thành</button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Table End -->
    <!-- Thống Kê -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h6>Thống Kê</h6>
                <!-- Nút Xuất Dữ Liệu ở góc phải -->
                <a href="" class="btn btn-info">Xuất Dữ Liệu</a>
            </div>

            <!-- Form tìm kiếm -->
            <form action="" class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-9 col-sm-11">
                        <input type="text" placeholder="Tìm kiếm đơn hàng..." class="form-control" />
                    </div>
                    <div class="col-3 col-sm-1 text-center">
                        <button class="btn btn-primary w-100"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>

            <!-- Bảng thống kê -->
            <div class="table-responsive">
                <table class="table text-center align-middle">
                    <thead>
                        <tr>
                            <th>Ngày</th>
                            <th>Mã</th>
                            <th>Khách hàng</th>
                            <th>Tổng tiền</th>
                            <th>Nhân Viên</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td data-label="Ngày">2025-02-22 09:46:49</td>
                            <td data-label="Mã">INV-0123</td>
                            <td data-label="Khách hàng">Phan Quốc Dương</td>
                            <td data-label="Tổng tiền">325.000đ</td>
                            <td data-label="Nhân Viên">Lê Văn C</td>
                            <td data-label="Trạng thái">Đã thanh toán</td>
                            <td data-label="Hành Động">Đã hoàn thành</td>
                            <td>
                                <a href="order_details.html">
                                    <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection