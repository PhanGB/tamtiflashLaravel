@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Sản phẩm')

@section('content')
<!-- Table Start -->

<div class="container-fluid pt-4 px-4">
    <div class="bg-light rounded h-100 p-4">
        <h6 class="mb-4">Sản phẩm</h6>
        <form action="" class="mb-4">
            <div class="row g-2 align-items-center">
                <div class="col-9 col-sm-11">
                    <input type="text" placeholder="Tìm kiếm đơn hàng..." class="form-control" />
                </div>
                <div class="col-3 col-sm-1 text-center">
                    <button class="btn btn-primary w-100"><i
                            class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </div>
        </form>
        <a class="btn btn-primary rounded-pill m-2" href="product_add.html">Thêm sản phẩm</a>
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
                        <th scope="col">Mã sản phẩm</th>
                        <th scope="col">Số biến thể</th>
                        <th scope="col">Tên sản phẩm</th>
                        <th scope="col">Hình ảnh</th>
                        <th scope="col">Giá sản phẩm</th>
                        <th scope="col">Tên danh mục</th>
                        <th scope="col">Tên cửa hàng</th>
                        <!-- <th scope="col">Số lượng</th> -->
                        <th scope="col">Trạng thái</th>
                        <th scope="col">Đã bán được</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">1</th>
                        <td>TU1</td>
                        <td><a href="products_variant.html">0 Biến thể</a></td>
                        <td>Trà tắc</td>
                        <td> <img src="../img/testimonial-1.jpg" width="100px"></td>
                        <td>15.000đ</td>
                        <td>Thức uống</td>
                        <td>TamTiFlash</td>
                        <td>Còn hàng</td>
                        <td>10</td>
                        <td><a href="product_edit.html">Sửa</a></td>
                    </tr>

                    <tr>
                        <th scope="row">2</th>
                        <td>DA1</td>
                        <td><a href="products_variant.html">1 Biến thể</a></td>
                        <td>Cá viên chiên</td>
                        <td> <img src="../img/testimonial-1.jpg" width="100px"></td>
                        <td>30.000đ</td>
                        <td>Đồ ăn</td>
                        <td>TamTiFlash</td>
                        <td>Còn hàng</td>
                        <td>10</td>
                        <td><a href="product_edit.html">Sửa</a></td>
                    </tr>

                    <tr>
                        <th scope="row">3</th>
                        <td>TU2</td>
                        <td><a href="products_variant.html">0 Biến thể</a></td>
                        <td>Trà sữa</td>
                        <td> <img src="../img/testimonial-1.jpg" width="100px"></td>
                        <td>20.000đ</td>
                        <td>Thức uống</td>
                        <td>TamTiFlash</td>
                        <td>Hết hàng</td>
                        <td>10</td>
                        <td><a href="product_edit.html">Sửa</a></td>
                    </tr>


                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Table End -->
@endsection
