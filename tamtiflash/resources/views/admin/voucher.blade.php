@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Quản lý Voucher')
@section ('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <div class="d-flex justify-content-between mb-4">
                <h6 class="mb-0">Quản lý Voucher</h6>
                <a href="admin.voucher.add-voucher" class="btn btn-primary">Thêm Voucher</a>
            </div>
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
                                                } else {
                                                    $class = 'text-danger';
                                                    $status = 'Ngừng hoạt động';
                                                }
                                            @endphp

                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $voucher->name }}</td>
                                                <td>{{ $voucher->code }}</td>
                                                <td>{{ $voucher->value }}%</td>
                                                <td>{{ \Carbon\Carbon::parse($voucher->end_date)->format('d/m/Y') }}</td>
                                                <td class="{{ $class }}">{{ $status }}</td>
                                                <td>
                                                    <a href="admin.voucher.edit{{ $voucher->id }}" class="btn btn-sm btn-warning">Sửa</a>
                                                    <form action="admin.voucher.destroy{{ $voucher->id }}" method="POST"
                                                        style="display:inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                                                    </form>
                                                </td>
                                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Table End -->

@endsection