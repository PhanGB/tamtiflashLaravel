
@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Thêm biến thể')
@section('products', 'active')

@section ('content')
<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Thêm bién thể</h6>
            <a class="btn btn-secondary rounded-pill m-2" href="{{ route('admin.product_variant', ['id' => $product->id]) }}">Trở lại</a>
            <form action="{{ route('addVariant', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                {{-- <input class="form-control mb-3" type="text" name="" placeholder="Mã sản phẩm"
                    aria-label="default input example"> --}}
                <input class="form-control mb-3" type="text" name="name" placeholder="Tên sản phẩm"
                    aria-label="default input example">

                <input class="form-control mb-3" type="text" name="price" placeholder="Giá sản phẩm"
                    aria-label="default input example">


                <select class="form-select mb-3" name="category" aria-label="Default select example">
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                </select>

                <select class="form-select mb-3" name="shop" aria-label="Default select example">
                    <option value="{{ $shop->id }}">{{ $shop->name }}</option>
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
