@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Sản phẩm')
@section('products', 'active')

@section('content')

    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Sản phẩm</h6>

            <!-- Hiển thị thông báo thành công hoặc lỗi -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Form tìm kiếm sản phẩm -->
            <form action="{{ route('admin.product_search') }}" class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-9 col-sm-11">
                        <input type="text" name="search" placeholder="Tìm kiếm sản phẩm" class="form-control" />
                    </div>
                    <div class="col-3 col-sm-1 text-center">
                        <button class="btn btn-primary w-100"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>

            <!-- Nút thêm sản phẩm và dropdown lọc theo cửa hàng -->
            <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                <a class="btn btn-primary rounded-pill m-2" href="{{ route('admin.product_add') }}">Thêm sản phẩm</a>
                <form action="{{ route('admin.product_sort') }}" method="get">
                    <label for="shop" style="font-size: 20px; margin-right: 10px;">Quán:</label>
                    <select name="shop" onchange="this.form.submit()" id="shop" class="form-select w-25" style="display: inline-block;">
                        <option value="">-- Chọn cửa hàng --</option>
                        <option value="">Tất cả sản phẩm</option>
                        @if(isset($shop) && $shop->isNotEmpty())
                            @foreach($shop as $item)
                                <option value="{{ $item->id }}" {{ request()->get('shop') == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}
                                </option>
                            @endforeach
                        @else
                            <option value="">Không có cửa hàng</option>
                        @endif
                    </select>
                </form>
            </div>

            <!-- Bảng hiển thị danh sách sản phẩm -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Số biến thể</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Giá sản phẩm</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Tên cửa hàng</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Đã bán được</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($productList as $index => $pro)
                            <tr>
                                <th scope="row">{{ $productList->firstItem() + $index }}</th>
                                <td><a href="{{ route('admin.product_variant', $pro->id) }}">{{ count($pro->variants) }} Biến thể</a></td>
                                <td>{{ $pro->name }}</td>
                                <td><img src="{{ asset('images/products/' . $pro->image) }}" width="100px" height="100px" alt="{{ $pro->name }}"></td>
                                <td>{{ number_format($pro->price) }}đ</td>
                                <td>{{ $pro->category->name }}</td>
                                <td>{{ $pro->shop->name }}</td>
                                <td><span class="badge {{ $pro->status_class }}">{{ $pro->status_text }}</span></td>
                                <td>{{ $pro->sold }}</td>
                                <td>
                                    <a href="{{ route('admin.product_edit', $pro->id) }}" class="btn btn-primary" style="margin-bottom:10px;">Sửa</a>
                                    <form action="{{ route('admin.deletePro', $pro->id) }}" method="post" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="font-size: 16px;" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')">Xoá</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $productList->links() }}
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->

@endsection
