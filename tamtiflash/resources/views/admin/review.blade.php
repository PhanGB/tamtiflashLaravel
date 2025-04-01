@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Quản lý đánh giá')
@section ('content')
    <!-- Table Start -->

    <div class="container-fluid pt-4 px-4">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Quản lý đánh giá</h6>
            <!-- <a class="btn btn-primary rounded-pill m-2" href="/gameconsole/admin/add-product">Thêm biến thể</a> -->
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">STT</th>
                            <th scope="col">Khách hàng</th>
                            <th scope="col">Đơn hàng</th>
                            <th scope="col">Đánh giá</th>
                            <th scope="col">Bình luận</th>
                            <th scope="col">Trạng thái</th>
                            <th>Action</th>


                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $review)
                                            @php
                                                $status = '';
                                                if ($review->review_status == 0) {
                                                    $class = 'btn-secondary';
                                                    $status = 'Đang chờ';
                                                } elseif ($review->review_status == 1) {
                                                    $class = 'btn-success';
                                                    $status = 'Đã duyệt';
                                                } else {
                                                    $class = 'btn-danger';
                                                    $status = 'Đã từ chối';
                                                }
                                            @endphp
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $review->customer_name }}</td>
                                                <td>{{ $review->order_id }}</td>
                                                <td>{{ str_repeat('★', $review->rating) . str_repeat('☆', 5 - $review->rating) }}</td>
                                                <td>{{ $review->review_content }}</td>
                                                <td><span class="btn {{ $class }} m-2">{{ $status }}</span></td>
                                                @if ($review->review_status == 0)
                                                    <td>
                                                        <a href="admin.review.approve/{{ $review->review_id }}"
                                                            class="btn btn-warning m-2">Duyệt</a>
                                                        <a href="admin.review.hide/{{$review->review_id}}" class="btn btn-danger m-2">Ẩn</a>
                                                    </td>
                                                @elseif ($review->review_status == 2)
                                                    <td>
                                                        <a href="admin.review.show/{{$review->review_id}}" class="btn btn-success m-2">Hiện</a>
                                                    </td>
                                                @else
                                                    <td>
                                                        <a href="admin.review.hide/{{ $review->review_id }}" class="btn btn-danger m-2">Ẩn</a>
                                                    </td>
                                                @endif
                                            </tr>
                        @endforeach
                        <!-- <tr>
                                <th scope="row">1</th>
                                <td>Nguyễn Văn A</td>
                                <td>123456</td>
                                <td>★★★★★</td>
                                <td>Dịch vụ rất tốt!</td>
                                <td><span class="btn btn-secondary m-2">Đang chờ</span></td>
                                <td><a href="" class="btn btn-warning m-2">Duyệt</a> <a href=""
                                        class="btn btn-danger m-2">Ẩn</a></td>
                            </tr> -->
                        <!-- <tr>
                                <th scope="row">2</th>
                                <td>Trần Thị B</td>
                                <td>★★★★☆</td>
                                <td>Giao hàng nhanh chóng.</td>
                                <td><span class="btn btn-success m-2">Đã duyệt</span></td>
                                <td></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td>Lê Văn C</td>
                                <td>★★☆☆☆</td>
                                <td>Hàng bị hư hỏng khi nhận.</td>
                                <td><span class="btn btn-danger m-2">Đã từ chối</span></td>
                                <td></td>
                            </tr> -->


                    </tbody>
                </table>
            </div>
        </div>


    </div>


    <!-- Table End -->

@endsection