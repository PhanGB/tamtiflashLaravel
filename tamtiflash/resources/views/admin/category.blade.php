@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Danh mục')
@section('category', 'active')

@section('content')
    <!-- Table Start -->

    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="mb-0">Danh mục</h6>
                <a class="btn btn-primary rounded-pill" href="{{ route('admin.category_add') }}">Thêm danh mục</a>
            </div>

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

            <!-- Search Form -->
            <form action="{{ route('admin.category_search') }}" method="get" class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-9 col-sm-11">
                        <input type="text" name="search" placeholder="Tìm kiếm danh mục..." class="form-control" />
                    </div>
                    <div class="col-3 col-sm-1 text-center">
                        <button class="btn btn-primary w-100"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>

            <!-- Sorting and Category Filter -->
            <div style="display: flex; justify-content: space-between;">
                <form action=" {{ route('admin.category_sort') }} " method="get">
                    <label for="" style="margin-left: 650px; font-size: 20px;"></label>
                    <select id="categorySelect" onchange="this.form.submit()" class="form-select w-25" style="float: left;">
                        <option>-- Chọn danh mục --</option>
                        <option value="">Tất cả danh mục</option>
                    </select>
                </form>
            </div>

            <!-- Table -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Số sản phẩm</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categoryList as $index => $cate)
                            <tr>
                                <th scope="row">{{ $index + 1 }}</th>
                                <td>{{ $cate->name }}</td>
                                <td><img src="{{ asset('images/categories/' . $cate->image) }}" width="200px"></td>
                                <td><span class="badge {{ $cate->status_class }}"> {{ $cate->status_text }}</span></td>
                                <td>{{ count($cate->products) }}</td>
                                <td><a href="{{ route('admin.category_edit', ['id' => $cate->id]) }}">Sửa</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- Table End -->

@endsection
