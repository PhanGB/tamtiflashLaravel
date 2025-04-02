@extends('admin.layouts.app')
@section('content')
    @vite(['resources/css/shop.css'])
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Sửa cửa hàng</h6>
            <form action="{{ route('admin.edit', ['id' => $shop->id]) }}" method="POST">
                @csrf
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Tên cửa hàng:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên cửa hàng"
                            value="{{ $shop->name }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Ảnh:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="file" name="image" value="{{ $shop->image }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Đánh giá:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" placeholder="Nhập đánh giá" name="rate"
                            value="{{ $shop->rate }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Mô tả ngắn:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" placeholder="Nhập mô tả ngắn" name="short_description"
                            value="{{ $shop->short_description }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Giờ mở cửa:</label>
                    <div class="col-sm-9 col-form-label">
                        <div class="d-flex align-items-center">
                            <input type="text" class="form-control me-2" min="0" max="23" style="width: 80px;"
                                name="time_open" value="{{ $shop->time_open }}">
                            <span class="me-2">-</span>
                            <input type="text" class="form-control" min="0" max="23" style="width: 80px;" name="time_close"
                                value="{{ $shop->time_close }}">
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Địa chỉ:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" name="address" placeholder="Nhập link địa chỉ cửa hàng"
                            value="{{ $shop->address_link }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Trạng thái:</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="status">
                            <option value="" disabled {{ is_null($shop->status) ? 'selected' : '' }}>Chọn trạng thái</option>
                            <option value="0" {{ $shop->status == 0 ? 'selected' : '' }}>Ẩn</option>
                            <option value="1" {{ $shop->status == 1 ? 'selected' : '' }}>Hiện</option>
                        </select>
                    </div>
                </div>
                <a href="{{ route('admin.shops') }}" class="btn btn-danger">Quay lại</a>
                <button class="btn btn-primary">Cập nhật cửa hàng</button>
            </form>
        </div>
    </div>
    <!-- Table End -->

@endsection
