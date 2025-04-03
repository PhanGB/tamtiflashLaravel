
@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Sản phẩm')
@section('products', 'active')

@section ('content')

 <!-- Table Start -->

 <div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Tên sản phẩm chính</h6>
        <a class="btn btn-primary rounded-pill m-2" href="{{ url('admin/products/product_variant/product_variant_add/'.$product->id) }}">Thêm biến thể</a>

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
                    @foreach($productVariant as $item)

                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->name }}</td>
                        <td> <img src="{{ asset('img/'.$item->image) }}" width="100px"></td>
                        <td>{{ number_format($item->price) }}đ</td>
                        <td>{{ $item->product->shop->name }}</td>
                        <td>{{ $item->product->category->name }}</td>
                        <td><span class="badge {{ $item->status_class }}">{{ $item->status_text }}</span></td>
                        <td><a href="/">Sửa</a></td>
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
