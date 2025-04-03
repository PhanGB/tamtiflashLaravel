@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Danh mục')
@section('category', 'active')

@section ('content')
             <!-- Table Start -->
             <div class="container-fluid pt-4 px-4">
                <div class="col-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4">Thêm danh mục</h6>
                        <a class="btn btn-secondary rounded-pill m-2" href="{{ route('admin.category') }}">Trở lại</a>
                        <form action="{{ route('addCate') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input class="form-control mb-3" type="text" name="name" placeholder="Tên danh mục"
                                aria-label="default input example">

                            <select class="form-select mb-3" name="status" aria-label="Default select example">
                                <option value="1">Hoạt động</option>
                                <option value="2">Tạm ngưng</option>
                            </select>

                            <button type="submit" class="btn btn-success m-2">Thêm danh mục</button>

                        </form>

                    </div>
                </div>
            </div>
            <!-- Table End -->
            @endsection
