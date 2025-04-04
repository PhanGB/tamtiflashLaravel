@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Nhân viên')
@section ('content')
    <!-- Table Start -->
    <form action="{{ route('admin.staff') }}" method="GET" class="mb-4 d-flex justify-content-between align-items-center">
        <div class="container-fluid pt-4 px-4">
            <div class="bg-light rounded p-4">

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <h4 class="mb-0">Danh sách nhân viên</h4>
                    <select name="role" onchange="this.form.submit()" class="form-select" style="width: 200px;">
                        <option value="">Tất cả</option>
                        <option value="0" {{ request('role') == '0' ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ request('role') == '2' ? 'selected' : '' }}>Shipper</option>
                    </select>
                    <a href="{{ route('admin.add_staff') }}" class="btn btn-primary">Thêm nhân viên</a>
                </div>
                <!-- <form action="" class="mb-4"> -->
                <div class="row g-2 align-items-center">
                    <div class="col-9 col-sm-11">
                        <input type="text" name="keyword" placeholder="Tìm kiếm nhân viên..." class="form-control"
                            value="{{ request('keyword') }}" />
                    </div>
                    <div class="col-3 col-sm-1 text-center">
                        <button class="btn btn-primary w-100"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
    </form> <br>
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

                @if ($staffs->isEmpty())
                    <tr>
                        <td colspan="5" style="color:red; font-size:20px; text-align: center;">Không có nhân viên</td>
                    </tr>
                @else
                            @php
                                // Sắp xếp Admin trước
                                $sortedStaffs = $staffs->sortBy(function ($staff) {
                                    return $staff->role == '0' ? 0 : 1; // Admin có role = 0 sẽ đứng đầu
                                });
                            @endphp

                            @foreach ($sortedStaffs as $staff)
                                @if ($staff->role == '0' || $staff->role == '2')
                                    @php
                                        $role = $staff->role == '0' ? 'Admin' : 'Shipper';
                                        $style = $staff->role == '0' ? 'font-weight: bold; color: red;' : 'font-weight: bold; color: green;';
                                        $status = $staff->status == '0' ? 'Offline' : 'Online';
                                        $statusColor = $staff->status == '0' ? 'color: gray;' : 'color: blue;';
                                        $activity = $staff->work == '0' ? 'Đang rảnh' : 'Đang có đơn';
                                        $activityColor = $staff->work == '0' ? 'color: green;' : 'color: red;';
                                    @endphp

                                    <tr>
                                        <td style="{{ $style }}">{{ $staff->name }}</td>
                                        <td style="{{ $style }}">{{ $role }}</td>
                                        <td style="{{ $statusColor }}">{{ $status }}</td>
                                        <td style="{{ $activityColor }}">{{ $activity }}</td>
                                        <td>
                                            <a href="{{ route('admin.staff.detail', ['id' => $staff->id]) }}" class="btn btn-sm btn-primary">Xem
                                                chi tiết</a>
                                            <a href="{{ route('admin.staff.delete', ['id' => $staff->id]) }}"
                                                class="btn btn-sm btn-danger">Xóa</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                @endif



            </tbody>
        </table>
    </div>
    </div>
    </div>
    <!-- Table End -->

@endsection