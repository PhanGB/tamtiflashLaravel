@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Cài đặt phương thức thanh toán')
@section ('content')
 <!-- Navbar End -->
 <div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded h-100 p-4">
        <div class="row g-2 align-items-center mb-4">
            <div class="col-8 col-sm-10">
                <h6 class="mb-4">Phương thức thanh toán</h6>
            </div>
            <div class="col-4 col-sm-2 text-center">
                <a href="{{ route('admin.settings') }}" class="btn btn-danger" style="margin-left: -100px;">Quay lại</a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table text-center align-middle">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên phương thức</th>
                        <th>Thao tác</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Thanh toán khi nhận hàng</td>
                        <td>Mặc định</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Thanh toán qua ngân hàng</td>
                        <td>
                          <a class="btn btn-primary" href="{{ route('admin.edit_payment') }}">Sửa</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Content End -->
@endsection
