@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Nhân viên')
@section ('content')
     <!-- Table Start -->
     <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">

            <div class="d-flex align-items-center justify-content-between mb-4">
                <h4 class="mb-0">Danh sách nhân viên</h4>
                <select name="" id="" class="form-select" style="width: 200px;float:right;">
                    <option value="">Tất cả</option>
                    <option value="">Admin</option>
                    <option value="">Shipper</option>
                </select>
                <a href="add_staff.html" class="btn btn-primary" style="float: right;">Thêm nhân viên</a>
            </div>
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
                <table class="table text-start align-middle table-bordered table-hover mb-0">
                    <thead>
                        <tr class="text-dark">
                            <th scope="col">Họ Tên</th>
                            <th scope="col">Vai Trò</th>
                            <th scope="col">Trạng Thái</th>
                            <th scope="col">Hoạt động</th>
                            <th scope="col">Hành Động</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Nguyễn Văn A</td>
                            <td style="font-weight: bold; color: red;">Admin</td>
                            <td style="font-weight: bold; color: red;">Online</td>
                            <td>Có mặt</td>
                            <td>
                                <a href="staff_detail.html" class="btn btn-sm btn-primary">Xem chi tiết</a>
                                <!-- <a href="#" class="btn btn-sm btn-primary">Sửa</a> -->
                                <a href="#" class="btn btn-sm btn-danger">Xóa</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Trần Thị B</td>
                            <td>Shipper</td>
                            <td style="color: rgba(82, 82, 82, 0.712);">Offline</td>
                            <td>Nghỉ phép</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Xem chi tiết</a>
                                <!-- <a href="#" class="btn btn-sm btn-primary">Sửa</a> -->
                                <a href="#" class="btn btn-sm btn-danger">Xóa</a>
                            </td>
                        </tr>
                        <tr>
                            <td>Lê Văn C</td>
                            <td>Shipper</td>
                            <td style="font-weight: bold; color: green;">Đang rảnh</td>
                            <td>Có mặt</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary">Xem chi tiết</a>
                                <!-- <a href="#" class="btn btn-sm btn-primary">Sửa</a> -->
                                <a href="#" class="btn btn-sm btn-danger">Xóa</a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        <!-- Table End -->

@endsection
