@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Quản lý Voucher')
@section ('content')
     <!-- Table Start -->
     <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <div class="d-flex justify-content-between mb-4">
                <h6 class="mb-0">Quản lý Voucher</h6>
                <a href="add_voucher.html" class="btn btn-primary">Thêm Voucher</a>
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
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Tên Voucher</th>
                            <th scope="col">Mã Voucher</th>
                            <th scope="col">Giảm Giá</th>
                            <th scope="col">Ngày Hết Hạn</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Voucher 1</td>
                            <td>ABC123</td>
                            <td>10%</td>
                            <td>2023-12-31</td>
                            <td>
                                <a href="edit_voucher.html" class="btn btn-sm btn-warning">Sửa</a>
                                <a href="#" class="btn btn-sm btn-danger">Xóa</a>
                            </td>
                        </tr>
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
            <!-- Table End -->

@endsection
