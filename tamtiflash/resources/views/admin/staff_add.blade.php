@extends('admin.layouts.app')

@section('title', 'Tamtiflash - Admin - Nhân viên')
@section('content')
<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h6 class="mb-4">Thêm nhân viên</h6>
            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <a class="btn btn-secondary rounded-pill m-2" href="{{ route('admin.staff') }}">Trở lại</a>


            <form action="{{ route('admin.add') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <input class="form-control mb-3" type="text" name="name" placeholder="Họ và tên"
                    aria-label="default input example">

                <input class="form-control mb-3" type="email" name="email" placeholder="Nhập Email"
                    aria-label="default input example">

                <input class="form-control mb-3" type="text" name="phone" placeholder="Nhập số điện thoại"
                    aria-label="default input example">

                <input class="form-control mb-3" type="password" name="password" placeholder="Nhập mật khẩu"
                    aria-label="default input example">


                <button type="submit" class="btn btn-success m-2">Thêm nhân viên</button>

            </form>

        </div>
    </div>
</div>
<!-- Table End -->
@endsection
