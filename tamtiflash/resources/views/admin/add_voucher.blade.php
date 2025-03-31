@extends('admin.layouts.app')
@section('title', 'Tamtiflash - Admin - Thêm Voucher')
@section('content')

    <!-- Table Start -->
    <div class="container-fluid py-4 px-4">
        <style>
            #view-success {
                display: none;
                background-color: #d4edda;
                color: #155724;
                border: 1px solid #c3e6cb;
                border-radius: 5px;
                padding: 10px;
                text-align: center;
                font-size: 20px;
            }
        </style>
        <!-- <p id="view-success">Thêm voucher thành công!</p> -->

        @if(session('success'))
            <div id="view-success" class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div id="view-error" class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif


        <div class="row">
            <div>
                <div class="card border-0 shadow">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">Thêm Voucher</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.voucher.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name_voucher" class="form-label">Tên Voucher</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    id="name_voucher" name="name" value="{{ old('name') }}" required />
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="code" class="form-label">Mã Voucher</label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror" id="code"
                                    name="code" value="{{ old('code') }}" required />
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="discount" class="form-label">Giá trị (số % giảm)</label>
                                <input type="number" class="form-control @error('discount') is-invalid @enderror"
                                    id="discount" name="discount" value="{{ old('discount') }}" required />
                                @error('discount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="max_discount" class="form-label">Số tiền được giảm tối đa (không nhập phần thập
                                    phân)</label>
                                <input type="number" class="form-control @error('max_discount') is-invalid @enderror"
                                    id="max_discount" name="max_discount" placeholder="vd: 100.000 -> nhập: 100"
                                    value="{{ old('max_discount') }}" required />
                                @error('max_discount')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="start" class="form-label">Ngày bắt đầu (tháng - ngày - năm)</label>
                                <div class="input-group date" id="start_date" data-target-input="nearest">
                                    <input type="date"
                                        class="form-control datetimepicker-input @error('start') is-invalid @enderror"
                                        data-target="#start_date" name="start" value="{{ old('start') }}" required />
                                    <div class="input-group-text" data-target="#start_date" data-toggle="datetimepicker">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    @error('start')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="end" class="form-label">Ngày kết thúc (tháng - ngày - năm)</label>
                                <div class="input-group date" id="end_date" data-target-input="nearest">
                                    <input type="date"
                                        class="form-control datetimepicker-input @error('end') is-invalid @enderror"
                                        data-target="#end_date" name="end" value="{{ old('end') }}" required />
                                    <div class="input-group-text" data-target="#end_date" data-toggle="datetimepicker">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    @error('end')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Số lượng</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror"
                                    id="quantity" name="quantity" value="{{ old('quantity') }}" required />
                                @error('quantity')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="created_at" class="form-label">Ngày tạo voucher</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" readonly
                                        value="{{ now()->format('Y-m-d H:i:s') }}" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="updated_at" class="form-label">Ngày sửa đổi gần nhất</label>
                                <div class="input-group date">
                                    <input type="text" class="form-control" readonly
                                        value="{{ now()->format('Y-m-d H:i:s') }}" />
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="status" class="form-label">Trạng thái</label>
                                <select class="form-select @error('status') is-invalid @enderror" id="status" name="status">
                                    <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Kích hoạt</option>
                                    <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Không kích hoạt</option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <a href="/admin/voucher" class="btn btn-danger">Quay lại</a>
                            <a href="" class="btn btn-danger">Reset form</a>
                            <!-- <input type="submit" name="submit" value="Thêm Voucher" class="btn btn-primary" /> -->
                            <button name="submit" class="btn btn-primary" onclick="success()">Thêm voucher</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.querySelector('form').addEventListener('submit', function (event) {
            event.preventDefault(); // Ngăn form reload

            var form = this;
            var formData = new FormData(form);
            var submitButton = form.querySelector('button[name="submit"]');

            // Vô hiệu hóa nút submit để tránh bấm nhiều lần
            submitButton.disabled = true;
            submitButton.innerText = "Đang xử lý...";

            fetch(form.action, {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
                }
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Hiển thị thông báo thành công
                        var successMessage = document.getElementById('view-success');
                        successMessage.innerText = data.message;
                        successMessage.style.display = 'block';

                        // Ẩn sau 3 giây
                        setTimeout(() => {
                            successMessage.style.display = 'none';
                        }, 3000);

                        // Reset form
                        form.reset();
                    } else if (data.errors) {
                        // Xóa thông báo lỗi cũ
                        document.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
                        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

                        // Hiển thị lỗi từ server
                        for (const field in data.errors) {
                            let input = document.querySelector(`[name="${field}"]`);
                            if (input) {
                                input.classList.add('is-invalid');
                                let errorDiv = document.createElement('div');
                                errorDiv.className = 'invalid-feedback';
                                errorDiv.innerText = data.errors[field][0];
                                input.parentNode.appendChild(errorDiv);
                            }
                        }
                    }
                })
                .catch(error => {
                    console.error('Lỗi:', error);
                    alert("Thêm thành công!");
                })
                .finally(() => {
                    // Kích hoạt lại nút submit
                    submitButton.disabled = false;
                    submitButton.innerText = "Thêm voucher";
                });
        });
    </script>



    <!-- Table End -->

@endsection