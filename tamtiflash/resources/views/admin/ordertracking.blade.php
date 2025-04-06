@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Đơn hàng')

@section('content')
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
                            <th>Thanh Toán</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ordersDelivery as $order)
                            <tr>
                                <td data-label="Ngày">{{ $order->create_at->format('d/m/Y H:i:s') }}</td>
                                <td data-label="Mã">{{ $order->id }}</td>
                                <td data-label="Khách hàng">{{ $user->firstWhere('id', $order->id_user)->name ?? 'N/A' }}</td>
                                <td data-label="Tổng tiền">{{ number_format($order->total, 0) }}đ</td>
                                <td data-label="Nhân Viên">{{ $shipper->firstWhere('id', $order->id_driver)->name ?? 'N/A' }}</td>
                                <td data-label="Thanh Toán">{{ $order->payment_method_name }}</td>
                                <td data-label="Hành Động" style="{{ $order->status_style }}">{{ $order->status_name }}</td>
                                <td>
                                    <a href="" class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                    <form action="{{ route('admin.orders.complete', $order->id) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PATCH')
                                        <button type="submit" class="btn btn-success" onclick="return confirm('Xác nhận hoàn thành đơn hàng này?')">
                                            Hoàn Thành
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7">Không có đơn hàng đang giao.</td>
                            </tr>
                        @endforelse
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
                <a href="" class="btn btn-info">Xuất Dữ Liệu</a>
            </div>

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
                            <th>Thanh Toán</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($ordersCompleted as $order)
                            <tr>
                                <td data-label="Ngày">{{ $order->create_at->format('d/m/Y H:i:s') }}</td>
                                <td data-label="Mã">{{ $order->id }}</td>
                                <td data-label="Khách hàng">{{ $user->firstWhere('id', $order->id_user)->name ?? 'N/A' }}</td>
                                <td data-label="Tổng tiền">{{ number_format($order->total, 0) }}đ</td>
                                <td data-label="Nhân Viên">{{ $shipper->firstWhere('id', $order->id_driver)->name ?? 'N/A' }}</td>
                                <td data-label="Thanh Toán">{{ $order->payment_method_name }}</td>
                                <td data-label="Hành Động" style="{{ $order->status_style }}">{{ $order->status_name }}</td>
                                <td>
                                    <a href="" class="btn btn-primary">
                                        <i class="fa-solid fa-eye"></i>
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8">Không có đơn hàng đã hoàn thành.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
