@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Quản lý Voucher')
@section ('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <form action="{{ route('admin.voucher') }}" method="GET">
                <div class="d-flex justify-content-between mb-4">
                    <h6 class="mb-0">Quản lý Voucher</h6>
                    <select name="filter" class="form-select form-select-sm" style="width: 200px;"
                        onchange="this.form.submit()">
                        <option value="3" {{ $filter == 3 ? 'selected' : '' }}>Tất cả</option>
                        <option value="1" {{ $filter == 1 ? 'selected' : '' }}>Đang hoạt động</option>
                        <option value="0" {{ $filter == 0 ? 'selected' : '' }}>Ngừng hoạt động</option>
                        <option value="2" {{ $filter == 2 ? 'selected' : '' }}>Đã xoá</option>
                    </select>
                    <a href="{{ route('admin.voucher.create') }}" class="btn btn-primary">Thêm Voucher</a>
                </div>
            </form>
            <form action="" class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-9 col-sm-11">
                        <input type="text" placeholder="Tìm kiếm voucher..." class="form-control" />
                    </div>
                    <div class="col-3 col-sm-1 text-center">
                        <button class="btn btn-primary w-100"><i class="fa-solid fa-magnifying-glass"></i></button>
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
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Hành Động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if($vouchers->isEmpty())
                            <tr>
                                <td colspan="6" class="text-center">Không có voucher nào</td>
                            </tr>
                        @endif
                        @foreach ($vouchers as $voucher)
                                            @php
                                                if ($voucher->status == 1) {
                                                    $class = 'text-success';
                                                    $status = 'Đang hoạt động';
                                                } elseif ($voucher->status == 0) {
                                                    $class = 'text-danger';
                                                    $status = 'Ngừng hoạt động';
                                                } elseif ($voucher->status == 2) {
                                                    $class = 'text-secondary';
                                                    $status = 'Đã xoá';
                                                }
                                            @endphp

                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $voucher->name }}</td>
                                                <td>{{ $voucher->code }}</td>
                                                <td>{{ $voucher->value }}%</td>
                                                <td>{{ \Carbon\Carbon::parse($voucher->end_date)->format('d/m/Y') }}</td>
                                                <td class="{{ $class }}">{{ $status }}</td>
                                                @if($voucher->status == 2)
                                                    <td>
                                                        <a href="{{ route('admin.voucher.restore', $voucher->id) }}"
                                                            class="btn btn-success btn-sm">Khôi phục</a>
                                                        <form action="{{ route('admin.voucher.destroy', $voucher->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xoá</button>
                                                        </form>
                                                    </td>
                                                @else
                                                    <td>
                                                        <a href="admin.voucher.edit/"
                                                            class="btn btn-warning btn-sm">Sửa</a>
                                                        <form action="{{ route('admin.voucher.destroy', $voucher->id) }}"
                                                            method="POST" class="d-inline">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">Xoá</button>
                                                        </form>
                                                    </td>
                                                @endif
                                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Table End -->

@endsection