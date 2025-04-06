@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Nhân viên')
@section('content')
<!-- Table Start -->
<form action="{{ route('admin.staff') }}" method="GET" class="mb-4 d-flex justify-content-between align-items-center">
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded p-4">
            <div class="d-flex align-items-center justify-content-between mb-4 w-100">
                <h4 class="mb-0">Danh sách nhân viên</h4>
                <div class="d-flex align-items-center">
                    <select name="role" onchange="this.form.submit()" class="form-select me-3" style="width: 200px;">
                        <option value="">Tất cả</option>
                        <option value="0" {{ request('role') == '0' ? 'selected' : '' }}>Admin</option>
                        <option value="2" {{ request('role') == '2' ? 'selected' : '' }}>Shipper</option>
                    </select>
                    <a href="{{ route('admin.staff.add_staff') }}" class="btn btn-primary">Thêm nhân viên</a>
                </div>
            </div>
            <div class="row g-2 align-items-center w-100">
                <div class="col-9 col-sm-11">
                    <input type="text" name="keyword" placeholder="Tìm kiếm nhân viên..." class="form-control"
                        value="{{ request('keyword') }}" />
                </div>
                <div class="col-3 col-sm-1 text-center">
                    <button class="btn btn-primary w-100"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
</form>

<div class="table-responsive">
    <table class="table text-start align-middle table-bordered table-hover mb-0">
        <thead>
            <tr class="text-dark">
                <th scope="col">Họ Tên</th>
                <th scope="col">Vai Trò</th>
                <th scope="col">Trạng Thái</th>
                <th scope="col">Hoạt động</th>
                <th scope="col">Hành Động</th>
            </tr>
        </thead>
        <tbody>
            @if ($staffs->isEmpty())
            <tr>
                <td colspan="5" style="color:red; font-size:20px; text-align: center;">Không có nhân viên</td>
            </tr>
            @else
            @php
            $sortedStaffs = $staffs->sortBy(fn($staff) => $staff->role == '0' ? 0 : 1);
            @endphp

            @foreach ($sortedStaffs as $staff)
            @php
            $role = $staff->role == '0' ? 'Admin' : 'Shipper';
            $style = $staff->role == '0' ? 'font-weight: bold; color: red;' : 'font-weight: bold; color: green;';
            $status = $staff->status == '0' ? 'Offline' : 'Online';
            $statusColor = $staff->status == '0' ? 'color: gray;' : 'color: blue;';

            if($staff->work === 0) {
            $work = 'Đang rảnh';
            $workColor = 'color: green;';
            }elseif($staff->work === 1) {
            $work = 'Có đơn';
            $workColor = 'color: red;';
            }elseif($staff->work === 2) {
            $work = 'Offline';
            $workColor = 'color: gray;';
            }
            @endphp

            <tr data-staff-id="{{ $staff->id }}">
                <td style="{{ $style }}">{{ $staff->name }}</td>
                <td style="{{ $style }}">{{ $role }}</td>
                <td class="status-cell" style="{{ $statusColor }}" data-initial-status="{{ $staff->status }}">
                    {{ $status }}</td>
                <td class="work-cell" style="{{ $workColor }}" data-initial-work="{{ $staff->work }}">{{ $work }}</td>
                <td>
                    <a href="{{ route('admin.staff.detail', ['id' => $staff->id]) }}" class="btn btn-sm btn-primary">Xem
                        chi tiết</a>
                    <a href="{{ route('admin.staff.delete', ['id' => $staff->id]) }}"
                        class="btn btn-sm btn-danger">Xóa</a>
                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>
</div>
</div>
</div>
<!-- Table End -->

<!-- JavaScript để cập nhật trạng thái liên tục -->
<script>
function updateStaffStatus() {
    document.querySelectorAll('tr[data-staff-id]').forEach(row => {
        const staffId = row.getAttribute('data-staff-id');
        const statusCell = row.querySelector('.status-cell');
        const workCell = row.querySelector('.work-cell');

        fetch("{{ route('admin.staff.status', '') }}/" + staffId)
            .then(response => response.json())
            .then(data => {
                // Cập nhật trạng thái (status)
                const statusText = data.status === 1 ? 'Online' : 'Offline';
                const statusColor = data.status === 1 ? 'color: blue;' : 'color: gray;';
                statusCell.innerText = statusText;
                statusCell.style = statusColor;

                // Cập nhật hoạt động (work)
                const workStatusMap = {
                    0: {
                        text: 'Đang rảnh',
                        color: 'color: green;'
                    },
                    1: {
                        text: 'Có đơn',
                        color: 'color: red;'
                    },
                    2: {
                        text: 'Offline',
                        color: 'color: gray;'
                    },
                };

                const workData = workStatusMap[data.work] || {
                    text: 'Không xác định',
                    color: 'color: black;'
                };
                workCell.innerText = workData.text;
                workCell.style = workData.color;
            })
            .catch(error => {
                console.error('Lỗi khi cập nhật trạng thái cho staff ID ' + staffId, error);
            });
    });
}

// Cập nhật ngay khi tải trang
updateStaffStatus();

// Cập nhật mỗi 5 giây
setInterval(updateStaffStatus, 5000);
</script>
@endsection
