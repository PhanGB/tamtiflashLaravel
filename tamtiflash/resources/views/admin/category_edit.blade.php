@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Danh mục')
@section('category', 'active')

@section('content')
    <div class="container-fluid pt-4 px-4">
        <!-- Table Start -->

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Sửa danh mục</h6>
                <form action="{{ route('admin.editCate', ['id' => $category->id]) }}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <label class="fw-bold col-sm-3 col-form-label" for="">Tên danh mục:</label>
                    <input class="form-control mb-3" type="text" name="name" value="{{ $category->name }}"
                        aria-label="default input example">
                    <label class="fw-bold col-sm-3 col-form-label" for="">Loại danh mục:</label>
                    <select class="form-select mb-3" name="mah" aria-label="Default select example">
                        @if ($category->mah == 0)
                            <option selected value="0">Thường</option>
                            <option value="1">Market At Home</option>
                        @else
                            <option selected value="1">Market At Home</option>
                            <option value="0">Thường</option>
                        @endif
                    </select>

                    <label class="fw-bold col-sm-3 col-form-label" for="">Trạng thái:</label>
                    <select class="form-select mb-3" name="status" aria-label="Default select example">
                        @if ($category->status == 1)
                            <option selected value="1">Hoạt động</option>
                            <option value="2">Tạm ngưng</option>
                        @else
                            <option selected value="2">Tạm ngưng</option>
                            <option value="1">Hoạt động</option>
                        @endif
                    </select>

                    <!-- Hiển thị hình ảnh hiện tại -->
                    <label for="formFile" class="form-label">Hình ảnh hiện tại</label>
                    <img src="{{ asset($category->image) }}" width="200px" alt="Category Image" class="mb-3">

                    <!-- Trường nhập file hình ảnh mới -->
                    <label for="formFile" class="form-label">Chọn hình ảnh mới</label>
                    <input class="form-control" type="file" name="image" accept="image/*" id="formFile">

                    <a class="btn btn-secondary" href="{{ route('admin.category') }}">Trở lại</a>
                    <button type="submit" class="btn btn-success m-2">Sửa danh mục</button>

                </form>
                <form action="{{ route('admin.deleteCate', ['id' => $category->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger m-2">Xoá danh mục</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Table End -->
@endsection
