@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Cửa hàng')
@section ('content')
    <!-- Navbar End -->

    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <div class="row g-2 align-items-center mb-4">
                <div class="col-8 col-sm-10">
                    <h6 class="mb-4">Đơn hàng</h6>
                </div>
                <div class="col-4 col-sm-2 text-center">
                    <a href="{{ url('/admin/add_shop') }}" type="button" class="btn btn-primary w-100 mb-4">Thêm cửa hàng</a>
                </div>
            </div>
            <form action="" class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-9 col-sm-11">
                        <input type="text" placeholder="Tìm kiếm cửa hàng..." class="form-control" />
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
                    <th>STT</th>
                    <th>Ảnh</th>
                    <th>Tên cửa hàng</th>
                    <th>Ghi chú</th>
                    <th>Đánh giá</th>
                    <th>Trạng thái</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($shops as $shop)
                <tr>
                    <td>{{ $shop->id }}</td>
                    <td><img src="../img/user.jpg" alt="" style="width: 40px; height: 40px" /></td>
                    <td>{{ $shop->name }}</td>
                    <td>{{ $shop->short_description }}</td>
                    <td>{{ $shop->rate }} <i class="fas fa-star text-warning"></i></td>
                    <td>
                        <select class="form-select">
                            <option value="">Ẩn</option>
                            <option value="">Hiện</option>
                        </select>
                    </td>
                    <td>
                        <a href="edit_shop.html">Sửa</a>
                        <a href="">Xóa</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    </div>

    <!-- Content End -->

@endsection
