<!-- Table Start -->
<div class="container-fluid py-4 px-4">
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card border-0 shadow">
                <div class="card-header bg-light">
                    <h4 class="mb-0">Thêm Voucher</h4>
                </div>
                <div class="card-body">
                    <form action="add_voucher.html" method="POST">
                        <div class="mb-3">
                            <label for="code" class="form-label">Mã Voucher</label>
                            <input type="text" class="form-control" id="code" name="code" value="ABC-123" />
                        </div>
                        <div class="mb-3">
                            <label for="discount" class="form-label">Giá trị (số % giảm)</label>
                            <input type="text" class="form-control" id="discount" name="discount" value="10%" />
                        </div>
                        <div class="mb-3">
                            <label for="discount" class="form-label">Số tiền được giảm tối đa</label>
                            <input type="text" class="form-control" id="discount" name="discount" value="100k" />
                        </div>
                        <div class="mb-3">
                            <label for="start" class="form-label">Ngày bắt đầu</label>
                            <div class="input-group date" id="start" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#start"
                                    name="start" value="03/14/2025 6:24 PM" />
                                <div class="input-group-text" data-target="#start" data-toggle="datetimepicker">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="end" class="form-label">Ngày kết thúc</label>
                            <div class="input-group date" id="end" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" data-target="#end"
                                    name="end" value="03/14/2025 6:24 PM" />
                                <div class="input-group-text" data-target="#end" data-toggle="datetimepicker">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="quantity" class="form-label">Số lượng</label>
                            <input type="text" class="form-control" id="quantity" name="quantity" value="10" />
                        </div>
                        <div class="mb-3">
                            <label for="end" class="form-label">Ngày tạo voucher</label>
                            <div class="input-group date" id="end" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" readonly data-target="#end"
                                    name="end" value="03/14/2025 6:24 PM" />
                                <div class="input-group-text" data-target="#end" data-toggle="datetimepicker">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="end" class="form-label">Ngày sửa đổi gần nhất</label>
                            <div class="input-group date" id="end" data-target-input="nearest">
                                <input type="text" class="form-control datetimepicker-input" readonly data-target="#end"
                                    name="end" value="03/14/2025 6:24 PM" />
                                <div class="input-group-text" data-target="#end" data-toggle="datetimepicker">
                                    <i class="fa fa-calendar"></i>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Trạng thái</label>
                            <select class="form-select" id="status" name="status">
                                <option value="1">Kích hoạt</option>
                                <option value="0">Không kích hoạt</option>
                            </select>
                        </div>
                        <a href="voucher.html" class="btn btn-danger">Quay lại</a>
                        <button type="submit" class="btn btn-primary">Lưu Voucher</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Table End -->