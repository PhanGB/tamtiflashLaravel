@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Đơn hàng')
@section ('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Đơn hàng</h6>
            <form action="" class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-9 col-sm-11">
                        <input type="text" placeholder="Tìm kiếm đơn hàng..." class="form-control" />
                    </div>
                    <div class="col-3 col-sm-1 text-center">
                        <button class="btn btn-primary w-100"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
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
                            <td>
                                <select class="form-select">
                                    <option value="">Chờ xác nhận</option>
                                    <option value="">Đang giao hàng</option>
                                    <option value="">Đã hoàn thành</option>
                                    <option value="">Đã huỷ</option>
                                </select>
                            </td>
                            <td>
                                <a href="order_details.html">
                                    <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                                </a>
                                <a href="">
                                    <button class="btn btn-success">Nhận đơn</button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Ngày">2025-02-22 09:46:49</td>
                            <td data-label="Mã">INV-0123</td>
                            <td data-label="Khách hàng">Phan Quốc Dương</td>
                            <td data-label="Tổng tiền">325.000đ</td>
                            <td>
                                <select class="form-select">
                                    <option value="">Chờ xác nhận</option>
                                    <option value="">Đang giao hàng</option>
                                    <option value="">Đã hoàn thành</option>
                                    <option value="">Đã huỷ</option>
                                </select>
                            </td>
                            <td>
                                <a href="order-details.html">
                                    <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                                </a>
                                <a href="">
                                    <button class="btn btn-success">Nhận đơn</button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Ngày">2025-02-22 09:46:49</td>
                            <td data-label="Mã">INV-0123</td>
                            <td data-label="Khách hàng">Phan Quốc Dương</td>
                            <td data-label="Tổng tiền">325.000đ</td>
                            <td>
                                <select class="form-select">
                                    <option value="">Chờ xác nhận</option>
                                    <option value="">Đang giao hàng</option>
                                    <option value="">Đã hoàn thành</option>
                                    <option value="">Đã huỷ</option>
                                </select>
                            </td>
                            <td>
                                <a href="">
                                    <button class="btn btn-primary"><i class="fa-solid fa-eye"></i></button>
                                </a>
                                <a href="">
                                    <button class="btn btn-success">Nhận đơn</button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Table End -->

@endsection
