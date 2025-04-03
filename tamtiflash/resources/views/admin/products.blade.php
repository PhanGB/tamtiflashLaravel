@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Sản phẩm')
@section('products', 'active')

@section('content')

    <!-- Table Start -->

    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Sản phẩm</h6>
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
            <form action="" class="mb-4">
                <div class="row g-2 align-items-center">
                    <div class="col-9 col-sm-11">
                        <input type="text" placeholder="Tìm kiếm sản phẩm" class="form-control" />
                    </div>
                    <div class="col-3 col-sm-1 text-center">
                        <button class="btn btn-primary w-100"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </form>
            <a class="btn btn-primary rounded-pill m-2" href="{{ url('/admin/products/product_add') }}">Thêm sản phẩm</a>
            <label for="" style="margin-left: 750px; font-size: 20px;">Quán:</label>
            <select name="" id="" class="form-select w-25" style="float: right;">
                @foreach($shop as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Số biến thể</th>
                            <th scope="col">Tên sản phẩm</th>
                            <th scope="col">Hình ảnh</th>
                            <th scope="col">Giá sản phẩm</th>
                            <th scope="col">Tên danh mục</th>
                            <th scope="col">Tên cửa hàng</th>
                            <th scope="col">Trạng thái</th>
                            <th scope="col">Đã bán được</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($productList as $index => $pro)
                            <!-- @if($pro->status == 0)
                                        <tr class="table-danger">
                                    @else
                                        <tr class="table-success">
                                    @endif -->
                            <tr>
                                <th scope="row">{{ $productList->firstItem() + $index }}</th>
                                <td><a href="/admin/products/product_variant/{{ $pro->id }}">{{ count($pro->variants) }} Biến
                                        thể</a></td>
                                <td>{{ $pro->name }}</td>
                                <td> <img src="{{ asset('img/' . $pro->image) }}" width="100px" height="100px"></td>
                                <td>{{ number_format($pro->price) }}đ</td>
                                <td>{{ $pro->category->name }}</td>
                                <td>{{ $pro->shop->name }}</td>
                                {{-- @if($pro->status == 0) --}}
                                <td><span class="badge {{ $pro->status_class }}">{{ $pro->status_text }}</span></td>
                                <td>{{ $pro->sold}}</td>
                                <td><a href="{{ url('/admin/products/product_edit/' . $pro->id) }}" class="btn btn-primary" style="margin-bottom:10px;">Sửa</a>
                                    <form action="{{ route('admin.deletePro', ['id' => $pro->id]) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="font-size: 16px;">Xoá</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                <div>
                    {{ $productList->links() }}
                </div>
            </div>
        </div>
    </div>


    <!-- Table End -->
@endsection