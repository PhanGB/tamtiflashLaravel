@extends('admin.layouts.app')
@section('content')
{{-- <link rel="stylesheet" href="/resources/css/shop.css"> --}}
@vite(['resources/css/shop.css'])
<div class="container-fluid pt-4 px-4">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Thêm cửa hàng</h6>
                    <form action="/tamtiflash/admin/addShop/" method="POST">
                        <div class="row mb-3">
                            <label class="fw-bold col-sm-3 col-form-label">Tên cửa hàng:</label>
                            <div class="col-sm-9 col-form-label">
                                <input type="text" class="input_form" placeholder="Nhập tên cửa hàng" name="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="fw-bold col-sm-3 col-form-label">Đánh giá:</label>
                            <div class="col-sm-9 col-form-label" name="image">
                                <input type="text" class="input_form" placeholder="Nhập đánh giá" name="rate">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="fw-bold col-sm-3 col-form-label">Mô tả ngắn:</label>
                            <div class="col-sm-9 col-form-label">
                                <input type="text" class="input_form" placeholder="Nhập mô tả" name="short_description" >
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="fw-bold col-sm-3 col-form-label">Giờ mở cửa:</label>
                            <div class="col-sm-9 col-form-label">
                                <div class="d-flex align-items-center">
                                    <input type="number" class="form-control" min="0" max="23"
                                        style="width: 60px;" name="open_time"><span class="me-2">h</span>
                                    <span class="me-2">-</span>
                                    <input type="number" class="form-control" min="0" max="23"
                                        style="width: 60px;" name="close_time"><span>h</span>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="fw-bold col-sm-3 col-form-label">Trạng thái:</label>
                            <div class="col-sm-9">
                                <select class="form-select" name="status">
                                    <option value="1">Ẩn</option>
                                    <option value="0">Hiện</option>
                                </select>
                            </div>
                        </div>
                        <a href="" class="btn btn-danger">Quay lại</a>
                        <button class="btn btn-primary">Thêm cửa hàng</button>
                    </form>
                </div>
            </div>
@endsection
