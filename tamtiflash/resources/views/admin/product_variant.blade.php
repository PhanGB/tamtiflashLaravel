@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Biến thể')
@section('products', 'active')

@section ('content')

 <!-- Table Start -->

 <div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">{{ $product->name }}</h6>
        <a class="btn btn-primary rounded-pill m-2" href="{{ route('admin.product.variant_add', ['id' => $product->id]) }}">Thêm biến thể</a>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giá sản phẩm</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Tên cửa hàng</th>
                        <th scope="col">Trạng thái</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($productVariant as $index => $item)

                    <tr>
                        <th scope="row">{{ $index+1 }}</th>
                        <td>{{ $item->name }}</td>
                        <td> <img src="{{ asset('img/'.$item->image) }}" width="100px"></td>
                        <td>{{ number_format($item->price) }}đ</td>
                        <td>{{ $item->product->category->name }}</td>
                        <td>{{ $item->product->shop->name }}</td>
                        <td><span class="badge {{ $item->status_class }}">{{ $item->status_text }}</span></td>
                        <td><a href="{{ route('admin.product.variant_edit', ['id' => $item->id]) }}">Sửa</a></td>
                    </tr>

                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
    <a href="{{ url('/admin/products') }}" class="btn btn-outline-dark m-2">Quay lại</a>

</div>


<!-- Table End -->
@endsection
