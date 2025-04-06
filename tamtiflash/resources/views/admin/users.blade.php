@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Người dùng')

@section ('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Người dùng</h6>
            <form action="" class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-9 col-sm-11">
                        <input type="text" placeholder="Tìm kiếm người dùng..." class="form-control" />
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
                            <th>Ngày tạo</th>
                            <th>Mã giới thiệu</th>
                            <th>Họ tên</th>
                            <th>Số điện thoại</th>
                            <th>Trạng thái</th>
                            <!-- <th>Hành động</th> -->
                        </tr>
                    </thead>
                    <tbody>
                        <!-- <tr>
                            <td data-label="Ngày tạo">2025-02-22 09:46:49</td>
                            <td data-label="Mã">INV-0123</td>
                            <td data-label="Họ tên">Phan Quốc Dương</td>
                            <td data-label="Số điện thoại">0828283169</td>
                            <td data-label="Trạng thái"><i style="color: green" class="fa-solid fa-circle"></i></td>
                            <td data-label="Hành động">
                                <a href="user_edit.html">
                                    <button class="btn btn-warning"><i class="fa-solid fa-pen"></i></button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Ngày tạo">2025-02-22 09:46:49</td>
                            <td data-label="Mã">INV-0123</td>
                            <td data-label="Họ tên">Phan Quốc Dương</td>
                            <td data-label="Số điện thoại">0828283169</td>
                            <td data-label="Trạng thái"><i style="color: red" class="fa-solid fa-circle"></i></td>
                            <td data-label="Hành động">
                                <a href="user-edit.html">
                                    <button class="btn btn-warning"><i class="fa-solid fa-pen"></i></button>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td data-label="Ngày tạo">2025-02-22 09:46:49</td>
                            <td data-label="Mã">INV-0123</td>
                            <td data-label="Họ tên">Phan Quốc Dương</td>
                            <td data-label="Số điện thoại">0828283169</td>
                            <td data-label="Trạng thái"><i style="color: green" class="fa-solid fa-circle"></i></td>
                            <td data-label="Hành động">
                                <a href="user-edit.html">
                                    <button class="btn btn-warning"><i class="fa-solid fa-pen"></i></button>
                                </a>
                            </td>
                        </tr> -->

                        @foreach ($users as $user )
                        <tr>
                            <td data-label="Ngày tạo">{{ $user->create_at }}</td>
                            <td data-label="Mã giới thiệu">{{ $user->my_code }}</td>
                            <td data-label="Họ tên">{{ $user->name }}</td>
                            <td data-label="Số điện thoại">{{ $user->phone }}</td>
                            <td data-label="Trạng thái">
                                @if ($user->status == 1)
                                    <i style="color: green" class="fa-solid fa-circle"></i>
                                @else
                                    <i style="color: red" class="fa-solid fa-circle"></i>
                                @endif
                            </td>
                            <!-- <td data-label="Hành động">
                                <a href="">
                                    <button class="btn btn-warning"><i class="fa-solid fa-pen"></i></button>
                                </a>
                            </td> -->
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Table End -->

@endsection
