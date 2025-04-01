@extends('admin.layouts.app')
@section('content')
@vite(['resources/css/shop.css'])
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Thêm cửa hàng</h6>
            <form action="" method="POST">
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Tên cửa hàng:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" placeholder="Nhập tên cửa hàng">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Ảnh:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="file">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Ghi chú:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" placeholder="Nhập ghi chú">
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Giờ mở cửa:</label>
                    <div class="col-sm-9 col-form-label">
                        <div class="d-flex align-items-center">
                            <input type="number" class="form-control" min="0" max="23"
                                style="width: 60px;"><span class="me-2">h</span>
                            <span class="me-2">-</span>
                            <input type="number" class="form-control" min="0" max="23"
                                style="width: 60px;"><span>h</span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Địa chỉ:</label>
                    <div class="col-sm-9 col-form-label">
                        <input type="text" class="form-control" placeholder="Nhập link địa chỉ cửa hàng" required >
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Trạng thái:</label>
                    <div class="col-sm-9">
                        <select class="form-select">
                            <option value="">Ẩn</option>
                            <option value="">Hiện</option>
                        </select>
</div>
                </div>
                <a href="shop.html" class="btn btn-danger">Quay lại</a>
                <button class="btn btn-primary">Thêm cửa hàng</button>
            </form>
        </div>
    </div>
    <!-- Table End -->

@endsection
