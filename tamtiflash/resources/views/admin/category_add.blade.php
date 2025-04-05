@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Danh mục')
@section('category', 'active')

@section ('content')
             <!-- Table Start -->
             <div class="container-fluid pt-4 px-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Thêm danh mục</h6>
                        <form action="{{ route('admin.addCate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <label class="fw-bold col-sm-3 col-form-label" for="">Tên danh mục:</label>
                            <input class="form-control mb-3" type="text" name="name" placeholder="Tên danh mục"
                                aria-label="default input example">
                            <label class="fw-bold col-sm-3 col-form-label" for="">Loại danh mục:</label>
                            <select class="form-select mb-3" name="mah" aria-label="Default select example">
                                <option value="0">Thường</option>
                                <option value="1">Market At Home</option>
                            </select>

                            <label class="fw-bold col-sm-3 col-form-label" for="">Trạng thái:</label>
                            <select class="form-select mb-3" name="status" aria-label="Default select example">
                                <option value="1">Hoạt động</option>
                                <option value="2">Tạm ngưng</option>
                            </select>
                            <a class="btn btn-danger" href="{{ route('admin.category') }}">Trở lại</a>
                            <button type="submit" class="btn btn-success m-2">Thêm danh mục</button>

                        </form>

                    </div>
                </div>
            </div>
            <!-- Table End -->
            @endsection
