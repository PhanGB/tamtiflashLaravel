@extends('admin.layouts.app')
@section('title', 'Tamtiflash - Admin - Thêm biến thể sản phẩm')
@section('content')
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Thêm sản phẩm biến thể</h6>
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <a class="btn btn-secondary rounded-pill m-2" href="{{ url('/admin/products') }}">Trở lại</a>
            <form action="{{ url('admin/products/product_variant/add/'.$product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <input class="form-control mb-3" type="text" name="name" placeholder="Size sản phẩm"
                    aria-label="default input example">
                    <input class="form-control mb-3" type="text" name="price" placeholder="Giá sản phẩm"
                    aria-label="default input example">
                <button type="submit" class="btn btn-success m-2">Thêm sản phẩm</button>

            </form>

        </div>
    </div>
</div>
@endsection
