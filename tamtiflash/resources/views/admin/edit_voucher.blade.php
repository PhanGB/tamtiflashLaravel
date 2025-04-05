@extends('admin.layouts.app')
@section('title', 'Tamtiflash - Admin - Sửa Voucher')
@section('content')

    <!-- Table Start -->
    <!-- Thêm jQuery và Datepicker -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

        <div class="container-fluid py-4 px-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="card border-0 shadow">
                    <div class="card-header bg-light">
                        <h4 class="mb-0">Sửa Voucher</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.voucher.update', $voucher->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="id" value="{{ $voucher->id }}">
                            <div class="mb-3">
                                <label for="name" class="form-label">Tên Voucher</label>
                                <input type="text" class="form-control" id="name" name="name" value="{{ $voucher->name }}"
                                    required />
                            </div>

                            <div class="mb-3">
                                <label for="code" class="form-label">Mã Voucher</label>
                                <input type="text" class="form-control" id="code" name="code" value="{{ $voucher->code }}"
                                    required />
                            </div>

                            <div class="mb-3">
                                <label for="value" class="form-label">Giá trị (số % giảm)</label>
                                <input type="number" class="form-control" id="value" name="value"
                                    value="{{ $voucher->value }}" required />
                            </div>

                            <div class="mb-3">
                                <label for="max_value" class="form-label">Số tiền được giảm tối đa (VND)</label>
                                <input type="number" class="form-control" id="max_value" name="max_value"
                                    value="{{ $voucher->max_value }}" required />
                            </div>

                            <div class="mb-3">
                                <label for="start_date" class="form-label">Ngày bắt đầu (định dạng tháng/ngày/năm)<br/> <span style="color: red;">*Lưu ý ngày bắt đầu phải lớn hơn hoặc bằng ngày hôm nay</span></label>
                                <input type="date" class="form-control" id="start_date" name="start_date"
                                    value="{{ $voucher->start_date }}" required />
                            </div>

                            <div class="mb-3">
                                <label for="end_date" class="form-label">Ngày kết thúc (định dạng tháng/ngày/năm)<br/> <span style="color: red;">*Lưu ý ngày kết thúc phải lớn hơn ngày bắt đầu</span></label>
                                <input type="date" class="form-control" id="end_date" name="end_date"
                                    value="{{ $voucher->end_date }}" required />
                            </div>

                            <div class="mb-3">
                                <label for="create" class="form-label">Ngày tạo voucher</label>
                                <input type="text" class="form-control" id="create" name="create"
                                    value="{{ date('d/m/Y', strtotime($voucher->created_at)) }}" readonly />
                            </div>

                            <div class="mb-3">
                                <label for="updated" class="form-label">Ngày sửa đổi</label>
                                <input type="text" class="form-control" id="updated" name="updated"
                                    value="{{ date('d/m/Y', strtotime($voucher->updated_at)) }}" readonly />
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Số lượng</label>
                                <input type="number" class="form-control" id="quantity" name="quantity"
                                    value="{{ $voucher->quantity }}" required />
                            </div>

                            <div class="mb-3">
                                <label for="status" class="form-label">Trạng thái</label>
                                <select class="form-select" id="status" name="status">
                                    <option value="1" {{ $voucher->status == 1 ? 'selected' : '' }}>Kích hoạt</option>
                                    <option value="0" {{ $voucher->status == 0 ? 'selected' : '' }}>Không kích hoạt</option>
                                </select>
                            </div>

                            <a href="{{ route('admin.voucher') }}" class="btn btn-danger">Quay lại</a>
                            <button type="submit" class="btn btn-primary">Lưu Voucher</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Thêm jQuery và Datepicker -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <script>
        $(document).ready(function () {
            $('.date-picker').datepicker({
                format: 'dd/mm/yyyy',
                autoclose: true,
                todayHighlight: true
            });

            // Chuyển đổi định dạng trước khi gửi form
            $('form').submit(function () {
                $('.date-picker').each(function () {
                    let dateParts = $(this).val().split('/');
                    if (dateParts.length === 3) {
                        let formattedDate = dateParts[2] + '-' + dateParts[1] + '-' + dateParts[0]; // Chuyển thành Y-m-d
                        $(this).val(formattedDate);
                    }
                });
            });
        });
    </script>

    <!-- Table End -->
@endsection