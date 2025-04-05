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
            <form action="{{ route('admin.editPro', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <input class="form-control mb-3" type="text" name="name" value="{{ $product->name }}"
                    aria-label="default input example">
                <div class="mb-3">
                    <label for="formFile" class="form-label">Hình ảnh</label>
                    <input class="form-control" type="file" name="image" id="formFile">
                    <!-- <input class="form-control" type="text" name="image" id="formFile"> -->
                </div>
                <img src="{{ asset('img/'.$product->image) }}" width="150px" height="150px">
                <input class="form-control mb-3" type="text" name="price"
                    value="{{ $product->price }}" aria-label="default input example">


                <select class="form-select mb-3" name="category" aria-label="Default select example">
                    @foreach ($category as $item)
                        @if($item->id == $product->id_cate)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach

                    @foreach ($category as $item)
                        @if($item->id != $product->id_cate)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach

                </select>

                <select class="form-select mb-3" name="shop" aria-label="Default select example">
                    @foreach ($shop as $item)
                        @if($item->id == $product->id_shop)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach

                    @foreach ($shop as $item)
                        @if($item->id != $product->id_shop)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endif
                    @endforeach
                </select>

                <select class="form-select mb-3" name="status" aria-label="Default select example">
                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Hoạt động</option>
                    <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Tạm ngưng</option>
                    <option value="3" {{ $product->status == 3 ? 'selected' : '' }}>Ngừng kinh doanh</option>
                </select>

                <button type="submit" class="btn btn-success m-2">Sửa sản phẩm</button>

            </form>

            <form action="{{ route('admin.deletePro', ['id' => $product->id]) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger m-2">Xoá sản phẩm</button>

            </form>

        </div>
    </div>
</div>

<!-- Table End -->
@endsection
