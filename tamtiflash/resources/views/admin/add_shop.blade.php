@extends('admin.layouts.app')
@section('content')
    {{--
    <link rel="stylesheet" href="/resources/css/shop.css"> --}}
    @vite(['resources/css/shop.css'])
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Thêm cửa hàng</h6>
            <form action="{{ route('admin.add') }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Tên cửa hàng:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" placeholder="Nhập tên cửa hàng" name="name" required>
                    </div>
                </div>
                {{-- <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Ảnh:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="file" name="image">
                    </div>
                </div> --}}
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Đánh giá:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" placeholder="Nhập đánh giá" name="rate" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Mô tả ngắn:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" placeholder="Nhập mô tả ngắn" name="short_description"
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Giờ mở cửa:</label>
                    <div class="col-sm-9 col-form-label">
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control me-2" min="0" max="23" style="width: 80px;"
                                name="time_open" placeholder="0h00" required>
                            <span class="me-2"> - </span>
                            <input type="text" class="form-control" min="0" max="23" style="width: 80px;" name="time_close"
                                placeholder="23h00" required>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Địa chỉ:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" placeholder="Nhập link địa chỉ cửa hàng (được lấy từ Google maps)" name="address"
                            required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Trạng thái:</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="status" required>
                            <option value="" disabled selected>Chọn trạng thái</option>
                            <option value="1">Hiện</option>
                            <option value="0">Ẩn</option>
                        </select>
                    </div>
                </div>
                <a href="{{ route('admin.shops') }}" class="btn btn-danger">Quay lại</a>
                <button class="btn btn-primary">Thêm cửa hàng</button>
            </form>
        </div>
    </div>
    <!-- Table End -->
@endsection