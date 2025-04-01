@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Chỉnh sửa phương thức chuyển khoản')
@section('content')
    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Chỉnh sửa phương thức chuyển khoản</h6>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('admin.update_payment') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- Tên ngân hàng -->
                <div class="row mb-3">
                    <label for="bankName" class="fw-bold col-sm-3 col-form-label">Tên ngân hàng:</label>
                    <div class="col-sm-9">
                        <input type="text" id="bankName" name="bankName" class="form-control"
                               value="{{ old('bankName', $banking->name_bank ?? '') }}" required>
                        @error('bankName')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Số tài khoản -->
                <div class="row mb-3">
                    <label for="accountNumber" class="fw-bold col-sm-3 col-form-label">Số tài khoản:</label>
                    <div class="col-sm-9">
                        <input type="text" id="accountNumber" name="accountNumber" class="form-control"
                               value="{{ old('accountNumber', $banking->acc_number ?? '') }}" required>
                        @error('accountNumber')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Tên chủ tài khoản -->
                <div class="row mb-3">
                    <label for="accountHolder" class="fw-bold col-sm-3 col-form-label">Tên chủ tài khoản:</label>
                    <div class="col-sm-9">
                        <input type="text" id="accountHolder" name="accountHolder" class="form-control"
                               value="{{ old('accountHolder', $banking->name ?? '') }}" required>
                        @error('accountHolder')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Ảnh QR Code -->
                <div class="row mb-3">
                    <label for="qrCode" class="fw-bold col-sm-3 col-form-label">Hình ảnh QR Code:</label>
                    <div class="col-sm-9">
                        <input type="file" id="qrCode" name="qrCode" class="form-control" accept="image/*">
                        @error('qrCode')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <!-- Hiển thị ảnh QR Code nếu đã có -->
                        @if($banking && $banking->qr_img)
                            <div class="mt-2">
                                <img src="{{ asset('images/bank/'.$banking->qr_img) }}" alt="QR Code"
                                     style="max-width: 300px;" class="border rounded">
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Nút -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.payment_method') }}" class="btn btn-danger me-2">
                        <i class="fas fa-arrow-left"></i> Quay lại
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Lưu
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Table End -->
@endsection
