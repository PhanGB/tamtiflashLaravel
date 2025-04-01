
@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Sửa sản phẩm')
@section('products', 'active')

@section ('content')
<div class="container-fluid pt-4 px-4">
    <!-- Table Start -->

    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Sửa sản phẩm</h6>
            <a class="btn btn-secondary rounded-pill m-2" href="{{ url('/admin/products') }}">Trở lại</a>
            <form action="" method="post" enctype="multipart/form-data">

                <input class="form-control mb-3" type="text" name="name" value="{{ $product->name }}"
                    aria-label="default input example">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Hình ảnh</label>
                    <input class="form-control" type="file" name="image" id="formFile">
                    <!-- <input class="form-control" type="text" name="image" id="formFile"> -->
                </div>
                <img src="{{ asset('img/'.$product->image) }}" width="100px">
                <input class="form-control mb-3" type="text" name="price"
                    value="{{ number_format($product->price) }}" aria-label="default input example">


                <select class="form-select mb-3" name="" aria-label="Default select example">
                    <option>Chọn danh mục</option>
                    <?php
                    // if ($product->getIdCate() == 1) {
                    //     echo '<option selected value="1">Thức uống</option>';
                    //     echo '<option value="2">Thức ăn</option>';
                    // } else {
                    //     echo '<option selected value="2">Thức ăn</option>';
                    //     echo '<option value="1">Thức uống</option>';
                    // }
                    ?>
                </select>

                <select class="form-select mb-3" name="status" aria-label="Default select example">
                    <option value="1">Hoạt động</option>
                    <option value="2">Tạm ngưng</option>
                    <option value="3">Ngừng kinh doanh</option>
                </select>

                <button type="submit" class="btn btn-success m-2">Sửa sản phẩm</button>
                <a href="" class="btn btn-danger m-2">Xoá sản
                    phẩm</a>

            </form>

        </div>
    </div>
</div>

<!-- Table End -->
@endsection
