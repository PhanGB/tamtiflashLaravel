@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Cửa hàng')
@section ('content')
    <!-- Navbar End -->

    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <div class="row g-2 align-items-center mb-4">
                <div class="col-8 col-sm-10">
                    <h3 class="mb-4">Cửa hàng</h3>
                </div>
                <div class="col-4 col-sm-2 text-center">
                    <a href="{{ route('admin.add_shop') }}" type="button" class="btn btn-primary w-100 mb-4">Thêm cửa hàng</a>
                </div>
            </div>
            <form action="{{ route('admin.shops') }}" class="mb-4" method="GET">
                <div class="row g-2 align-items-center">
                    <div class="col-9 col-sm-11">
                        <input type="text" name="search" placeholder="Tìm kiếm cửa hàng..." class="form-control" value="{{ request()->get('search') }}" />
                    </div>
                    <div class="col-3 col-sm-1 text-center">
                        <button class="btn btn-primary w-100"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>
            <div class="table-responsive">
                <table class="table text-center align-middle">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Ảnh</th>
                            <th>Tên cửa hàng</th>
                            <th>Ghi chú</th>
                            <th>Đánh giá</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($shops as $shop)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset('images/shops/'.$shop->image) }}" alt="{{ $shop->image }}" style="width: 40px; height: 40px" /></td>
                            <td>{{ $shop->name }}</td>
                            <td>{{ $shop->short_description }}</td>
                            <td>{{ $shop->rate }} <i class="fas fa-star text-warning"></i></td>
                            <td>
                                <span value="1" >{{ $shop->status == 0 ? 'Ẩn' : 'Hiển' }}</span>
                            </td>
                            <td>
                                <a href="{{ route('admin.edit_shop', $shop->id) }}">Sửa</a>

                                <!-- Form xóa -->
                                <form action="{{ route('admin.delete', $shop->id) }}" method="Get" style="display:inline;" id="deleteForm{{ $shop->id }}">
                                    @csrf
                                    @method('DELETE')
                                    <a href="#" onclick="confirmDelete({{ $shop->id }}); return false;">Xóa</a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        function confirmDelete(shopId) {
            // Sử dụng SweetAlert để có giao diện đẹp mắt hơn
            Swal.fire({
                title: 'Bạn có chắc chắn muốn xóa cửa hàng này?',
                text: "Cửa hàng này sẽ bị xóa vĩnh viễn!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Xóa',
                cancelButtonText: 'Hủy'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Nếu người dùng xác nhận, submit form tương ứng
                    document.getElementById('deleteForm' + shopId).submit();
                }
            });
        }
    </script>

    <!-- Thêm SweetAlert2 từ CDN -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@endsection
