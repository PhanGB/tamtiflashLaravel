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
                        <input type="text" class="form-control" name="name" placeholder="Nhập tên cửa hàng" value="{{ $shop->name }}">
                    </div>
                </div>
                {{-- <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Ảnh:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="file">
                    </div>
                </div> --}}
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Đánh giá:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" placeholder="Nhập đánh giá" name="rate" value="{{ $shop->rate }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Mô tả ngắn:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" placeholder="Nhập mô tả ngắn" name="short_description" value="{{ $shop->short_description }}">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Giờ mở cửa:</label>
                    <div class="col-sm-9 col-form-label">
                        <div class="d-flex align-items-center">
                            <input type="number" class="form-control" min="0" max="23"
                                style="width: 60px;" name="time_open" value="{{ $shop->time_open }}"><span class="me-2">h</span>
                            <span class="me-2">-</span>
                            <input type="number" class="form-control" min="0" max="23"
                                style="width: 60px;" name="time_close" value="{{ $shop->time_close }}"><span>h</span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Địa chỉ:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" name="address" placeholder="Nhập link địa chỉ cửa hàng" value="{{ $shop->address }}" >
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Trạng thái:</label>
                    <div class="col-sm-9">
                        <select class="form-select" name="status" value="{{ $shop->status }}">
                            <option value="" disabled selected>Chọn trạng thái</option>
                            <option value="1">Ẩn</option>
                            <option value="0">Hiện</option>
                        </select>
</div>
                </div>
                <a href="shop.html" class="btn btn-danger">Quay lại</a>
                <button class="btn btn-primary">Cập nhật cửa hàng</button>
            </form>
        </div>
    </div>
    <!-- Table End -->

@endsection
