@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Theo Dõi Đơn Hàng')
@section ('content')
    <!-- Content Start -->
    <div class="container-fluid">
        <h2 class="mt-4">Theo Dõi Đơn Hàng</h2>

        <!-- Form Quản Lý Đơn Hàng -->
        <div class="container mt-4">
          <div class="card">
            <div class="card-header">
              <h4>Tìm Kiếm & Lọc Đơn Hàng</h4>
            </div>
            <div class="card-body">
              <form>
                <div class="mb-3">
                  <label for="order-id" class="form-label">Mã Đơn Hàng</label>
                  <input
                    type="text"
                    class="form-control"
                    id="order-id"
                    placeholder="Nhập mã đơn hàng"
                    required
                  />
                </div>
                <div class="mb-3">
                  <label for="order-status" class="form-label"
                    >Trạng Thái</label
                  >
                  <select class="form-control" id="order-status">
                    <option value="all">Tất Cả</option>
                    <option value="pending">Chờ Xác Nhận</option>
                    <option value="shipping">Đang Giao</option>
                    <option value="delivered">Đã Giao</option>
                    <option value="cancelled">Đã Hủy</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">
                  Lọc Đơn Hàng
                </button>
              </form>
            </div>
          </div>
        </div>

        <!-- Form Quản Lý Shipper -->
        <div class="container mt-4">
          <div class="card">
            <div class="card-header">
              <h4>Quản Lý Shipper</h4>
            </div>
            <div class="card-body">
              <form>
                <div class="mb-3">
                  <label for="shipper-id" class="form-label"
                    >ID Shipper</label
                  >
                  <input
                    type="text"
                    class="form-control"
                    id="shipper-id"
                    placeholder="Nhập ID shipper"
                    required
                  />
                </div>
                <button type="submit" class="btn btn-success">
                  Tìm Shipper
                </button>
              </form>
            </div>
          </div>
        </div>

        <!-- Form Thống Kê & Báo Cáo -->
        <div class="container mt-4">
          <div class="card">
            <div class="card-header">
              <h4>Thống Kê & Báo Cáo</h4>
            </div>
            <div class="card-body">
              <form>
                <div class="mb-3">
                  <label for="date-range" class="form-label"
                    >Khoảng Thời Gian</label
                  >
                  <input
                    type="date"
                    class="form-control"
                    id="date-range"
                    required
                  />
                </div>
                <button type="submit" class="btn btn-info">
                  Xuất Báo Cáo
                </button>
              </form>
            </div>
          </div>
        </div>

        <!-- Form Hỗ Trợ Khách Hàng -->
        <div class="container mt-4">
          <div class="card">
            <div class="card-header">
              <h4>Hỗ Trợ Khách Hàng</h4>
            </div>
            <div class="card-body">
              <form>
                <div class="mb-3">
                  <label for="customer-feedback" class="form-label"
                    >Nhận Xét & Khiếu Nại</label
                  >
                  <textarea
                    class="form-control"
                    id="customer-feedback"
                    rows="3"
                    placeholder="Nhập phản hồi của khách hàng"
                  ></textarea>
                </div>
                <button type="submit" class="btn btn-warning">
                  Gửi Phản Hồi
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>

@endsection
