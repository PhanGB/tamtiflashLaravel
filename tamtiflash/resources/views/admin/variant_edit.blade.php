
@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Sửa biến thể')
@section('products', 'active')

@section ('content')
<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Sửa bién thể</h6>
            <a class="btn btn-secondary rounded-pill m-2" href="{{ route('admin.product_variant', ['id' => $product->id]) }}">Trở lại</a>
            <form action="{{ route('editVariant', ['id' => $productVariant->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                {{-- <input class="form-control mb-3" type="text" name="" placeholder="Mã sản phẩm"
                    aria-label="default input example"> --}}
                <input class="form-control mb-3" type="text" name="name" value="{{ $productVariant->name }}"
                    aria-label="default input example">

                <input class="form-control mb-3" type="text" name="price" value="{{ $productVariant->price }}"
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

                <button type="submit" class="btn btn-success m-2">Sửa sản phẩm</button>

            </form>
            <form action="{{ route('deleteVariant', ['id' => $productVariant->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger m-2">Xoá sản phẩm</button>

            </form>

        </div>
    </div>
</div>
<!-- Table End -->
@endsection
