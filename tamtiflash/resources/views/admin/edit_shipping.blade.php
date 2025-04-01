@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Chỉnh sửa phí mặc định')
@section('content')
    <!-- Form Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Chỉnh sửa phí mặc định</h6>
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('admin.update_shipping') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $shippingFee->id }}">

                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Khoảng cách tối thiểu (km):</label>
                    <div class="col-sm-9">
                        <input type="number" name="min_distance" class="form-control w-25"
                               value="{{ old('min_distance', $shippingFee->min_distance) }}" step="0.01" required />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Khoảng cách tối đa (km):</label>
                    <div class="col-sm-9">
                        <input type="number" name="max_distance" class="form-control w-25"
                               value="{{ old('max_distance', $shippingFee->max_distance) }}" step="0.01" required />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Phí cơ bản (VNĐ):</label>
                    <div class="col-sm-9">
                        <input type="number" name="base_price" class="form-control w-25"
                               value="{{ old('base_price', $shippingFee->base_price) }}" step="0.01" required />
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="fw-bold col-sm-3 col-form-label">Phụ phí (VNĐ/km):</label>
                    <div class="col-sm-9">
                        <input type="number" name="extra_price_per_km" class="form-control w-25"
                               value="{{ old('extra_price_per_km', $shippingFee->extra_price_per_km) }}" step="0.01" required />
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.shipping_fee') }}" class="btn btn-danger me-2">Quay lại</a>
                    <button type="submit" class="btn btn-primary">Lưu</button>
                </div>
            </form>
        </div>
    </div>
    <!-- Form End -->
@endsection
