@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Sản phẩm')
@section('products', 'active')

@section('content')

  <!-- Table Start -->

  <div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Sản phẩm</h6>
        <form action="" class="mb-4">
            <div class="row g-2 align-items-center">
                <div class="col-9 col-sm-11">
                    <input type="text" placeholder="Tìm kiếm sản phẩm" class="form-control" />
                </div>
                <div class="col-3 col-sm-1 text-center">
                    <button class="btn btn-primary w-100"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </form>
        <a class="btn btn-primary rounded-pill m-2" href="{{ url('/admin/products/product_add') }}">Thêm sản phẩm</a>
            <label for="" style="margin-left: 650px; font-size: 20px;">Quán:</label>
            <select name="" id="" class="form-select w-25" style="float: right;">
                <option value="">Ngũ Long</option>
                <option value="">TamTiFlash</option>
                <option value="">ABC</option>
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

                    @foreach($productList as $item)

                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td><a href="/admin/products/product_variant/{{ $item->id }}">{{ count($item->variants) }} Biến thể</a></td>
                        <td>{{ $item->name }}</td>
                        <td> <img src="{{ asset('img/'.$item->image) }}" width="100px"></td>
                        <td>{{ number_format($item->price) }}đ</td>
                        <td>{{ $item->category->name }}</td>
                        <td>{{ $item->shop->name }}</td>
                        {{-- @if($item->status == 0) --}}
                        <td><span class="badge {{ $item->status_class }}">{{ $item->status_text }}</span></td>
                        <td>{{ $item->sold}}</td>
                        <td><a href="{{ url('/admin/products/product_edit/'.$item->id) }}">Sửa</a></td>
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
