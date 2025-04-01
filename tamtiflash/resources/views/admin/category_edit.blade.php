
@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Danh mục')
@section('category', 'active')

@section ('content')
<div class="container-fluid pt-4 px-4">
    <!-- Table Start -->

    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Sửa danh mục</h6>
            <a class="btn btn-secondary rounded-pill m-2" href="{{ route('admin.category') }}">Trở lại</a>
            <form action="{{ route('editCate', ['id' => $category->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input class="form-control mb-3" type="text" name="name" value="{{ $category->name }}"
                    aria-label="default input example">

                <select class="form-select mb-3" name="status" aria-label="Default select example">
                    @if($category->status == 1)
                    <option selected value="1">Hoạt động</option>
                    <option value="2">Tạm ngưng</option>
                    @else
                    <option selected value="2">Tạm ngưng</option>
                    <option value="1">Hoạt động</option>
                    @endif

                </select>

                <button type="submit" class="btn btn-success m-2">Sửa danh mục</button>

            </form>
            <form action="{{ route('deleteCate', ['id' => $category->id]) }}" method="post">
                @csrf
                @method('DELETE')
             <button type="submit" class="btn btn-danger m-2">Xoá danh mục</button>

            </form>
        </div>
    </div>
</div>

<!-- Table End -->
@endsection
