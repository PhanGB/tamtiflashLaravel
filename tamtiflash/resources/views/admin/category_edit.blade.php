
@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Danh mục')
@section('category', 'active')

@section ('content')
<div class="container-fluid pt-4 px-4">
    <!-- Table Start -->

    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Sửa danh mục</h6>
            <a class="btn btn-secondary rounded-pill m-2" href="{{ url('/admin/category') }}">Trở lại</a>
            <form action="" method="post" enctype="multipart/form-data">

                <input class="form-control mb-3" type="text" name="name" value="{{ $category->name }}"
                    aria-label="default input example">

                <select class="form-select mb-3" name="status" aria-label="Default select example">
                    <?php
                    // if ($category->getStatus() == 1) {
                    //     echo '<option selected value="1">Trạng thái 1</option>';
                    //     echo '<option value="2">Trạng thái 2</option>';
                    // } else {
                    //     echo '<option selected value="2">Trạng thái 2</option>';
                    //     echo '<option value="1">Trạng thái 1</option>';
                    // }
                    ?>
                </select>

                <button type="submit" class="btn btn-success m-2">Sửa danh mục</button>
                <a href="" class="btn btn-danger m-2">Xoá danh mục</a>

            </form>

        </div>
    </div>
</div>

<!-- Table End -->
@endsection
