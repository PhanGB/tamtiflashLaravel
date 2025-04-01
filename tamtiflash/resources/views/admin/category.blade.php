@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Danh mục')
@section('category', 'active')

@section ('content')
    <!-- Table Start -->

    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Danh mục</h6>
            <form action="" class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-9 col-sm-11">
                        <input type="text" placeholder="Tìm kiếm đơn hàng..." class="form-control" />
                    </div>
                    <div class="col-3 col-sm-1 text-center">
                        <button class="btn btn-primary w-100"><i
                                class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>
            <a class="btn btn-primary rounded-pill m-2" href="{{ url('/admin/category/category_add') }}">Thêm danh mục</a>
            <!-- <label for="" style="margin-left: 650px; font-size: 20px;">Quán:</label> -->
            <select name="" id="" class="form-select w-25" style="float: right;">
                <option value="">Tất cả</option>
                <option value="">Thức ăn</option>
                <option value="">Nước uống</option>
            </select>
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
                        @foreach($categoryList as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->name }}</td>
                            <td> <img src="{{ 'img/'.$item->image }}" width="50px"></td>
                            <td><span class="badge {{ $item->status_class }}"> {{ $item->status_text }}</span></td>
                            <td>{{ count($item->products) }}</td>
                            <td><a href="{{ url('/admin/category/category_edit/'.$item->id) }}">Sửa</a>
                        </tr>

                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Table End -->

@endsection
