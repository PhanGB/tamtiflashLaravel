
@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Thêm sản phẩm')
@section('products', 'active')

@section ('content')
<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Thêm sản phẩm</h6>
            <a class="btn btn-secondary rounded-pill m-2" href="{{ url('/admin/products') }}">Trở lại</a>
            <form action="{{ route('addPro') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                {{-- <input class="form-control mb-3" type="text" name="" placeholder="Mã sản phẩm"
                    aria-label="default input example"> --}}
                <input class="form-control mb-3" type="text" name="name" placeholder="Tên sản phẩm"
                    aria-label="default input example">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Hình ảnh</label>
                    <input class="form-control" type="file" name="image" id="formFile">
                    <!-- <input class="form-control" type="text" name="image" id="formFile"> -->
                </div>
                <!-- <img src="../img/testimonial-1.jpg" width="100px"> -->
                <input class="form-control mb-3" type="text" name="price" placeholder="Giá sản phẩm"
                    aria-label="default input example">


                <select class="form-select mb-3" name="category" aria-label="Default select example">
                    @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>

                    @endforeach

                </select>

                <select class="form-select mb-3" name="shop" aria-label="Default select example">
                    @foreach ($shop as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>

                    @endforeach
                </select>

                <select class="form-select mb-3" name="status" aria-label="Default select example">
                    <option value="1">Hoạt động</option>
                    <option value="2">Tạm ngưng</option>
                </select>

                <button type="submit" class="btn btn-success m-2">Thêm sản phẩm</button>

            </form>

        </div>
    </div>
</div>
<!-- Table End -->
@endsection
