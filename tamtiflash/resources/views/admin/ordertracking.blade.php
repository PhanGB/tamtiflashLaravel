@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Theo Dõi Đơn Hàng')

@section('content')
    <!-- Content Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">

            <!-- Header Section -->
            <div class="row g-2 align-items-center mb-4">
                <div class="col-8 col-sm-10">
                    <h6 class="mb-4">Theo Dõi Đơn Hàng</h6>
                </div>
                <div class="col-4 col-sm-2 text-center">
                    <button type="button" class="btn btn-primary w-100 mb-4" data-bs-toggle="modal"
                        data-bs-target="#addOrderModal">Thêm Đơn Hàng</button>
                </div>
            </div>

            <!-- Search Form -->
            <form id="searchForm" class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-9 col-sm-11">
                        <input type="text" name="search" id="searchInput" placeholder="Tìm kiếm đơn hàng..."
                            class="form-control" />
                    </div>
                    <div class="col-3 col-sm-1 text-center">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fa-solid fa-magnifying-glass"></i> Tìm
                        </button>
                    </div>
                </div>
            </form>

            <!-- Filter Form -->
            <form id="filterForm" class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-9 col-sm-11">
                        <select name="status" id="statusFilter" class="form-control">
                            <option value="all">Tất cả Trạng Thái</option>
                            <option value="pending">Chờ Xác Nhận</option>
                            <option value="shipping">Đang Giao</option>
                            <option value="delivered">Đã Giao</option>
                            <option value="cancelled">Đã Hủy</option>
                        </select>
                    </div>
                    <div class="col-3 col-sm-1 text-center">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fa-solid fa-filter"></i> Lọc
                        </button>
                    </div>
                </div>
            </form>

            <!-- Order Table -->
            <div class="table-responsive">
                <table class="table text-center align-middle" id="ordersTable">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã Đơn Hàng</th>
                            <th>Khách Hàng</th>
                            <th>Số Điện Thoại</th>
                            <th>Nhân Viên</th>
                            <th>Trạng Thái</th>
                            <th>Ngày Tạo</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data will be filled dynamically -->
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- Add Order Modal -->
    <div class="modal fade" id="addOrderModal" tabindex="-1" aria-labelledby="addOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addOrderModalLabel">Thêm Đơn Hàng</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addOrderForm">
                        @csrf
                        <div class="mb-3">
                            <label for="order_code" class="form-label">Mã Đơn Hàng</label>
                            <input type="text" class="form-control" id="order_code" name="order_code" required>
                        </div>
                        <div class="mb-3">
                            <label for="id_user" class="form-label">Khách Hàng</label>
                            <select name="id_user" id="id_user" class="form-control" required>
                                <!-- Dynamic user options will go here -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="id_driver" class="form-label">Nhân Viên</label>
                            <select name="id_driver" id="id_driver" class="form-control" required>
                                <!-- Dynamic admin options will go here -->
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng Thái</label>
                            <select name="status" class="form-control" required>
                                <option value="pending">Chờ Xác Nhận</option>
                                <option value="shipping">Đang Giao</option>
                                <option value="delivered">Đã Giao</option>
                                <option value="cancelled">Đã Hủy</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="total" class="form-label">Tổng Tiền</label>
                            <input type="number" class="form-control" name="total" required>
                        </div>
                        <div class="mb-3">
                            <label for="note" class="form-label">Ghi Chú</label>
                            <textarea class="form-control" name="note" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Lưu Đơn Hàng</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Content End -->
@endsection
